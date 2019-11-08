<?php 
require_once 'app/Classes/Render.php';
class HomeController extends Render
{

	function __construct()
	{
		$this->setTitle("Home"); 
		$this->setDescritpion("Pagina Home");
		$this->setKeywords("home");
		$this->setDir("View/"); 
		$this->renderLayout();
		self::index();

	}
	public function index()
	{
		require_once 'app/View/home.php';
	}
}

?>