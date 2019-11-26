<?php 
	/**
	 * 
	 */
	require_once 'app/Classes/Render.php';
	require_once 'app/Model/SalvaUsuario.php';
	class CrudUsersController extends Render{

		function __construct()
		{
			if (empty($_POST)) {
				$this->setTitle("Schedules/Cadastro"); 
				$this->setDescritpion("cadastro");
				$this->setKeywords("horarios");
				$this->setDir("View/"); 
				$this->renderLayout();

			} 
		}
		public function verificaLogin()
		{
			$user = new SalvaUsuario;
			$res = $user->verificaLogin($_POST['login']);
			if ($res) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
		public function cadastro()
		{
			if (empty($_POST)) {
				include 'app/View/cadastroUsuarios.php';
			}
			else{
				
				$user = new SalvaUsuario;
				$res = $user->salvar($_POST);
				if ($res) {
					echo 1;
				}
				else{
					echo 0;
				}
			}
		}
		public function editUser()
		{
			# code...
		}
	}



	?>