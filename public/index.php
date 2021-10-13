<?php

session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"] . 'src/'));
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require BASEPATH . 'vendor/autoload.php';

use MVC_TRAINING\Dispatcher;

$dispatch = new Dispatcher();