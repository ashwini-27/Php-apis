<?php
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$servername = "localhost";
$username = "root";
$password = "";
$dbname="users";
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
    echo "conn error";
}
else{

  // $newfile=$_FILES['userprofile']['name'];
  // $temp=$_FILES['userprofile']['tmp_name'];
  if(isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["pass"]))
  {
  $name=$_POST["name"];
  // $reg=$_POST["regno"];
  $mail=$_POST["email"];
  // $profile=$_POST["userprofile"];
  $ps=$_POST["pass"];
  // $ins=$_POST["Institution"];
  // $edu=$_POST["course"];
  // $hash = md5( $name);
// $sql="INSERT INTO user-info ( regno , username , email , profilephoto , password , institution , education ) VALUES ('".$_POST["regno"]."','".$_POST["username"]."','".$_POST["user_email"]."','".$_POST["userprofile"]."','".$_POST["userpass"]."','".$_POST["Institution"]."','".$_POST["Institution"]."')";

  $sql="INSERT INTO details(username, email,password) VALUES ('$name','$mail','$ps')";


$t=mysqli_query($conn,$sql);
// $t=true;
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
}?>
