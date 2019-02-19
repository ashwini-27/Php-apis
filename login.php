<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="blogdb";
$conn = new mysqli($servername, $username, $password,$dbname);

if(isset($_SERVER['REQUEST_METHOD'] === 'POST'))
{
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
        echo json_encode("connection problem in server");
    }
    else
    {
      $ps=$_POST["userpass"];
      $mail=$_POST["useremail"];
      $sql=" SELECT * FROM userinfo WHERE password= '$ps' AND email='$mail' ";
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

}

$conn->close();

?> 
    </body>
</html>


