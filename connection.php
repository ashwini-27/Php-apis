<?php
	require__once 'config.php';

	/**
	* 
	*/
	class DbConnection extends AnotherClass
	{
		
		private $connection;

		function __construct(argument)
		{
			$this->connection=new mysqli($servername, $username, $password,$dbname) or die("Connection failed: " . $conn->connect_error);
		}
		
		public function getConnection()
		{
				return $this->connection;
		}
	}



?>