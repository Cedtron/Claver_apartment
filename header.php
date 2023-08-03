<?php
session_start();
include 'dbconn.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Claver Apartments</title>
<meta name="description" content="Welcome! I'm thrilled you've selected Claver apartments as your new home. I've included some useful information to help get you ready for your move on." />
	<meta name="keywords" content="Claver apartments,Claver apartments Najjera,Claver apartments Uganda,Claver-apartments,Claver rooms,Claver apartment,Claver-apartment,Apartments Ug,Apartments Uganda,Najjera apartments,Apartments in kampala,
  Rentals,Rentals in uganda,apartments" />
	<meta name="author" content="zlnsoft in partner with Roce innovations" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#27a827">
<link rel="apple-touch-icon" href="images/icon.png" />

<!-- font awesome -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
<!-- uniform -->
<link type="text/css" rel="stylesheet" href="assets/uniform/css/uniform.default.min.css" />
<!-- animate.css -->
<link rel="stylesheet" href="assets/wow/animate.css" />
<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">
<!-- Material -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="assets/css/grid.css">
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="assets/css/ustyle.css">
<link rel="stylesheet" href="assets/icons/bootstrap-icons.css">

<!-- table css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/cr-1.5.5/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.css"/>


</head>

<body id="home">

<nav class="navbar navbar-expand-lg shadow-sm fixed-top">
  <div class="container-fluid"> 
  <a class="navbar-brand" href="index.php"><div class="logoImg"></div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
      <ul class="navbar-nav">
    <li class="nav-item"><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'acts'; }else { echo 'nav-link'; } ?>" href="index.php"><i class="far fa-home-alt"></i> Home </a></li>
    <li class="nav-item"><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'rooms-tariff.php'){echo 'acts'; }else { echo 'nav-link'; } ?>"  href="rooms-tariff.php"><i class="far fa-city"></i> Rooms</a></li>         
    <li class="nav-item"><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'gallery.php'){echo 'acts'; }else { echo 'nav-link'; } ?>"  href="gallery.php"><i class="far fa-images"></i> Gallery</a></li>
    <li class="nav-item"><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contact.php'){echo 'acts'; }else { echo 'nav-link'; } ?>"  href="contact.php"><i class="far fa-phone-alt"></i> Contact</a></li>
    <!-- Login -->
    <?php
        if (!isset($_SESSION['apartment'])) {
            echo '<li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-plus"></i>Login</a></li>';
        }else{
          echo '<li class="nav-item"><a class="';
          if(basename($_SERVER["SCRIPT_NAME"]) == "uprofile.php"){echo "acts"; }else { echo "nav-link"; }
          echo '"href="uprofile.php"><i class="far fa-user-circle"></i>Profile</a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="logout.php"><i class="far fa-sign-out-alt"></i>Logout</a></li>';
        }
      ?> 
        <button class="btnx btn-primary btn-sm btn headers"><a href="index.php#booking" ><span class="d-none d-md-inline">Make a</span> Reservation</a> </button>  
    </ul>
    </div>
    
  </div>
</nav>
   


<!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="loader"></div>
    </div> -->
<!-- header -->

