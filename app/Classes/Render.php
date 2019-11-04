<?php 
/**
 * 
 */
class Render
{
	private $dir;
	private $title;
	private $description;
	private $keywords;

	public function getDir()
	{
		return $this->dir;
	}
	public function setDir($dir)
	{
		$this->dir = $dir ;
	}
	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setDescritpion($desc)
	{
		$this->description = $desc ;
	}
	public function getKeywords()
	{
		return $this->keywords;
	}
	public function setKeywords($keyw)
	{
		$this->keywords = $keyw ;
	}
	function __construct()
	{
		# code...
	}
	#metodo de renderizar todo o layout
	public function renderLayout()
	{
		include_once("app/Templates/structure.php");
	}
	#metodo adciona caracteristicas especificas no head
	public function addHead()
	{
		# code...
	}
	#metodo adciona caracteristicas especificas no main
	public function addMain()
	{
		# code...
	}
	#metodo adciona caracteristicas especificas no footer
	public function addFooter()
	{
		# code...
	}
}



?>