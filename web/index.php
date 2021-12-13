<?php
include_once("../classes/autoload.php");
session_start();

header('X-XSS-Protection: 0');
//error_reporting(E_ERROR | E_WARNING);

$idx = new Index();
?>