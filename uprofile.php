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
            <p class="text-muted font-size-sm">Room No:<?php echo $room;?> </p>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-3 swap">
      <div class=" bg-green mb-0 swap pad boar cent" id="pros"><i class="fa fa-user"></i> Profile</div>
      <div  class="mb-0 swap pad boar cent"  id="pays"> <i class="fas fa-money-bill-wave"></i> Payment</div>
    </div>
  </div>
  <div class="col-md-8" id="profile">
    <div class="card mb-3">
      <div class="card-body">
        <div class="title-u cent">
          <?php  echo $row["names"];?>'s Profile
        </div>
        <div class="row">
          <div class="col-sm-3"><h6 class="mb-0">Full Name</h6></div>
          <div class="col-sm-9 text-secondary"><?php echo $row["names"];?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3"><h6 class="mb-0">Apartment No</h6></div>
          <div class="col-sm-9 text-secondary"><?php echo $room;?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3"><h6 class="mb-0">Email</h6></div>
          <div class="col-sm-9 text-secondary"><?php echo $row["email"];?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3"><h6 class="mb-0">Phone</h6></div>
          <div class="col-sm-9 text-secondary"><?php echo $row["tel"];?></div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3"><h6 class="mb-0">Mobile</h6></div>
          <div class="col-sm-9 text-secondary"><?php echo $row["tel_2"];?></div>
        </div>
        <hr>
        <?php include 'pays.php'?>
        <div class="row">
          <div class="col-sm-12"><a class="btn bg-green float-end rad" href="uedit.php">Edit</a></div>
        </div>
      </div>
    </div>
  </div>
  <!-- payment -->
  <div class="col-md-8" id="payment">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="cent">Payment methods</h5>
        <div class="success"></div>
        <form  method="POST" id="payForm">
<label>Payment Channel</label><br/> 
<div class="form-group">


            <input type="number" class="form-control"  placeholder="Amount..." id="amount"><br/>
            <input type="text" class="form-control"  placeholder="comment..." id="comment"><br/>
            <input type="text" class="form-control dis" value='<?php echo $row["names"]?>' placeholder="name..." id="names"><br/>
            <input type="email" class="form-control dis" value='<?php echo $row["email"]?>'  placeholder="Email..." id="email"><br/>
            <input type="text" class="form-control dis" value='<?php echo $row["tel"]?>'  placeholder="Tel..." id="tel"><br/>
            <input type="text" class="form-control dis" value='<?php echo $row["apartment"]?>'  placeholder="Tel..." id="room"><br/>
         
        <button class="w-100 btn btn-lg btn-danger rad" type="submit"><i class="bi-cash-coin"></i> Pay</button>
    </div>     
 <br/>
    </form>
      </div>
    </div>
  </div>
  </div>
<!-- payment modal -->

<!-- table -->
<div class="card">
<div class="card-body">
<h3 class="cent">Transcation table</h3>
<table class="table table-dark table-striped table-hover">
          <thead >
          <tr>
            <th scope='col'>Name</th>
            <th scope='col'>Room</th>
            <th scope='col'>Amount</th>
            <th scope='col'>Date</th>
            
          </tr>
          </thead>
          <tbody class='table-light'>

    <?php
$dt = "SELECT  * FROM ca_transactions WHERE apartment ='$room' ORDER BY id  desc ;";
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {

 echo" 

<tr>
            
  <td>".$row["names"]."</td>
  <td>".$row["apartment"]."</td>    
    <td>".$row["amount"]."</td>
    <td>".$row["dates"]."</td>"?>       

</tr><?php   };
}
    else{ echo "<td>No transactions made yet</td><td></td><td></td><td></td>";}
            ?>
          </tbody>
        </table>
      </div>
</div>
</div>
</div>

<?php
 
 
};

}else 
    { echo 
      "<div id='error'><div class='middle cent'>
      <i class='bi-exclamation-triangle-fill red'></i><br/>
      Failed to load the account please Login <i class='bi-emoji-frown-fill'></i><br/>
      <a class='btn btn-success rad' type='button' href='login.php'> Log in</a>
      </div></div>";   
    }
?>
<!-- form -->
<?php include 'footer.php';?>