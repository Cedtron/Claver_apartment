<?php include 'header.php';?>
<head><link rel="stylesheet" href="assets/css/cstyle.css"></head>
<div class="container-fluid banner text-center img-head">
  <h2>Claver Apartments</h2>
  <span class="title">Home . Gallery</span>
</div>
<p></p>
<div class="container"> 
  <div class="conts">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
 
  <img id="expandedImg" class="imgs"/>

  <div id="imgtext"></div>
</div>

            <section class="xop-section">
    <div class="xop-wrapper">
        <div class="xop-container">
<?php
$dt = "SELECT  * FROM gallery ORDER BY id  desc;" ;
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);
if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
   echo    " <div class='project'>
   <figure class='animate__animated animate__zoomIn animate__slower 	3s animate__delay-1s'>
            <img src='api/".$row["imagex"]."' class='zlo' onclick='view(this);'/>
            <figcaption>
                <div>
                    <h3>".$row["title"]."</h3>
                </div>
            </figcaption>
        </figure>
    </div>";
  }}
  else
  { echo "<h3>Please reload</h3>";   
  }

?>
</div></div></section>  

</div>
<script src="navscript.js"></script>
<?php include 'footer.php';?>