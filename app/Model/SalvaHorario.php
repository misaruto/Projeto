<?php 
require_once "app/lib/Database/Connection.php";
class SalvaHorario
{
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

	public function getIdUser(){ return $this->id_user; }
	public function getName(){ return $this->name; }
	public function getDescription(){ return $this->description; }
	public function getInitialTime(){ return $this->i_time; }
	public function getInitialDate(){ return $this->i_date; }
	public function getFinalTime(){ return $this->f_time; }
	public function getFinalDate(){ return $this->f_date; }
	

	public function salvar($post,$idUser){

		$nome = $post['nome'];
		$desc = $post['desc'];
		$hInicial = $post['h-inicial'];
		$dInicial = $post['d-inicial'];
		$hFinal = $post['h-final'];
		$dFinal = $post['d-final'];

		$con = new Connection;
		$con = $con->getConn();
		$sql = "INSERT INTO `schedules`(`id_user`, `name`, `description`, `initial_date`, `final_date`, `initial_time`, `final_time`) VALUES (?,?,?,?,?,?,?)";
		$stmt = $con->prepare($sql);

		$stmt->bindParam(1,$idUser);
		$stmt->bindParam(2,$nome);
		$stmt->bindParam(3,$desc);
		$stmt->bindParam(4,$dInicial);
		$stmt->bindParam(5,$dFinal);
		$stmt->bindParam(6,$hInicial);
		$stmt->bindParam(7,$hFinal);
		

		if ($stmt->execute()) {
			return true;
		}
		else{
			return false;
		}
	}
}



?>