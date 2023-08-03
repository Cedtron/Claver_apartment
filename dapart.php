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
     

<div class="box-top col-12 drad cent">
    <h1>Claver Apartments | Apartment details</h1>
    <small>Apartment details</small>
</div>
    <div class="drad mt-10">
      <h3 class="cent">Apartment details table</h3>
      <div class="over">
    <table class="table temp table-borderless">
          <thead >
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Room</th>
            <th scope="col">View</th>
          </tr>
          </thead>
          <tbody class="table-dark">
          <?php
$dt = "SELECT  * FROM ca_details;";
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {

 echo" 

<tr>
           
           <td>".$row["names"]."</td>
             <td>".$row["apartment"]."</td>"?>       
             <td> <a href="dview.php?room=<?php echo $row["apartment"] ;?>" class='btn btnd btn-primary'>View</a></td> 
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
    