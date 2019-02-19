<?php
	

	

	class DbConnection 
	{


		
		private $connection;
		private $servern;
		function __construct()
		{
				require 'config.php';
			// $servern=$servername;
		// 	$servername='localhost';
		// $username='root';
		// $password='';
		// $dbname='users';
			$this->connection=new mysqli($servername, $username, $password,$dbname) or die("Connection failed: " . $conn->connect_error);
		}
		
		public function getConnection()
		{
				return $this->connection;
		}
	}



?>