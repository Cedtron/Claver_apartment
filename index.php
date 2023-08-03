<?php include 'header.php';
$dt = "SELECT * FROM cover;" ;
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
?>
<head><link rel="stylesheet" href="assets/css/cstyle.css"></head>
<!-- banner -->
<div class="banner">    
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="bg-shadow">
      <?php echo "
    <img src='api/".$row["img2"]."'  class='img-responsive height' alt='slide'/>" ?>
    </div>
        <div class="container">
          <div class="carousel-caption cent">
            <h1>Elegant Apartments in Najjera.</h1>
            <p>With a marvelous view.</p>
           
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="bg-shadow">
        <?php echo "
    <img src='api/".$row["img1"]."'  class='img-responsive height' alt='slide'/>" ?>
    </div>
        <div class="container">
          <div class="carousel-caption cent">
            <h1>Appealing interior.</h1>
            <p>With the interior design of the next generation.</p> 
          </div>
        </div>
      </div>
      <?php    
    }
}
    else{ echo "Error";}
            ?>
    </div> 
    </div>
</div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="welcome-message">
        <div class="wrap-info">     
          <div id="tym" class="arrow-nav"></div>
        </div>
    </div>
 <div class="msg"><div id="tyms"></div></div>
</div>
</div>

<!-- banner-->
<!-- Reservation -->
<div id="information" class="section spacer bg-white">
 
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 cont">
      <div class="booking-bg wowload fadeInLeftBig">
          <div class="form-header">
            <h3>Schedule a visit</h3>
            <p>The arrangement and layout of Claver apartments maximizes natural light, opening to elegant private balconies and great natural views for a relaxing mind</p>
            <h3>SELF CONTAINED APARTMENTS</hh3>
            <h4>UGX 1,200,000</h4>
          </div>
        </div>
    </div>

    <div class="col-sm-6 bg-white book" id="booking">
      <br/>
        <form role="form" class="wowload fadeInRightBig" id="booking">
          <div class="row">
            <h5 class="cent">Reservation</h5>
            <div id="dis"></div>
            <div class="col-md-6">
              <div class="form-group">
                <span class="form-label">Name</span>
                <input class="form-control" type="text" name="name" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <span class="form-label">Email</span>
                <input class="form-control" type="email" name="email" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <span class="form-label">Phone</span>
                <input class="form-control" type="number" name="tel">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <span class="form-label">Rooms available</span>
                <select class="form-control mdf" name="room">
                <?php

$dt = "SELECT  * FROM ca_details WHERE  names = 'user';" ;
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
?>         
   <?php echo     " <option value='".$row["apartment"]."'> ".$row["apartment"]." </option>"?>         
    <?php    ;
    }
}
    else
    { echo "<option>Out of rooms</option>";   
    }
            ?>

                </select>
                <span class="select-arrow"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <span class="form-label">Comment</span>
            <textarea class="form-control" name="infor"></textarea>
          </div>
          <div class="form-btn">
            <button class="submit-btn btnx">Check availability</button>
          </div>
        </form>
  </div>
      </div>
    </div>
  </div>
	</div>  
<!-- reservation-information -->
<div class="container-fluid">
  <div class="img row">
    <div class="col-md-6"></div>
    <div class="text col-md-6 wowload fadeInRight align-self-center text-white">
      <h3>QUALITY INDULGENCE AND AMENITIES</h3>
      <p>Ethical location due to the quality services around you that suit all your needs including fast internet speed</p>
      <a href="#services-pg" class="btnx btn-primary btn-lg btn">View Services<i class="fas fa-chevron-right"></i></a>
    </div>
  </div>
</div>

<!-- Cards -->
<section class="our-skills wowload fadeInUpBig" id="services-pg">    
<div class="container">
  <div class="section-title cent serve">
    <h3>Amenities</h3>
    <p class="ml-5">Within the 300m circumference is a police station, gas stations, main hospital, schools, responsive neighbors, a jim across your view among others</p>
  </div>
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="box-shadow">
              <div class="icon"><i class="material-icons">wifi_tethering</i></div>
              <h4>wifi services</h4>
              <p>A mobile broadband of unlimited fast and secure internet combined with speed of upto 24mbps from top internet service providers that suite all your online needs</p>
              <a href="contact.php" class="btnx">View Map <i class="fas fa-chevron-right"></i></a>
          </div>
      </div>
      <div class="col-md-6">
          <div class="box-shadow">
              <div class="icon"><i class="material-icons">security</i></div>
              <h4>security</h4>
              <p>Within the serenity of the apartments well dressed with top security, full 24/7 cctv surveillance and a nearby police post with a guaranteed safety</p>
              <a href="contact.php" class="btnx">View Map <i class="fas fa-chevron-right"></i></a>
          </div>
      </div>
      <div class="col-md-6">
          <div class="box-shadow">
              <div class="icon"><i class="fas fa-car-alt"></i></div>
              <h4>Personal parking spots</h4>
              <p>Ample parking space with maximum security, a spacious location and a well Tarmacked space within the apartments</p>
              <a href="contact.php" class="btnx">View Map <i class="fas fa-chevron-right"></i></a>
          </div>  
      </div>
      <div class="col-md-6">
          <div class="box-shadow">
              <div class="icon"><i class="material-icons">restaurant</i></div>
              <h4>Restaurant</h4>
              <p>Available dine like Cafe Javas, Ndereyaz Restaurant, Glovo services and many more among others in the vicinity of our apartments </p>
              <a href="contact.php" class="btnx">View Map <i class="fas fa-chevron-right"></i></a>
          </div>
      </div>
      <div class="col-md-6">
          <div class="box-shadow">
              <div class="icon"><i class="fas fa-binoculars"></i></div>
              <h4>View</h4>
              <p>Are you in search for the cool fresh air in the city? The apartments give you an enchanting forest view, a soothing cool breeze with charming fresh air and peaceful natural inhabitants</p>
              <a href="contact.php" class="btnx">View Map <i class="fas fa-chevron-right"></i></a>
          </div>
      </div>
  </div>
</div>
</section>  
<!-- services -->
<h3 class="title-imgs cent">Our Featured <br>Great Location , Affordable, Spacious and Hot selling<br>Apartments</h3>
<main class="page-content">
  <div class="cards wowload scroll fadeInLeftBig">
    <div class="content">
      <h3 class="title">Out door View</h3>
      <p class="copy">Check out all of these gorgeous outdoor with beautiful views of.... you guessed it, the hills with a perfect sun rise</p>
    </div>
  </div>
  <div class="cards wowload scroll fadeInLeftBig">
    <div class="content">
      <h3 class="title">Big room space</h3>
      <p class="copy">Plan your next beach trip with these fabulous destinations</p>
    </div>
  </div>
  <div class="cards wowload scroll fadeInRightBig">
    <div class="content">
      <h3 class="title">Environment freshness</h3>
      <p class="copy">It's the beautiful environment you've always dreamed of</p>
    </div>
  </div>
  <div class="cards wowload scroll fadeInRightBig">
    <div class="content">
      <h3 class="title">State of the yard compound</h3>
      <p class="copy">Big enough for packing a nd playground</p>
    </div>
  </div>
</main>
<!-- services -->

<?php include 'footer.php';?>