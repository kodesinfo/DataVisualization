<?php
/**
 * Log Class
 * 
 * @file
 * @author  Kodes <kodesinfo@gmail.com>
 * @version 1.0
 *
 * @section LICENSE
 * 해당 프로그램은 kodes에서 제작된 프로그램 입니다.
 * https://www.kodes.co.kr
 */
class Log{

	function __construct() {
	}

    /**
     * 로그 파일 쓰기
     *
     * @param string $coid
     * @param string $msg
     * @param string $flag
     * @return void
     */
	static function writeLog($coid, $msg, $flag=""){
        global $System;
		$logDir = str_replace("{coId}",$coid,$System["path"]["logData"]).date('Y').'/'.date('m').'/';
		
		if (!is_dir($logDir)) {
			mkdir($logDir, 0777, true);
			chown($logDir, 'apache');
			chgrp($logDir, 'apache');
		}
		
		$date = date("Y-m-d H:i:s");
		$filename = $logDir.date('Y').date('m').date('d')."_".$flag.'.log';
		file_put_contents($filename, "[".$date."] ".$msg."\n", FILE_APPEND );
		chown($filename, 'apache');
		chgrp($filename, 'apache');
	}
}