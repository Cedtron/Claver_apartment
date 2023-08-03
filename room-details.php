<?php include 'header.php';?>
<div class="spacer"></div>
<div class="mag">
<div class="container">
  <?php $room=$_GET['room'];?>
<h1 class="title cent">Room <?php echo $room?></h1>
 <div class="row over">
<?php
$dt = "SELECT  * FROM gallery WHERE title='$room'  ORDER BY id  desc;" ;
$res = mysqli_query($conn, $dt);
$rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
while ($row = mysqli_fetch_assoc($res)) {
?>
 <!-- RoomDetails -->
  <?php
echo "<div class='col-6 col-md-4 '>
<img src='api/".$row["imagex"]."'  class='col-12 hgth' onclick='view(this);' />
</div>";
 };}
 else{echo "<h3>Please reload</h3>";}
?>
 </div>
</div>   
  <!-- RoomCarousel-->
<div class="room-features spacer container">
  <div class="row pad">
    <div class="col-md-6 ">
    <img id="expandedImg" class="col-12 rad"/>
    </div>
    <div class="col-md-6 amenitites"> 
    <h3>Amenitites</h3> 
    This room has this features 
  <?php
    $info = "SELECT  * FROM gallery WHERE title='$room'  ORDER BY id  desc;" ;
$resa = mysqli_query($conn, $info);
$resacheck = mysqli_num_rows($resa);

if ( $resacheck > 0) {
while ($row = mysqli_fetch_assoc($resa)) {  ?>
    <ul>
      <li><?php echo $row["comment"] ;?></li>

    </ul>
    <?php
};}
else{echo "<h3>Please reload</h3>";}
?>
  </div>  
</div>
</div>
</div>
</div>
<?php include 'footer.php';?>