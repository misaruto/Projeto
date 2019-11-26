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

	public function detalhar($id){
		$id = implode('',$id);
		require_once("app/Model/EditaHorario.php");
		//reutiliza a função que retorna um horario que tem o id passado como parametro
		$see = new EditaHorario;
			//retorna um array contendo os campos de um hoario
		$schedule = $see->getHorario($id);

		echo json_encode($schedule);
	}

	public function cadastrar()
	{	
		if (empty($_POST)) {
			$nav = file_get_contents('app/View/nav.php');
			$home = file_get_contents('app/View/cadastroHorarios.php');
			$nav = str_replace("{{DIRPAGE}}", DIRPAGE, $nav);
			$home = str_replace("{{nav-area}}", $nav, $home);
			$home = str_replace("{{js-directory}}", DIRJS, $home);
			echo $home;
		}
		else{

			if ((isset($_POST['nome']))&&(isset($_POST['desc']))&&(isset($_POST['h-final']))&&(isset($_POST['h-inicial']))&&(isset($_POST['d-inicial']))&&(isset($_POST['d-final']))&&(isset($_SESSION['id']))) {
				require_once 'app/Model/SalvaHorario.php';
				$new = new SalvaHorario;

				$salva = $new->salvar($_POST,$_SESSION['id']);
				if ($salva) {
					echo 1;
				}
				else{
					echo 0;
				}
			}
			else{
				return false;
			}
		}
	}
	public function editar($id_schedule)
	{
		require_once("app/Model/EditaHorario.php");
		$edit = new EditaHorario;
		$id = implode('',$id_schedule);
		if ($id != 0) {
			//retorna um array contendo os campos de um hoario
			$schedule = $edit->getHorario($id);
			
			echo json_encode($schedule);
		}
		else{
			
			$schedule = $edit->saveEditions($_POST);
			if ($schedule) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}

	public function deletar()
	{
		//verifica a existencia do id do usuario na sessão e se enviou o id do horario que quer apagar.
		if ((isset($_SESSION['id']))&&(isset($_POST['id']))) {
			require_once 'app/Model/DeletarHorario.php';
			$del = new DeletarHorario;
			$res = $del->deletar($_POST['id'],$_SESSION['id']);
			if ($res) {
				echo 1;
			}
			else{
				echo 0;
			}
		}	
	}
}


?>