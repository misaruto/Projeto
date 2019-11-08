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
		require_once 'app/View/cadastrar.php';
	}
}


?>