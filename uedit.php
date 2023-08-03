<?php include 'header.php';?>

<!-- Make sure that you must login -->
<?php 

if(isset($_SESSION['apartment'])){
  $room=$_SESSION['apartment'];}

  if (!isset($room)) {
  $_SESSION['msg'] = "You must log in first";
  header('location:login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($room);
    header("location:index.php");
  }

  $sql = "SELECT  * FROM ca_details WHERE apartment ='$room';";
$res = mysqli_query($conn, $sql);
$rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
while ($row = mysqli_fetch_assoc($res)) {
$room=$row["apartment"]
?>
<p class="space"></p>
<p class="mt-5"></p>
<div class="container bg">
<div class="main-body">

<!-- /Breadcrumb -->
<div class="row gutters-sm">
  <div class="col-md-4 mb-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
          <img src="images/user.png" alt="Admin" class="rounded-circle" width="150">
          <div class="mt-3">
            <h4 class="green fw-bold">Welcome <?php echo $row["names"]?>!</h4>
            <p class="text-secondary mb-1">Our beloved Neighbour</p>
            <p class="text-muted font-size-sm">Room Number: <?php echo $room;?> </p>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-3 swap">
      <a href="uprofile.php" class="mb-0 <?php if(basename($_SERVER['SCRIPT_NAME']) == 'uedit.php'){echo 'pactive'; }?>"><i class="fa fa-user"></i> Profile</a>
    </div>
  </div>
  <div class="col-md-8">
  <div class="card mb-3">
      <form role="form" action="api/users.php" method="POST" class="card-body">
		<div class="row gutters">
			<div class="cent green">
				<h5 class="mb-2">Edit Personal Details</h5>
			</div>
			<input class="form__input dis" value='<?php echo $row["id"]?>' name="id"/><br/>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label>Full Name</label>
					<input type="text" class="form-control" id="fullName" value='<?php echo $row["names"]?>' name="names" >
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" id="eMail" value='<?php echo $row["email"]?>' name="email" >
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label>Moblie money Number</label>
					<input type="number" class="form-control" id="phone"  value='<?php echo $row["tel"]?>' name="tel">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
				<label>Mobile</label>
					<input type="number" class="form-control" id="phone"  value='<?php echo $row["tel_2"]?>' name="tel2">
				</div>
			</div>

	
		</div>
		<div class="row gutters">
			<div class="cent green">
				<h5 class="mt-3 mb-2">Security</h5>
			</div>
		
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label>Password</label>
					<input type="text" value='<?php echo $row["pass"]?>' class="form-control" name="pass">
				</div>
			</div>
		</div>
		<div class="row gutters float-end">
            <div class="text-right">
                <a type="button" class="btn rad bg-green" href="uprofile.php">Cancel</a>
                <button type="submit" id="submit" name="submit" class="btn rad bg-green">Update</button>
            </div>
		</div>
</form>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php  
 
};

}else
    { echo    "<div id='error'><div class='middle cent'>
        <i class='bi-exclamation-triangle-fill red'></i><br/>
        Failed to load the account please Login <i class='bi-emoji-frown-fill'></i><br/>
        <a class='btn btn-success rad' type='button' href='login.php'> Log in</a>
        </div></div>";  
    }mysqli_close($conn);
         include 'footer.php';
         
         ?>