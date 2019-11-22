<?php 
require_once 'app/Classes/Render.php';
require_once 'app/Model/Schedules.php';
class HomeController extends Render
{

	function __construct()
	{
		session_start();

		if (isset($_SESSION['id'])) {
			$this->setTitle("Home"); 
			$this->setDescritpion("Pagina Home");
			$this->setKeywords("home");
			$this->setDir("View/"); 
			$this->renderLayout();
			self::index();
		}
		else{
			header("location:".DIRPAGE."login");
		}

	}
	public function index()
	{
		$nav = file_get_contents('app/View/nav.php');
		$home = file_get_contents('app/View/home.php');
		$nav = str_replace("{{DIRPAGE}}", DIRPAGE, $nav);
		$home = str_replace("{{nav-area}}", $nav, $home);
		$id = $_SESSION['id'];
		$schedules = new Schedules;
		$center = $schedules->select($id);
		$itens = "";
		foreach ($center as $value) {
			$itens = $itens."
			<tr>
			<td>
			".$value->name."
			</td>
			<td>
			".$value->initial_date."
			</td>
			<td>
			".$value->final_date."
			</td>
			<td>
			".$value->initial_time."
			</td>
			<td>
			".$value->final_time."
			</td>
			</tr>";
		}
		$home = str_replace("{{dinamic-area}}", $itens, $home);
		echo $home;
	}
}

?>