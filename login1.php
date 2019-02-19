<?php
include 'connection.php';
$dbconnect=new DbConnection();
$conn=$dbconnect->getConnection();
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
        echo json_encode("connection problem in server");
    }
    else
    {

      if (isset($_POST["pass"])&&isset($_POST["email"])) {
        # code...
      
      $ps=$_POST["pass"];
      $mail=$_POST["email"];

      $sql=" SELECT * FROM details WHERE password= '$ps' AND email='$mail' ";
      $result=$conn->query($sql);
      if ($result->num_rows>0) 
      {
        while($row = $result->fetch_assoc())
        {
          echo json_encode($row);
        }   
      } 
      else 
      {
          echo json_encode("user not found");
      }
    }
    else
    {
      echo json_encode("query fields error");
    }
  }

}
else
{
  echo json_encode("query error");
}

$conn->close();


?>