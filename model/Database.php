<?php

class Database 
{
	private static $dbName 	   = 'test';
	private static $dbHost 	   = 'localhost';
	private static $dbUsername = 'root';
	private static $dbPassword = 'levansonqs';

	private static $conn = null;

	public function __construct()
	{
		// die('Init function is not allowed');
	}

	public static function connect()
	{
		// One connection through whole application
		if (null == self::$conn)
		{
			try
			{
				self::$conn =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbPassword); 
			} 
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
		}
		return self::$conn;
	}

	public static function disconnect()
	{
		self::$conn = null;
	}

}

?>
