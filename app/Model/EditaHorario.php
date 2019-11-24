<?php 
/**
 * 
 */
require_once "app/lib/Database/Connection.php";
class EditaHorario 
{
	public function getHorario($id_schedule)
	{
		$con = new Connection;
		$sql = "SELECT * FROM schedule WHERE id = :id_schedule";
		$stmt = $con->prepare($sql);
		$stmt->bindpara(':id_schedule',$id_schedule);
		$schedule = $stmt->fetch(PDO::FETCH_ASSOC);
		return $schedule;
	}
}

 ?>