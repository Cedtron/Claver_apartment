<?php include 'dash.php';

if (isset($_COOKIE['pass'])) {

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

<div class="box-top col-12 drad cent">
  <h2>Claver Apartments | Transaction flow</h2>
  <small>Transaction Flow</small>
</div>
<form action="api/payc.php" method="POST" class="drad mt-10">
  <div class="row">
    <h3  class="cent">Fill In the  Data</h3>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
      <div class="form-group">
      <label>Full Name</label>
        <input type="text" class="form-control" name="names"><br/>
        <label>Apartment</label>
        <select class='form-control' name="apartment">
   <option value="CK-1">Apartment 1</option>
   <option value="JB-2">Apartment 2</option>
   <option value="AC-3">Apartment 3</option>
   <option value="NC-4">Apartment 4</option>
   <option value="AC-5">Apartment 5</option> 
   <option value="KC-6">Apartment 6</option>
</select><br/>
      </div>
      <div class="form-group">					
        <label>Details</label>
        <input type="text" class="form-control" name="details"><br/>
      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
      <div class="form-group">					
        <label>Email</label>
        <input type="email" class="form-control" name="emails"><br/>
      </div>
      <div class="form-group">					
        <label>Tel</label>
        <input type="number" class="form-control" name="tel"><br/>
      </div>
      <div class="form-group">					
        <label>Amount</label>
        <input type="numbers" class="form-control" name="amount"><br/>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btnd">Send</button>
</form>
<div class="drad mt-10">
  <div class="over">
    <h3 class="cent">Transcation table</h3>
    <table class='table temp table-borderless'>
          <thead >
          <tr>
            <th scope='col'>Name</th>
            <th scope='col'>Room</th>
            <th scope='col'>Amount</th>
            <th scope='col'>Date</th>
            <th scope='col'>View</th>
          </tr>
          </thead>
          <tbody class='table-dark'>

    <?php
$dt = "SELECT  * FROM ca_transactions ORDER BY id  desc ;";
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
             <td> <a href="dtrans.php?id=<?php echo $row["id"] ;?>" class='btn btn-primary btnd'>View</a></td> 
</tr><?php   };
}
    else
    { echo "Failed to load please try again";   
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
    