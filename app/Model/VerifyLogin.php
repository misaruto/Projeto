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
		$sql = "SELECT * FROM users WHERE `username` = ':u' AND `password` = ':p'";
		$con->prepare($sql);
		$con->bindParam(':u', $user, PDO::PARAM_STR, 200);
		$con->bindParam(':p',$password, PDO::PARAM_STR,32);
		$con->execute();
		if ($con->rowCount() == 1) {
			$result = new VerifyLogin;
			$result->copia($con->fetch(PDO::FETCH_OBJ));
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