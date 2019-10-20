<?php 
require_once 'App/Core/Core.php';
require_once 'App/Controller/ErrorController.php';
require_once 'App/Controller/VerifyLoginController.php';
require_once 'App/Controller/LoginController.php';

if (isset($_POST)) {
	$POST = $_POST;
}
else{
	$POST = array();
}
ob_start();
$core = new Core;
$core->start($_GET,$POST);
$exit = ob_get_contents();
ob_clean();

$template = file_get_contents("App/Templates/structureLogin.html");
$final_template = str_replace("{{dynamic-area}}", $exit, $template);
echo $final_template;
 ?>
