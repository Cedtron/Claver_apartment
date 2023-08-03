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
    <h2>Claver Apartments | Images</h2>
    <small>Image control panel settings</small>
</div>
    <div class="drad mt-10">
    <div class="row">
    <div class="col-md-6">
    <h3 class="cent">Image Slider</h3>
 
    <form action="api/cover.php" method="POST" enctype="multipart/form-data" class="for crt col-12 cel">
    <small  class="form-text text-muted">Below you upload cover slide images.</small>

    <input class="form-control" id="FormControlTextarea1" name="comment" placeholder="Comment.."/><br/>
    <div class="mb-3">
      <label class="form-label" for="customFile">Upload</label>
      <input type="file" class="form-control" id="customFile" name="cover1">
    </div>

    <div class="mb-3">
      <label class="form-label" for="customFile">Upload</label>
      <input type="file" class="form-control" id="customFile" name="cover2">
    </div>

      <input class="btnd btn-primary btn" type="submit" value="Submit">
    </form>
    </div>
    <br/>

    <div class="col-md-6">
    <h3 class="cent">Gallery upload</h3>
    <form action="api/gallery.php" method="POST" enctype="multipart/form-data" class="for crt col-12 cel">
    <small  class="form-text text-muted">
    Below you upload gallery images.
    </small>

    <select class='form-control' name="title">
   <option value="CK-1">Apartment 1</option>
   <option value="JB-2">Apartment 2</option>
   <option value="AC-3">Apartment 3</option>
   <option value="NC-4">Apartment 4</option>
   <option value="AC-5">Apartment 5</option> 
   <option value="KC-6">Apartment 6</option>
   <option value="Out_side">Out door</option>   
   <option value="Other">Other</option>  
</select><br/>
    <input class="form-control" id="FormControlTextarea1" placeholder="Comment.." name="comment"/><br/>

    <div class="mb-3">
      <label class="form-label" for="customFile">Upload</label>
      <input type="file" class="form-control" id="customFile" name="img">
    </div>

      <input class="btn btnd btn-primary" type="submit" value="Submit">
    </form>

    </div>

    </div>
    </div>
<div class="drad mt-10">
    <h3 class="cent">Gallery table</h3><hr>
    <table class="table temp table-borderless">
          <thead >
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Button</th>
            
          </tr>
          </thead>
          <tbody class="table-dark">

          <?php
$dt = "SELECT  * FROM gallery ORDER BY id  desc ;";
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {

 echo" 

<tr>

          <tr>
            
            <td>".$row["imagex"]."</td>
            <td>".$row["title"]."</td>
            <td>".$row["dates"]."</td>
          
          "?>
       
  <td> <a href="dtrans.php?id=<?php echo $row["id"] ;?>" class='btn btn-danger cent'>Delete</a></td> 
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
    