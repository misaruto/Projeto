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

	}
	public function index()
	{
		$nav = file_get_contents('app/View/nav.php');
		$home = file_get_contents('app/View/home.php');

		$home = str_replace("{{nav-area}}", $nav, $home);
		$id = $_SESSION['id'];
		$schedules = new Schedules;
		$center = $schedules->select($id);
		var_dump($center);
		echo $home;
	}
}

?>