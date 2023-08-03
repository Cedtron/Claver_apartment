<?php
include('dbconn.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];

    reset_data($conn, $id);
}
// delete data query
function reset_data($conn, $id){
    $names="user";
    $email="user@email.com";
    $tel="07777777";
    $tel2="0777777";
    $pass="claver";

    $query="UPDATE ca_details SET `names`='$names',`email`='$email',`tel`='$tel' ,`tel_2`='$tel2' , `pass` = '$pass', `dates`=CURDATE() WHERE `id` = $id";
    $exec= mysqli_query($conn,$query);
    if($exec){
      ?>
    <script type="text/javascript">
    alert("The room reset was successful");
    window.location.href = "http://claverapartment.com/dapart.php";
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

    };
};
?>