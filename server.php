<?php 
	session_start();
	// variable declaration
	include 'dbconn.php';

if(isset($_POST['do_login']))
{
$room=$_POST['room'];
 $pass=$_POST['password'];
 $sql="SELECT * FROM ca_details WHERE apartment='$room' AND pass='$pass'";
 $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0) {
   // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
 
  $_SESSION['apartment']=$row['apartment'];
  $_SESSION['names']=$row['names'];
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