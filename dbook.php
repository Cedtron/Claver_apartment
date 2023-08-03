<?php include 'dash.php';

if (isset($_COOKIE['pass'])) {
  // echo 'Its okay is ';
}else {
  // echo 'User is not logged in';
  header('location:login_admin.php');
 }

 $pass=$_COOKIE['pass'];
 if (isset($_GET['logout'])) {
  setcookie("pass", "", time()-50000);
     header("location:http://claverapartment.com/login_admin.php");};

$dt = "SELECT  * FROM admins WHERE user ='$pass';";
$res = mysqli_query($conn, $dt);
$rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
while ($row = mysqli_fetch_assoc($res)) {
$user=$row["user"];

  }
?>    
     
<div class="box-top col-12 drad ">
<div class="container">
<div class="row">

<div class="col-4">
<img src="images/006-user-1.png" class="col-md-8 col-12" />

</div>
<div class="col-8">

<?php
$id=$_GET['id'];

$dt = "SELECT  * FROM booking WHERE  id = '$id';" ;
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {

    echo  "
<ul class='list'>
<li><b>Name :</b>".$row["nam"]."<li/> 
<li><b>Room :</b>".$row["apartment"]."<li/> 
<li><b>Email :</b>".$row["email"]."<li/> 
<li><b>Tel :</b>".$row["tel"]."<li/> 
<li><b>Comment :</b>".$row["information"]."<li/> 
<li><b>Date :</b>".$row["dates"]."<li/> 
<li><a href='api/del.php?id=".$row["id"]."' type='button' class='btn btn-danger rad'><i class='bi-trash-fill'></i> Delete</a><li/>
</ul>
";
}
}
else
{ echo "Failed to load please try again";   
}
        ?>


</div>


</div>
</div>
</div>

<br/>



     </div>
    </div>


    <?php  

}else 
    { echo 
      "<div id='error'><div class='middle cent'>
      <i class='bi-exclamation-triangle-fill red'></i><br/>
      Sorry you need to Login first<i class='bi-emoji-frown-fill'></i><br/>
      <a class='btn btn-success rad' type='button' href='login_admin.php'> Log in</a>
      </div></div>";     
    }mysqli_close($conn);
         include 'script.php';
         
         ?>   