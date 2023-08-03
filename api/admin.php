<?php
include_once 'dbconn.php';

$nam=$_POST['names'];
 $code=$_POST['scode'];
 $password=$_POST['pass'];

    $sql = "UPDATE admins SET user='$nam',pass='$password' ,scode='$code' WHERE id=1";        

$res= mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE){
echo " Your information has been updataed succssfully <br/>You need to log in again" ;}
else{
    echo "Error: ". $sql ."<br/>". $conn->error;
}

$conn->close();
?>