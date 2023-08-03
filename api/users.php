<?php
include('dbconn.php');

$id= $_POST['id'];    
  
    update_data($conn, $id);

// update data query
function update_data($conn, $id){

 $nam=$_POST['names'];
 $email=$_POST['email'];
 $tel=$_POST['tel'];
 $tels=$_POST['tel2'];
 $password=$_POST['pass'];

     $names=htmlentities($nam);
    $emails=htmlentities($email);
    $tels=htmlentities($tel);
    $tel2=htmlentities($tels);
    $pass=htmlentities($password);

 

    $query="UPDATE ca_details SET names='$names',email='$emails',tel='$tels' ,tel_2='$tel2' , pass = '$pass', dates=CURDATE() WHERE id = $id";
    $exec= mysqli_query($conn,$query);
    if($exec){
      ?>
    <script type="text/javascript">
    alert("The data update was successful");
    window.location.href = "http://claverapartment.com/uprofile.php";
    </script>
    <?php
echo "Hello World";
    }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
    
        ?>
        <script type="text/javascript">
        alert(<?php echo $msg; ?>);
        window.location.href = "http://claverapartment.com/uprofile.php";
        </script>
        <?php
echo "mwana".$msg ;
    }
}
?>