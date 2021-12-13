<?php
/**
 * Api Admin Class
 * 
 * @file
 * @author  Kodes <kodesinfo@gmail.com>
 * @version 1.0
 *
 * @section LICENSE
 * 해당 프로그램은 kodes에서 제작된 프로그램 입니다.
 * https://www.kodes.co.kr
 */
class Api{
    private $mysql;

    /**
     * Compnay 생성자 config, DB 셋팅
	 * input : 
	 *        type : ( server )서버에서 사용시 로그인 무효화
     */
    function __construct($type=""){
       global $System;
	   $this->info = $System;
	   $this->mysql = new Mysql($System['db']['host'],$System['db']['user'], $System['db']['passwd'],$System['db']['database']);
		
	   if($type!="server"){
		   $login = new Login();
		   $login->loginInfo();
	   }
    }

    /**
    * Api의 검색조건에 맞는 Row의 갯수를 반환
	* input : 
	          GET noapp : 페이지에 보요줄 리스트 갯수
			      page  : 페이지 넘 : 1 ~
				  keyword : 검색 안자값
    * @return Array  [ api List, document Max Number ,Page ] 
    */
    function apiList(){
		$noapp = ($_GET['noapp']==""?15:$_GET['noapp']);
        $page = $_GET["page"]==""?1:$_GET["page"];
		$whereTxt = "";

		$startNum=($page - 1) * $noapp;
		$endNum=$noapp;

		if($_GET['keyword']!=""){
			$where['title']=['like','%'.$_GET['keyword'].'%'];
			$whereTxt = " where title like '%".$_GET['keyword']."%' ";
		}

		$this->mysql-> where($where);
		$sql = "select a.idx, a.id, a.title, a.provider, a.returnType, a.apiKey, a.url, a.dateChar, a.table, a.updater, a.createDate, a.updateDate, a.lastItemUpdate, a.dataTerm, ag.groupTitle, ag.sort from (select * from api.api ".$whereTxt.")a LEFT OUTER JOIN api.apiGroup ag on a.grpId = ag.idx order by ifnull(sort,999) asc, title asc limit ".$startNum .", ".$endNum;

		$data['apiList'] = $this->mysql->query($sql,true);

		$data['totNum']=$this->mysql->where($where)->totRows($this->info['db']['api']);

		$pageInfo = new Page;
		$data['page'] = $pageInfo->page($noapp, 10,$data["totNum"], $page);

        return $data;
    }


    /**
    * API 정보를 Edit를 하기위한 관련정보 리턴
	* input : 
	*		 GET idx : api idx
    * @return Array  [ API Row, API Group List ] 
    */
	function apiEditor(){
		if( $_GET['idx']){
			$data['apiList'] = $this->mysql
					-> where(['idx' => $_GET['idx']])
					-> get($this->info['db']['api']);

			$data['apiList'][0]['workWeek']=json_decode($data['apiList'][0]['workWeek'],true);

			$field = $this->mysql
					-> where(['apiIdx' => $_GET['idx']])
					-> get($this->info['db']['apiField']);

			$data['apiList'][0]['tag']=array_column($field,'tag');
			$data['apiList'][0]['field']=array_column($field,'field');
			$data['apiList'][0]['defaultValue']=array_column($field,'defaultValue');
			$data['apiList'][0]['remark']=array_column($field,'remark');
			$data['apiList'][0]['keyField']=array_column($field,'keyField');
		}

		$data['apiGroup'] = $this->apiGroupList()['apiList'];
		return $data;
	}

    /**
    * Api의 모든 리스트 리턴
    * @return Array  [ API Row] 
    */
	function apiAllListInfo(){
		$data['apiList'] = $this->mysql
						-> orderBy('createDate','desc')
						-> get($this->info['db']['api']);
	
		foreach($data['apiList'] as $key => $val){
			$data['apiList'][$key]['workWeek']=json_decode($data['apiList'][$key]['workWeek'],true);

			$field = $this->mysql
					-> where(['apiIdx' => $val['idx']])
					-> get($this->info['db']['apiField']);
			$data['apiList'][$key]['tag']=array_column($field,'tag');
			$data['apiList'][$key]['field']=array_column($field,'field');
			$data['apiList'][$key]['defaultValue']=array_column($field,'defaultValue');
			$data['apiList'][$key]['remark']=array_column($field,'remark');
			$data['apiList'][$key]['keyField']=array_column($field,'keyField');
		}
		
		return $data;
	}

    /**
    * Api의 입력
	* input : 
	*        _POST : input Data
    * @return Array [ input DB Info ] 
    */
	function apiInsert(){
		$tag = $_POST['tag'];
		$field = $_POST['field'];
		$defaultValue = $_POST['defaultValue'];
		$remark = $_POST['remark'];
		$keyField = $_POST['keyField'];

		unset($_POST['tag'],$_POST['field'],$_POST['defaultValue'],$_POST['remark'],$_POST['keyField'],$_POST['idx']);

		$_POST['coid']=$_SESSION['auth']['coid'];
		$_POST['id'] = trim($_POST['id']);
		$_POST['dateChar'] = trim($_POST['dateChar']);
		$_POST['apiKey'] = trim($_POST['apiKey']);
		$_POST['url'] = trim($_POST['url']);
		$_POST['table'] = trim($_POST['table']);
		$_POST['workWeek']=json_encode($_POST['workWeek']);
		$_POST['creater']=$_SESSION['auth']['id'];
		$_POST['createDate']=date("Y-m-d H:i:s");
		
		$this->mysql->insert($this->info['db']['api'],$_POST);
		$apiId = $this->mysql->insert_id();
		
		// api 필드 정보 입력
		foreach($tag as $key => $val){
			if( $val!="" || $field[$key]!="" || $defaultValue[$key]!="" || $remark[$key]!="" ){
				$this->mysql->insert($this->info['db']['apiField'],['apiIdx'=>$apiId,'tag'=>$val,'field'=>$field[$key],'defaultValue'=>$defaultValue[$key],'remark'=>$remark[$key],'keyField'=>in_array($key,$keyField)]);
			}
		}

		$this->mysql->creatTable($_POST['table'],$field,$keyField);
	}

