<?php
include('dbconn.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    delete_data($conn, $id);
}
// delete data query
function delete_data($conn, $id){
   
    $query="DELETE from booking WHERE id=$id";
    $exec= mysqli_query($conn,$query);
    if($exec){
      ?>
    <script type="text/javascript">
    alert("The data delete was successful");
    window.location.href = "http://claverapartment.com/dbooking.php";
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