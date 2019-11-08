<?php 
/**
 * 
 */
require_once 'app/lib/Database/Connection.php';
class Schedules
{
	private $id;
	private $id_user;
	private $name;
	private $description;
	private $i_time;
	private $i_date;
	private $f_time;
	private $f_date;

	function __construct()
	{
		$this->id = 0;
		$this->id_user = 0;
		$this->name = "";
		$this->description = "";
		$this->i_time = 0;
		$this->i_date = 0;
		$this->f_time = 0;
		$this->f_date = 0;
	}
#	public function getId(){ return $this->id; }
#	public function getIdUser(){ return $this->id_user; }
	public function getName(){ return $this->name; }
	public function getDescription(){ return $this->description; }
	public function getInitialTime(){ return $this->i_time; }
	public function getInitialDate(){ return $this->i_date; }
	public function getFinalTime(){ return $this->f_time; }
	public function getFinalDate(){ return $this->f_date; }

	public function copia($schedules)
	{
		$this->id = $schedules->id;
		$this->id_user = $schedules->id_user;
		$this->name = $schedules->name;
		$this->description = $schedules->description;
		$this->i_time = $schedules->initial_time;
		$this->i_date = $schedules->initial_date;
		$this->f_time = $schedules->final_time;
		$this->f_date = $schedules->final_date;
	}
	public function select($id_user)
	{
		$con = New Connection;
		$con = $con->getConn();
		$sql = "SELECT * FROM schedules WHERE id_user = :id";
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id',$id_user,PDO::PARAM_INT,11);
		$stmt->execute();
		if ($stmt->rowCount()>=1) {
			$schedules = new Schedules;
			$res = array();
			while ($stmt->fetch()) {
				$res = $res . $stmt->fetch();
			}
			var_dump($res);
			echo "$res[0]";
			die();
			$schedules->copia($stmt->fetch(PDO::FETCH_OBJ));
			var_dump($schedules);
			//return $schedules;
		}
		else{
			return NULL;
		}
	}
}


?>