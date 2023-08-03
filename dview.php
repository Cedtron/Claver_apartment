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
     
<div class="box-top col-12 drad">
<div class="row">

<div class="col-4">
<img src="images/004-apartment.png" class="col-md-8 col-12" />

</div>
<div class="col-8">

<?php
$room=$_GET['room'];

$dt = "SELECT  * FROM ca_details WHERE  apartment = '$room';" ;
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {

    echo     " 
    <ul class='list'>
<li><b>Name :</b>  ".$row["names"]."<li/> 
<li><b>Room :</b>  ".$row["apartment"]."<li/> 
<li><b>Email :</b> ".$row["email"]."<li/> 
<li><b>Tel :</b>   ".$row["tel"]."<li/> 
<li><b>Tel 2:</b>  ".$row["tel_2"]."<li/> 
</ul>
<a href='api/reset.php?id=".$row["id"]."' type='button' class='btn btn-danger rad'><i class='bi-arrow-repeat'></i> Reset room</a>
<a href='api/preset.php?id=".$row["id"]."' type='button' class='btn btn-success rad'><i class='bi-arrow-repeat'></i> Reset Password</a>
";
}
}
else{ echo "Data loading failed <i class='bi-emoji-dizzy'></i>, please try again";}?>

</div>

</div>
</div>

<br/>
<div class="col-12 drad">

<h3 class="cent">Transcation table</h3>
<div class="over">
<table class="table temp table-borderless">
          <thead >
          <tr>
            <th scope="col">Amount</th>
            <th scope="col">Reason</th>
            <th scope="col">Ref</th>
            <th scope="col">Date</th>
          </tr>
          </thead>
          <tbody class="table-dark">

<?php
$dt = "SELECT  * FROM ca_transactions WHERE  apartment = '$room' ORDER BY id  desc;" ;
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
?>
   
     <?php   
     echo"   <tr>
           <th scope='row'>".$row["amount"]."</th>
            <td>".$row["reason"]."</td>    
             <td>".$row["reference"]."</td>
             <td>".$row["dates"]."</td>
          </tr>
       "   ?>
      
         
   <?php   }
}
    else
    { echo "Data loading failed <i class='bi-emoji-dizzy'></i>, please try again";   
    }
            ?>
 </tbody>
        </table>
</div>
  </div>

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
    