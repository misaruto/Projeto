<?php 
/**
 * 
 */
require_once "app/lib/Database/Connection.php";
class SalvaHorario extends
{
	private $id;
	private $id_user;
	private $name;
	private $description;
	private $i_time;
	private $i_date;
	private $f_time;
	private $f_date;

	public function setName($name){  $this->name = $name; }
	public function setDescription($desc){  $this->description = $desc; }
	public function setInitialTime($i_time){  $this->i_time = $i_time; }
	public function setInitialDate($i_date){  $this->i_date = $i_date; }
	public function setFinalTime($f_time){  $this->f_time = $f_time; }
	public function setFinalDate($f_date){  $this->f_date = $f_date; }
	public function copia($schedules,$idUser){
		$this->id_user = $idUser;
		$this->name = $schedules['name'];
		$this->description = $schedules['desc'];
		$this->i_time = $schedules['h-inicial'];
		$this->i_date = $schedules['d-inicial'];
		$this->f_time = $schedules['h-final'];
		$this->f_date = $schedules['d-final'];
}
	public function salvar($post,$idUser){
		$schedule = $this->copair($post,$idUser);
		var_dump($schedule);
	}
}



?>