<?php
/**
 * Hkapi 함수 (서비스 API)
 *
 * @file
 * @author  Kodes <mook@kode.co.kr>
 * @version 1.0
 *
 * @section LICENSE
 * 해당 프로그램은 kodes에서 제작된 프로그램으로 저작원은 코드스
 * https://www.kodes.co.kr
 *
 * http://hk.kode.co.kr/hkapi/get?id=bokBenchRate&startDate=20210801&endDate=20210810&axisY=date&axisX=data
 *
 */

class Hkapi
{
	static private $info;
    static private $mysql;

    /*
     * Compnay 생성자 config, DB 셋팅
	 * 혀용 도메인 확인
     */
    function __construct(){
       global $System;
	   self::$info = $System;
	   $this->mysql = new Mysql($System['db']['host'],$System['db']['user'], $System['db']['passwd'],$System['db']['database']);

		if(!$this->permissionDomain()){
			echo "허용되지 않는 Domain의 호출 입니다.";
			die();
		}
    }

    /**
    * 사용 가능한 도메인인지 확인
    * @return Array  [ api Field List] 
    */
	function permissionDomain(){
		$rtrnData = false;
		$fileName = __CONFIG_DIR__.self::$info['path']['allowDomain'];
		$data = file_get_contents($fileName);

		if(trim($data)!=""){
			$data = explode("\n",$data);
			foreach($data as $val){
				$val = str_replace(['*','.'],['.*','[.]'],$val);
				if(preg_match('/'.$val.'/',$_SERVER['HTTP_REFERER'])){
					$rtrnData = true;
					break;
				}
			}
		}else{
			$rtrnData = true;
		}

		return $rtrnData;
	}

    /**
    * api 데이터 json 
    * @return Array  [ api Field List] 
    */
	function hkapiGet(){
		$list = $this->getJsonData();

		if(!$list){
			$list = $this->getDbJsonData();
			$this->putJsonData($list);
		}
		
		$data['axisY']=array_column($list,$_GET['axisY']);
		$data['axisX']=array_column($list,$_GET['axisX']);

		echo json_encode($data);
	}


    /**
    * DB에서 api 데이터를 리턴
    * @return Array  [ api data ] 
    */
	function getDbJsonData(){
		$endDate='';
		$startDate='';
		$tags='*';

		if($this->mysql->existTable($_GET['id'])){
			if($_GET['endDate']){
				$endDate=["date"=>['<=',$_GET['endDate']]];
			}
			if($_GET['startDate']){
				$startDate=["date"=>['>=',$_GET['startDate']]];
			}
			if($_GET['axisY']!="" && $_GET['axisX']!=""){
				$tags=$_GET['axisY'].','.$_GET['axisX'];
			}
			$list = $this->mysql->where($endDate)->where($startDate)->get($_GET['id'],$tags);
		}
		return $list;
	}

    /**
    * cache 파일을 읽어 api 데이터를 리턴
    * @return Array  [ api data ] 
    */
	function getJsonData(){
		if(is_file(self::$info['path']['apiCache'])){
			return "";
		}else{
			return "";
		}
	}

    /**
    * api 데이터를 cache 파일에 기록
    * @return json
    */
	function putJsonData(){}
}
?>