<?php

define('APPLICATION_PATH', dirname(__FILE__));
include_once __DIR__. DIRECTORY_SEPARATOR .'vendor/autoload.php';
$application = new Yaf_Application( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
?>
