<?php
 if (isset($_SERVER['REQUEST_METHOD'] === 'POST')) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname="blogdb";
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
else{

  $newfile=$_FILES['userprofile']['name'];
  $temp=$_FILES['userprofile']['tmp_name'];
  $name=$_POST["username"];
  $reg=$_POST["regno"];
  $mail=$_POST["user_email"];
  // $profile=$_POST["userprofile"];
  $ps=$_POST["userpass"];
  $ins=$_POST["Institution"];
  $edu=$_POST["course"];
  $hash = md5( $name);
// $sql="INSERT INTO user-info ( regno , username , email , profilephoto , password , institution , education ) VALUES ('".$_POST["regno"]."','".$_POST["username"]."','".$_POST["user_email"]."','".$_POST["userprofile"]."','".$_POST["userpass"]."','".$_POST["Institution"]."','".$_POST["Institution"]."')";

  $sql="INSERT INTO userinfo(username, regno, email, institution, education, password,hash) VALUES ('$name','$reg','$mail','$ins','$edu','$ps','$hash')";


$t=mysqli_query($conn,$sql);

if($t)
{
  $_SESSION['username']=$_POST["username"];
  $_SESSION['regno']=$_POST["regno"];
  $_SESSION['email']=$_POST["user_email"];

  $newfile=$_FILES['userprofile']['name'];
  $temp=$_FILES['userprofile']['tmp_name'];

    $target="profiles/".basename($newfile);
    move_uploaded_file($name,$target);

  header("Location: verify.php");
}
else
{

echo $t."error in creating user";
echo "already a user<a href='login.php'>Login</a>";




}

}
mysqli_close($conn);
}?>
