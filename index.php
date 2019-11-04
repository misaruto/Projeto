<?php 

error_reporting(E_ALL); ini_set('display_errors', 1); 

require_once 'app/Cores/Dispatch.php';
require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/LoginController.php';
require_once 'app/Controller/ErrorController.php';
require_once './src/vendor/autoload.php';
require './config/config.php';

$d = new Dispatch();

?>
