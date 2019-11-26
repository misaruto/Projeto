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
		$con = $con->getConn();
		$sql = "SELECT * FROM schedules WHERE id = ?";

		$stmt = $con->prepare($sql);
		$stmt->bindparam(1,$id_schedule);
		$c = $stmt->execute();
		$schedule = $stmt->fetch(PDO::FETCH_ASSOC);
		return $schedule;
	}
	public function saveEditions($post){
		$nome = $post['nome'];
		$desc = $post['desc'];
		$hInicial = $post['h-inicial'];
		$dInicial = $post['d-inicial'];
		$hFinal = $post['h-final'];
		$dFinal = $post['d-final'];
		$idSchedule = $post['idSchedule'];

		$con = new Connection;
		$con = $con->getConn();
		$sql = "UPDATE `schedules` SET `name`= ?,`description`= ?,`initial_date`= ?,`final_date`= ?,`initial_time`= ?,`final_time`= ? WHERE id = ?";

		$stmt = $con->prepare($sql);

		$stmt->bindparam(1,$nome);
		$stmt->bindparam(2,$desc);
		$stmt->bindparam(3,$dInicial);
		$stmt->bindparam(4,$dFinal);
		$stmt->bindparam(5,$hInicial);
		$stmt->bindparam(6,$hFinal);

		$stmt->bindParam(7,$idSchedule);

		if ($stmt->execute()) {
			return true;
		}
		else{
			return false;
		}
	}
}
?>
