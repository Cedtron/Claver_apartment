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

if ($rescheck > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $user=$row["user"];
    } ?>  
     
<div class="box-top col-12 drad">
<div class="row " id="pdfs">

<div class="col-4">
<img src="images/006-user-1.png" class="col-md-8 col-12 ico" />

</div>
<div class="col-8">
<?php
 $id=$_GET['id'];

    $dt = "SELECT  * FROM ca_transactions WHERE  id = '$id';" ;

    $res = mysqli_query($conn, $dt);
    $rescheck = mysqli_num_rows($res);

    if ($rescheck > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $room=$row["apartment"];
           
            echo     " 

<b>Name :</b>".$row["names"]."<br/> 
<b>Room :</b>".$row["apartment"]."<br/> 
<b>Email :</b>".$row["email"]."<br/> 
<b>Tel :</b>".$row["tel"]."<br/> 
<b>Amount :</b>".$row["amount"]."<br/> 
<b>Reference 	:</b>".$row["reference"]."<br/> 
<b>Reason :</b>".$row["reason"]."<br/> 

<b>Date :</b>".$row["dates"]."<br/> 

   "; ?><br/>

</div>
</div>


</div>
<div class="drad mt-10">
<?php include 'pays.php'?>
<br/>
<button class="btn btn-danger rad cent" id="pdf"><i class="bi-cloud-download-fill"></i> Download to PDF</button>


<div id="editor"></div>
     </div>
    </div>
    <?php
        }
    }
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
    