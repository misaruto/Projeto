<?php 
/**
 * 
 */
require_once 'app/Classes/Render.php';
class CrudSchedulesController extends Render
{
	
	function __construct()
	{

		session_start();

		if (isset($_SESSION['id'])) {
			if (empty($_POST)) {
				$this->setTitle("Horarios"); 
				$this->setDescritpion("horarios");
				$this->setKeywords("horarios");
				$this->setDir("View/"); 
				$this->renderLayout();
			}
		}
	}
	public function cadastrar()
	{	
		if (empty($_POST)) {
			$nav = file_get_contents('app/View/nav.php');
			$home = file_get_contents('app/View/cadastroHorarios.php');
			$nav = str_replace("{{DIRPAGE}}", DIRPAGE, $nav);
			$home = str_replace("{{nav-area}}", $nav, $home);
			echo $home;
		}
		else{

			if ((isset($_POST['nome']))&&(isset($_POST['desc']))&&(isset($_POST['h-final']))&&(isset($_POST['h-inicial']))&&(isset($_POST['d-inicial']))&&(isset($_POST['d-final']))&&(isset($_SESSION['id']))) {
				require_once 'app/Model/SalvaHorario.php';
				$new = new SalvaHorario;

				$salva = $new->salvar($_POST,$_SESSION['id']);
				var_dump($salva);
				if ($salva) {
					echo "salvo";
				}
			}
			else{
				return 0;
			}
		}
	}
}


?>