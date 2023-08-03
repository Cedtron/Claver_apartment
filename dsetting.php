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
 
 
?>  
     

<div class="box-top col-12 drad cent">
    <h2>Claver Apartments | Settings</h2>
    <small>General settings</small>
</div>
<div class="drad mt-10">
<div class="row">
<div class="col-md-4 cent">

<img src="images/003-settings.png" class="col-md-8 col-12" />

</div>

<div class="col-md-8">
<div class="box rad">
<form role="form" id="admin">
<h3>You can change your dashboard log in here</h3><br/>
<label>User name</label><br/>
<input class="form-control" id="FormControlTextarea1" value='<?php echo $row["user"];?>' name="names" placeholder="Name"/>
<label>Password</label><br/>
<input class="form-control" id="FormControlTextarea1" value='<?php echo $row["pass"];?>' name="pass" placeholder="password"/>
<label>S-key</label><br/>
<input class="form-control" id="FormControlTextarea1" value='<?php echo $row["scode"];?>' name="scode" placeholder="Secrent code"/>
<input class="btn btn-primary rad cent" type="submit" value="Submit">
<div id="dis"></div>
</form>
</div>
</div>
</div>
</div>

     </div>
    </div>

    <?php  
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
    