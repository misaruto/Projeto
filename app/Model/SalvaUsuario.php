<?php 
/**
 * 
 */
require_once 'app/lib/Database/Connection.php';
class SalvaUsuario 
{
	public function salvar($post)
	{
		$name = $post['nome'];
		$email = $post['email'];
		$login = $post['login'];
		$passwd = md5($post['passwd']);
		$con = new Connection;
		$con = $con->getConn();
		$sql = "INSERT INTO `users`(`name`, `email`, `username`, `password`) VALUES(?, ?, ?, ?)";
		if (self::verificaLogin($login)) {
			

			$stmt = $con->prepare($sql);
			$stmt->bindparam(1,$name,PDO::PARAM_STR,200);
			$stmt->bindparam(2,$email,PDO::PARAM_STR,200);
			$stmt->bindparam(3,$login,PDO::PARAM_STR,200);
			$stmt->bindparam(4,$passwd,PDO::PARAM_STR,32);

			if ($stmt->execute()) {
				return true;

			}
			else{
				return false;
			}
		}
		else{
			return false;
		}

	}
	public function verificaLogin($login)
	{
		$con = new Connection;
		$con = $con->getConn();
		$sql = "SELECT username FROM `users` WHERE `username` = ?";
		$stmt = $con->prepare($sql);
		$stmt->bindparam(1,$login);
		$stmt->execute();
		if ($stmt->rowCount()==0) {
			return true;
		}
		else{
			return false;
		}
	}
}
?>