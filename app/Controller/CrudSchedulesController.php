<?php 
/**
 * 
 */
require_once 'app/Classes/Render.php';
class CrudSchedulesController extends Render
{
	
	function __construct()
	{
		$this->setTitle("Horarios"); 
		$this->setDescritpion("horarios");
		$this->setKeywords("horarios");
		$this->setDir("View/"); 
		$this->renderLayout();
	}
	public function cadastrar()
	{	
		include 'app/View/nav.php';
		require_once 'app/View/cadastroHorarios.php';
	}
}


?>