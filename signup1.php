<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include 'connection.php';
$dbconnect=new DbConnection();
$conn=$dbconnect->getConnection();
	if (!$conn) 
	{
	    die("Connection failed: " . $conn->connect_error);
	    echo json_encode("conn error");
	}
	else
	{

  		if(isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["pass"]))
  		{
	  		$name=$_POST["name"];
			$mail=$_POST["email"];
			$ps=$_POST["pass"];
			$sql="INSERT INTO details(username, email,password) VALUES ('$name','$mail','$ps')";
			$t=mysqli_query($conn,$sql);
			if($t)
			{
			  echo json_encode("user created succesfully");
			}
			else
			{
			  echo json_encode("error in creating user");
			}
		}
	}
mysqli_close($conn);
}
else
{
	echo json_encode("request type error");
}

?>