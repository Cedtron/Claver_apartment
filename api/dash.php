<?php
include_once 'dbconn.php';

$nam=$_POST['names'];
 $code=$_POST['code'];

 $password=$_POST['pass'];

    $sql = "UPDATE admin SET user='$nam' ,pass='$password',scode='$code'WHERE id=1";        


    $res= mysqli_query($conn,$sql);

    if ($conn->query($sql) === TRUE){
    echo $email." Your information has been updataed succssfully" ;}
    else{
        echo "Error: ". $sql ."<br/>". $conn->error;
    }
    
    $conn->error;
    ?>