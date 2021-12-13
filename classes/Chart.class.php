<?php
/**
 * Chart class
 * 
 * @file
 * @author  Kodes <kodesinfo@gmail.com>
 * @version 1.0
 *
 * @section LICENSE
 * 해당 프로그램은 kodes에서 제작된 프로그램 입니다.
 * https://www.kodes.co.kr
 */
class Chart
{
	static private $info;
    static private $mysql;

    /**
     * Compnay 생성자 config, DB 셋팅
	 * 로그인 여부 확인
     */
    function __construct(){
       global $System;
	   self::$info = $System;
	   $this->mysql = new Mysql($System['db']['host'],$System['db']['user'], $System['db']['passwd'],$System['db']['database']);

	   $login = new Login();
	   $login->loginInfo();
    }

	
	/**
    * Chart Pop 시 필요한 정보 리턴
    * @return Array  [ api List ] 
    */
	function chart(){
		return $this->getApiList();
	}

    /**
    * Api 전체 리스트 반환
	* input : 
    * @return Array  [ api List ] 
    */
	function getApiList(){
		$tags='*';
		$list = $this->mysql->get('api');

		$sql = "select a.idx, a.id, a.title, a.provider, a.returnType, a.apiKey, a.url, a.dateChar, a.table, a.updater, a.createDate, a.updateDate, a.lastItemUpdate, a.dataTerm, ag.groupTitle, ag.sort from (select *from api.api where grpId != 23 or grpid is null) a LEFT OUTER JOIN api.apiGroup ag on a.grpId = ag.idx order by ifnull(sort,999) asc, title asc";

		$list = $this->mysql->query($sql,true);

		foreach($list as $key => $val){
			if($unit_name=@$this->mysql->orderBy("date",'DESC')->limit("0, 1")->get($val['table'],"unit_name")){
				$list[$key]['unit_name'] = $unit_name[0]['unit_name'];
			}else{
				$list[$key]['unit_name'] = '';
			}
		}
		return $list;
	}

    /**
    * Api 차트 제작시 필요한 필드 리턴
	* input : 
	          GET apiIdx : api index
    * @return Array  [ api Field List] 
    */
	function chartField(){
		$tags='*';
		$where = "";
		if($_GET['apiIdx']){
			$where=['apiIdx'=>$_GET['apiIdx']];
			$list = $this->mysql->where($where)->and_where(['field'=>['!=','']])->get("apiField");
		}
		echo json_encode($list);
	}

    /**
    * Api 차트 제작시 데이터 리턴
	* input : 
	          GET apiIdx : api index
  				  field1 : X축 데이터 필드명
  				  field2 : Y축 데이터 필드명
				  startDate : X축 시작 일자
				  endDate : X축 끝 일자
    * @return Array  [ API Data List] 
    */
	function chartData(){
		$table = $this->mysql->where(['idx'=>$_GET['apiIdx']])->get("api")[0]['table'];
		$field1 = $_GET['field1'];
		$field2 = $_GET['field2'];

		$tags=$field1.", ".$field2;

		if($_GET['startDate']){
			$this->mysql->and_where([$field1=>['>=',$_GET['startDate']]]);
		}

		if($_GET['endDate']){
			$this->mysql->and_where([$field1=>['<=',$_GET['endDate']]]);
		}

		$list = $this->mysql->orderBy($field1,'ASC')->get($table, $tags);
		
		foreach($list as $key => $val){
			 $list[$key][$field1]=$this->changeDateFormat($val[$field1]);
		}

		echo json_encode($list);
	}


    /**
    * Api 일자 필드의 전체 리스트 리턴
	* input : 
	          GET apiIdx : api index
  				  field : 일자(X축) 데이터 필드명
    * @return Array  [ Date List] 
    */
	function chartDate(){
		$list = $this->mysql->where(['idx'=>$_GET['apiIdx']])->get("api");

		$table = $list[0]['table'];
		$field = $_GET['field'];

		$list = $this->mysql->query('SELECT '.$field.' FROM '.$table.' ORDER BY '.$field.' ASC',true);

		foreach ($list as $key => $val){
			$data = $val[$field];

			$list[$key][$field."Dp"]=$this->changeDateFormat($data);
		}

		echo json_encode($list);
	}

	/**
    * 숫자로 되어 있는 값을 년, 년 분기, 년 월, 년 월 일 로 형식을 변경하여 리턴
	* input : 
	*          GET apiIdx : api index
  	*			  field : 일자(X축) 데이터 필드명
    * @return Array  [ Date List] 
    */
	function changeDateFormat($data){
		if(is_numeric(str_replace('-','',$data))){
			$num = strlen($data);

			switch($num){
				case 4: // 년도
					$data=$data."년";
					break;
				case 5: // 분기
					$data=substr($data,0,4)."년".substr($data,4,1)."분기";
					break;
				case 6: // 월
					$data=substr($data,0,4)."년".substr($data,4,2)."월";
					break;
				case 8: // 년월일
					$data=substr($data,0,4)."년".substr($data,4,2)."월".substr($data,6,2)."일";
					break;
				case 10: // 년월일
					$data=date("Y년 m월 d일",strtotime($data));
					break;
			}
		}
		return $data;
	}


