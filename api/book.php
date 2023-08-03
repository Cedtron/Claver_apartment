
<?php
include_once 'dbconn.php';

$nam=$_POST['name'];
 $email=$_POST['email'];
 $tel=$_POST['tel'];
 $rooms=$_POST['room'];
 $infor=$_POST['infor'];

  $sql = "INSERT INTO booking (nam,email,tel,apartment,information,dates)
            VALUES ('$nam','$email','$tel','$rooms','$infor',CURDATE())";

$res= mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE){
echo $email." we shall contact you shortly" ;}
else{
    echo "Error: ". $sql ."<br/>". $conn->error;
}

$conn->close();
?>
