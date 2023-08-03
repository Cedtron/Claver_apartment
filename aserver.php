<?php 

	
// variable declaration
include 'dbconn.php';

if(isset($_POST['dash']))
{
$admin=$_POST['admin'];
$pass=$_POST['password'];
$sql="SELECT * FROM admins WHERE user='$admin' AND pass='$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {

  $cookie_value=$row['user'];
  $cookie_name="pass";
setcookie($cookie_name, $cookie_value, time() + 3600, "http://claverapartment.com");
 
  // $_SESSION['pass']=$row['user'];
  
echo 1;
// header('location: http://localhost/apartm/uprofile.php');
}
}else
{
echo "Error: ". $sql ."<br/>". $conn->error;
// echo "fail";
}

}
exit();
?>
