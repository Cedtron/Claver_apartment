<?php
include_once 'dbconn.php';


$nam=$_POST['names'];
 $email=$_POST['emails'];
 $tel=$_POST['tel'];
 $rooms=$_POST['apartment'];
 $infor=$_POST['details'];
 $amount=$_POST['amount'];
 $ref="Cash";
 $now = date('Y-m-d H:i:s');


  $sql = "INSERT INTO ca_transactions (apartment,names,email,tel,amount,reason,reference,dates 	)
            VALUES ('$rooms','$nam','$email','$tel','$amount','$infor','$ref','$now')";

$res= mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE){
    ?>
    <script type="text/javascript">
    alert("The data was successful inserted");
    window.location.href = "http://claverapartment.com/dashboard.php";
    </script>
    <?php

    }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
    
        ?>
        <script type="text/javascript">
        alert(<?php echo $msg; ?>);
        window.location.href = "http://claverapartment.com/dashboard.php";
        </script>
        <?php

    }


    $conn->close();

?>