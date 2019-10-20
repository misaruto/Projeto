<?php 

abstract class Connection{
	private static $conn;
	private static $db = 'schedules';
	private static $user = 'root';
	private static $pas = '';
	public static function getConn(){

		if (self::$conn==NULL) {

		self::$conn = new PDO('mysqli: host=localhost; dbname='.$db,$user,$pas);
	
		}
		
		return self::$conn;
	}
}



 ?>