	/**
    * 사용된 차트 리스트 
	* input : 
	*          GET noapp : 페이지에 보요줄 리스트 갯수
				   keyword : 검색 키워드
    * @return Array  [ noapp, maxnum, this Page, maked Chart List ] 
    */
	function chartMakedlist(){
		$noapp = ($_GET['noapp']==""? 10 : $_GET['noapp']);

		$this->mysql->where(['makeId'=>$_SESSION['userId']]);
		if($_GET['keyword']!=""){
			$this->mysql->where(['title'=>['like','%'.$_GET['keyword'].'%']]);
		}

		$data['noapp']=$noapp;
		$data['maxnum'] = $this->mysql->maxRowNum("makedChart","idx");
		$_GET['page'] = ($_GET['page'] < 1 ? 0 : $_GET['page']-1); 
		$data['thisPage'] = $_GET['page'];

		$startNum = ($_GET['page']==0?$_GET['page']:$_GET['page']*$noapp);
		$endNum = ($_GET['page']==0?$noapp:$_GET['page']*$noapp);

		$data['list'] = $this->mysql->orderBy("makeDate")->limit($startNum.", ".$endNum)->get("makedChart",["idx", "title", "makeName", "makeDate"]);

		echo json_encode($data);
	}


	/**
    * 만들어진 차트 정보 json 
	* input : 
	*          GET idx : chart index
    * @return Array  [ Data List] 
    */
	function chartMakedview(){
		$data = [];

		if($_GET['idx']){
			$data = $this->mysql->where(['idx'=>$_GET['idx']])->get("makedChart");
		}
		echo json_encode($data);
	}


	/**
    * 차트 정보 저장
	* input : 
	*          POST : 만들어진 차트 정보
    * @return Array  [ Data List] 
    */
	function chartRecode(){
		$_POST['axisX']=json_encode($_POST['axisX']);
		$_POST['axisY']=json_encode($_POST['axisY']);
		$_POST['fieldTitle']=json_encode($_POST['fieldTitle']);
		$_POST['color']=json_encode($_POST['color']);
		$_POST['type']=json_encode($_POST['type']);
		$_POST['makeDate'] = date('Y-m-d H:i:s');
		$_POST['makeId'] = $_SESSION['userId'];
		$_POST['makeName'] = $_SESSION['userName'];
		$_POST['makeIP'] = $_SERVER['REMOTE_ADDR'];

		$this->mysql->insert("makedChart",$_POST);
		$data['idx']=$this->mysql->insert_id();
		echo json_encode($data);
	}
	
	/**
    * 차트 파일 html 저장
	* input : 
	*          POST idx : chart index
    * @return Array  [ Data List] 
    */
	function chartToFile(){
		$fileName = $_POST['idx'].".html";

		$directory = self::$info['path']['cacheBase'].'/'.date("Ym")."/";
		if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

		$_POST['html']='<html lang="ko"><head><meta charset="utf-8"><title>hankyung.com</title><script src="//static.hankyung.com/plugin/jquery-1.12.4.min.js"></script><script src="https://cdn.jsdelivr.net/npm/chart.js"></script></head><body><canvas id="chart"></canvas>'.$_POST['html'].'</body></html>';
		echo $directory;
		file_put_contents($directory.$fileName, $_POST['html']);
	}


	/**
    * 차트 이미지 저장 및 썸네일 생성
	* input : 
	*          POST idx : chart index
    * @return Array  [ Data List] 
    */
	function chartToImage(){
		$photo = $_POST['photo'];
		$thumbWidth = 300;

		if (!empty($photo)) {
			$photo = str_replace('data:image/png;base64,', '', $photo);
			$entry = base64_decode($photo);
			$image = imagecreatefromstring($entry);
			$oWidth = imagesX($image);
	        $oHeight = imagesY($image);

			$rate = $oWidth / 600;
			$sWidth = 600;
			$sHeight = ceil($oHeight * $rate);

			$scaled = imageCreateTrueColor($sWidth, $sHeight);
			$background = imagecolorallocate($scaled, 255, 255, 255);
			imagefill($scaled, 0, 0, $background);
			imageCopyResampled($scaled, $image, 0, 0, 0, 0, $sWidth, $sHeight, $oWidth, $oHeight);

			$fileName = $_POST['idx'].".png";
			$directory = self::$info['path']['cacheBase'].'/'.date("Ym").'/';
			if (!is_dir($directory)) {
				mkdir($directory, 0777, true);
			}
			
			if (!empty($path)) {
				if (file_exists($path)) {
					unlink($path);
				}
			}
			$saveImage = imagepng($scaled, $directory.$fileName);

			// thumbnail 만들기
			$rate = $thumbWidth / $oWidth;
			$thumbHeight = ceil($oHeight * $rate);

			$scaledTumb = imageCreateTrueColor($thumbWidth, $thumbHeight);
			imagefill($scaledTumb, 0, 0, $background);
			imageCopyResampled($scaledTumb, $image, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $oWidth, $oHeight);
			$thumbDir = preg_replace("/([.][a-z]+)$/i",'_thumb$1',$directory.$fileName);
			$saveImage = imagepng($scaledTumb, $thumbDir);

			imagedestroy($image);
			imagedestroy($scaled);
			imagedestroy($scaledTumb);

			if ($saveImage) {
				return $fileName;
			} else {
				return false; // image not saved
			}
		}
	}
}
?>