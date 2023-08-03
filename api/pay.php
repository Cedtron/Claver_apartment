<?php
include_once 'dbconn.php';

$user = $_POST['user'];

$decoded = json_decode($user);

//var_dump the array so that we can view it's structure.
var_dump($decoded);



$nam=$decoded->name;
 $email=$decoded->email;
 $tel=$decoded->tel;
 $rooms=$decoded->room;
 $infor=$decoded->reason;
 $amount=$decoded->amount;
 $ref=$decoded->ref;
 $now = date('Y-m-d H:i:s');
 
 $check=mysqli_query($conn,"SELECT * FROM ca_transactions WHERE reference='$ref'");
 $checkrows=mysqli_num_rows($check);

if($checkrows>0) {
   echo "customer exists";
} else {


  $sql = "INSERT INTO ca_transactions (apartment,names,email,tel,amount,reason,reference,dates 	)
            VALUES ('$rooms','$nam','$email','$tel','$amount','$infor','$ref','$now')";

$res= mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE){
echo $email." Payment successfully" ;}
else{
    echo "Error: ". $sql ."<br/>". $conn->error;
}
}

$conn->close();

?>