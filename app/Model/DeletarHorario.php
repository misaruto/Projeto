<?php 
/**
 * 
 */
require_once 'app/lib/Database/Connection.php';
class DeletarHorario{
	public function deletar($idSchedule,$idUser)
	{
		
		$con = new Connection;
		$con = $con->getConn();
		$sql = "DELETE FROM schedules WHERE id = ? AND id_user = ?";
		$stmt = $con->prepare($sql);
		$stmt->bindparam(1,$idSchedule,PDO::PARAM_INT,11);
		$stmt->bindparam(2,$idUser,PDO::PARAM_INT,11);
		if ($stmt->execute()) {
			return true;
		}
		else{
			return false;
		}
	}
}


?>