<?php
include('dbconn.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    
    delete_data($conn, $id);
}
// delete data query
function delete_data($conn, $id){
   $pass="claver";
    $query="UPDATE ca_details SET pass = '$pass' WHERE Id = $id ;";
    $exec= mysqli_query($conn,$query);
    if($exec){
      ?>
    <script type="text/javascript">
    alert("The passwprd reset was successful");
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

    }
}
?>