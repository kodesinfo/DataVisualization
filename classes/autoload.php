<?php
/**
 * config 및 auto Script loding  
 *
 * @author  Kodes <mook@kode.co.kr>
 * @version 1.0
 *
 * @section LICENSE
 * 해당 프로그램은 kodes에서 제작된 프로그램 입니다.
 * https://www.kodes.co.kr
 */

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);*/
define('__SITE_ROOT__',preg_replace('/\/[^\/]+$/','/',__DIR__));
define('__CONFIG_DIR__',__SITE_ROOT__.'config/');

date_default_timezone_set('Asia/Seoul');
// 크롬에서 POST 값을 출력할수 없게 되어있는 것을 회피하기위한 해더
header('X-XSS-Protection: 0');

//require '/webSiteSource/hk/vendor/autoload.php';
spl_autoload_register(function ($class) {
	$path = __DIR__.'/' . $class . '.class.php';

	if(is_file(__DIR__.'/' . $class . '.class.php')){
	    include $path;
	}
});

$rc=file_get_contents(__CONFIG_DIR__."/config.json.php");
$System=json_decode($rc,true);
?>
