<?php
/**
 * Login Class
 * 
 * @file
 * @author  Kodes <kodesinfo@gmail.com>
 * @version 1.0
 *
 * @section LICENSE
 * 해당 프로그램은 kodes에서 제작된 프로그램 입니다.
 * https://www.kodes.co.kr
 */
class Login
{
    private $common;

    function __construct(){
    }


    /**
    * 로그인 체크
	* input : 
    * @return
    */
    function loginCheck(){
		global $System;
		$mysql = new Mysql($System['db']['host'],$System['db']['user'], $System['db']['passwd'],$System['db']['database']);

		Log::writeLog('',"\t".$_SERVER["REMOTE_ADDR"]."\t".'|'.$_POST['userId'].'|'.$_POST['password'].'|'."\t".$_SERVER['HTTP_REFERER'],'login');

		$row = $mysql 	-> where(['id' => $_POST['userId'],'password'=>"password('$_POST[password]')"])
						-> get($System['db']['member'],['id', 'name','email','coid']);

		// echo $mysql -> last_query();
		if($row[0]['id']!=""  && $row[0]['name']!=""){
			$_SESSION['auth']=$row[0];
			if($_GET['rlink']!=""){
				$row[0]['moveTo']=$_GET['rlink'];
			}else{
				$tmp = $row[0]['id']. "::";
				$tmp.= $row[0]['name']. "::";
				$tmp.= $row[0]['email'];

				setcookie("datachart", $this->crypt_md5($tmp, "datachart"), 0, "/", "", false, true);
				$row[0]['moveTo']="/api/list";
			}
			echo json_encode($row[0]);
		}else{
			echo '{"msg":"fail"}';
		}
	}

    /**
    * 로그인 유 / 무 확인
	* input : 
    * @return
    */
	function loginInfo(){
		if($_SESSION['userId']=="" ||  $_SESSION['userName']==""){
			header("Location : /login");
			die();
		}
	}

    /**
    * 로그아웃
	* input : 
    * @return
    */
	function loginOut(){
		$_SESSION['userId']="";
		$_SESSION['userName']="";
		$_SESSION['userEmail']="";
		session_unset();
		header("Location: /login");
	}
}
?>
