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
		$this->host = "localhost";
		$this->db_name = "bdschedules";
		$this->username = "root";
		$this->password = "";
		$this->conn=NULL;
		self::getConn();
	}
	public  function getConn(){
		if ($this->conn == NULL) {
			
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);

		}

		return $this->conn;
	}
}



?>