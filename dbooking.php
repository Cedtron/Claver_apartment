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
    <h2>Claver Apartments | Booking flow</h2>
    <small>Booking flow</small>
</div>
<div class="mt-10 drad">
<div class="over">
    <h3 class="cent">Bookings details table</h3> 
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
$dt = "SELECT  * FROM booking;";
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {

 echo" 

 <tr>
           
 <td>".$row["nam"]."</td>
   <td>".$row["apartment"]."</td>"?> 
                  <td> <a href="dbook.php?id=<?php echo $row["id"] ;?>" class='btn btnd btn-default'>View</a></td> 
</tr>
<?php   };
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
    