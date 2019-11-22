<?php 
	/**
	 * 
	 */
	require_once 'app/Classes/Render.php';
	require 'app/Classes/Captcha.php';
	class LoginController extends Render
	{

		function __construct()
		{
			session_start();

			if (isset($_SESSION['id'])) {
				header('location:'.DIRPAGE.'home');	
			}
			else{
				if (empty($_POST)) {
					
					$this->setTitle("Login"); 
					$this->setDescritpion("pagina de login");
					$this->setKeywords("login");
					$this->setDir("View/"); 
					$this->renderLayout();
					self::index();
				}
			}

		}
		public function index()
		{
			require_once 'app/View/login.php';
		}
		//função que verifica o login do usuario
		public function verify(){
			//verifica a existencia de todas as variaveis nescessarias
			if ((isset($_POST['username']))&&(isset($_POST['password']))&&(isset($_POST['g-recaptcha-response']))) {
				//Instancia um objeto de verificação do captcha
				$validate = new Captcha;
				//cria variaveis locais para verificação
				$username = $_POST['username'];
				$password = $_POST['password'];
				$captcha = $_POST['g-recaptcha-response'];
				//chama o metodo de validação do captcha
				if ($validate->validate($captcha)) {
					//se sim, chama a classe de verificação de login
					require_once 'app/Model/VerifyLogin.php';
					//instancia um objeto de verificação de login
					$vl = new VerifyLogin();
					//velida os dados do usuario
					
					if ($vl->verifyLogin($username,$password)) {
						json_encode(true);
						echo "true";
					}
					else{
						echo "false";
					}
				}
				else{
					echo "false";

				}

			}
			else{
				echo "false";

			}
		}

	}

	?>