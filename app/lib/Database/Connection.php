<?php 
class Connection
{

	private $host;
	private $db_name;
	private $username;
	private $password;
	public $conn;
	function __construct()
	{
		$host = "127.0.0.1";
		$db_name = "bdschedules";
		$username = "root";
		$password = "";
		$conn;
	}
	public  function getConn(){
		$this->conn = null;
		try {
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception) {
			echo "Connection error: " . $exception->getMessage();
		}

		return $this->conn;
	}
}



?>