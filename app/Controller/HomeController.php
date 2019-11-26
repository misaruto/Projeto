<?php 
require_once 'app/Classes/Render.php';
require_once 'app/Model/Schedules.php';
class HomeController extends Render
{

	function __construct()
	{
		session_start();

		if (isset($_SESSION['id'])) {
			if (empty($_POST)) {
				$this->setTitle("Home"); 
				$this->setDescritpion("Pagina Home");
				$this->setKeywords("home");
				$this->setDir("View/"); 
				$this->renderLayout();
				self::index();
			}
		}
		else{
			header("location:".DIRPAGE."login");
		}

	}
	public function reload(){
		require_once  "app/View/HomeAjax.php";
		$exit = call_user_func('reloadBody');
		echo $exit;
	}
	public function index()
	{
		$nav = file_get_contents('app/View/nav.php');
		$home = file_get_contents('app/View/home.php');
		$nav = str_replace("{{DIRPAGE}}", DIRPAGE, $nav);
		$home = str_replace("{{nav-area}}", $nav, $home);
		$home = str_replace("{{DIRJS}}", DIRJS, $home);
		$id = $_SESSION['id'];
		$schedules = new Schedules;
		$center = $schedules->select($id);
		$itens = "";
		if ($center == NULL) {
			$itens = "
			<tr>
			<td colspan=6>
			<div class='alert alert-info'>
			<center>
			<b>
			Nenhum horário encontrado
			</b>
			</center>
			</div>
			</td>
			</tr>";
		}
		else{
			foreach ($center as $value) {
				$data_inicio = date('d/m/Y',strtotime($value->initial_date));
				$data_fim = date('d/m/Y',strtotime($value->final_date));
				$itens = $itens."
				<tr class='tr' >
				<td onclick='detalhar(".$value->id.")' title='Clique duas vezes para editar'>
				<center>".$value->name."</center>
				</td>
				<td onclick='detalhar(".$value->id.")' title='Clique para editar'>
				<center>".$data_inicio."</center>
				</td>
				<td onclick='detalhar(".$value->id.")' title='Clique para editar'>
				<center>".$data_fim."</center>
				</td>
				<td onclick='detalhar(".$value->id.")' title='Clique para editar'>
				<center>".$value->initial_time."</center>
				</td>
				<td onclick='detalhar(".$value->id.")' title='Clique para editar'>
				<center>".$value->final_time."</center>
				</td>
				<td>
				<button onclick='deletar(".$value->id.")' class='btn btn-outline-danger btn-block'>
				Deletar
				</button>
				</td>
				</tr>";
			}
		}
		$home = str_replace("{{dinamic-area}}", $itens, $home);
		echo $home;
	}
}

?>