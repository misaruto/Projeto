<?php 
/**
 * 
 */
require_once 'app/lib/Database/Connection.php';
class VerifyLogin 
{
	private $id;
	private $name;
	private $username;
	private $password;
	private $email;
	function __construct()
	{
		//construtor para objeto sem passagem de paramentro
		$this->id = 0;
		$this->name = "";
		$this->username = "";
		$this->password = "";
		$this->email = "";
	}
	public function copia($user)
	{
		//constrututor de copia
		$this->id = $user->id;
		$this->name = $user->name;
		$this->username = $user->username;
		$this->password = $user->password;
		$this->email = $user->email;
	}

	public function verifyLogin($user,$pass)
	{
		$password = md5($pass);
		$con = new Connection; 	 	
		$con = $con->getConn();
		$sql = "SELECT * FROM users WHERE `username` = :u AND `password` = :p";
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':u', $user, PDO::PARAM_STR, 200);
		$stmt->bindParam(':p',$password, PDO::PARAM_STR,32);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			$result = new VerifyLogin;
			$result->copia($stmt->fetch(PDO::FETCH_OBJ));
			session_start();
			$_SESSION['id'] = $result->id;
			$_SESSION['username'] = $result->username;
			return true;

		}
		else{
			return false;
		}
	}
}


?>