    /**
    * Api의 수정
	* input : 
	*        _POST : input Data
    * @return Array [ input DB Info ] 
    */
	function apiModify(){
		$tag = $_POST['tag'];
		$field = $_POST['field'];
		$defaultValue = $_POST['defaultValue'];
		$remark = $_POST['remark'];
		$keyField = $_POST['keyField'];

		unset($_POST['tag'],$_POST['field'],$_POST['defaultValue'],$_POST['remark'],$_POST['keyField'],$_POST['coid']);

		$_POST['id'] = trim($_POST['id']);
		$_POST['dateChar'] = trim($_POST['dateChar']);
		$_POST['apiKey'] = trim($_POST['apiKey']);
		$_POST['url'] = trim($_POST['url']);
		$_POST['table'] = trim($_POST['table']);
		$_POST['workWeek']=json_encode($_POST['workWeek']);
		$_POST['updater']=$_SESSION['auth']['id'];;
		$_POST['updateDate']=date("Y-m-d H:i:s");

		$this->mysql
			->where(['idx'=>$_POST['idx']])
			->update($this->info['db']['api'],$_POST);

		// api 필드 정보를 업데이트 하는 부분
		foreach($tag as $key => $val){
			$fieldIdx = $this->mysql
				-> where(['apiIdx' => $_POST['idx'],'tag' => $tag[$key]])
				-> get($this->info['db']['apiField'],'idx')[0]['idx'];
			if($fieldIdx){
				$this->mysql
					->where(['idx'=>$fieldIdx])
					->update($this->info['db']['apiField'],['apiIdx'=>$_POST['idx'],'tag'=>$val,'field'=>$field[$key],'defaultValue'=>$defaultValue[$key],'remark'=>$remark[$key],'keyField'=>in_array($key,$keyField)]);
			}else{
				if( $val!="" || $field[$key]!="" || $defaultValue[$key]!="" || $remark[$key]!="" ){
					$this->mysql->insert($this->info['db']['apiField'],['apiIdx'=>$_POST['idx'],'tag'=>$val,'field'=>$field[$key],'defaultValue'=>$defaultValue[$key],'remark'=>$remark[$key],'keyField'=>in_array($key,$keyField)]);
				}
			}
		}
		$this->mysql->alterTable($_POST['table'],$field,$keyField);
	}

    /**
    * Api의 삭제
	* input : 
	*        _POST : input Data
    * @return Array [ input DB Info ] 
    */
	function apiDelete(){
		$this->mysql->where(['idx'=>$_POST["apiId"]])->delete("api");
		$this->mysql->where(['apiIdx'=>$_POST["apiId"]])->delete("apiField");
	}

    /**
    * Api의 삭제
	* input : 
	*        _POST : input Data
    * @return Array [ input DB Info ] 
    */
	function apiLastItemUpdate(){
		$_POST['lastItemUpdate']=date("Y-m-d H:i:s");
		$filter=['idx'=>$_POST['idx']];
	}

    /**
    * Api의 접속 가능 도메인
	* input : 
    * @return Array [ 허용 Domain ] 
    */
	function apiAllowDomain(){
		$fileName = __CONFIG_DIR__.$this->info['path']['allowDomain'];
		$data['allowDomain'] = file_get_contents($fileName);
		return $data;

	}

    /**
    * Api의 접속 가능 도메인 저장
	* input : 
	*        _POST : input Data
    * @return Array [ 저장 메세지 ] 
    */
	function apiSaveAllowDomain(){
		$fileName = __CONFIG_DIR__.$this->info['path']['allowDomain'];
		file_put_contents($fileName,$_POST['allowDomain']);
		echo '{"message":"ok"}';
	}

    /**
    * Api Group List 리턴
	* input : 
	*        _POST : input Data
    * @return Array [ 저장 메세지 ] 
    */
	function apiGroupList(){
		$data['apiList'] = $this->mysql
						-> orderBy('sort','asc')
						-> get($this->info['db']['apiGroup']);
		return $data;
	}

    /**
    * Api Group 수정
	* input : 
	*        _POST : input Data
    * @return Array [ 저장 메세지 ] 
    */
	function apiGroupUpdate(){
		if($_POST['idx']==""){
			unset($_POST['idx']);
			$_POST['maker']=$_SESSION['userName'];
			$_POST['makeDate']=date("Y-m-d H:i:s");
		}else{
			$_POST['modifer']=$_SESSION['userName'];
			$_POST['modifyDate']=date("Y-m-d H:i:s");
		}

		$this->mysql->upsert($this->info['db']['apiGroup'], $_POST);
	}

    /**
    * Api Group 삭제
	* input : 
	*        _POST : idx
    * @return Array [ DB Run Info ] 
    */
	function apiGroupDelete(){
		$data = $this->mysql->where($_POST)->delete($this->info['db']['apiGroup']);
		return $data;
	}

    /**
    * Api Group 순서 변경
	* input : 
	*        _POST : 소팅된 idx
    * @return Array [ DB Run Info ] 
    */
	function apiGroupSort(){
		$idxs = json_decode($_POST['idxs'],true);
		foreach($idxs as $key => $val){
			$this->mysql
	 			 ->where(['idx'=>$val])
				 ->update($this->info['db']['apiGroup'],['sort'=>($key+1)]);
		}
	}
}
?>
