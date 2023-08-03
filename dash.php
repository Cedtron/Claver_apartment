
<?php include 'dbconn.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css"/>

    <link rel="stylesheet" href="assets/css/dstyle.css"/>
    <link rel="stylesheet" href="assets/css/custom.css"/>
    <link rel="stylesheet" href="assets/icons/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/temp.css"/>
<!-- table css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.5/css/colReorder.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.4.0/css/searchPanes.bootstrap5.min.css"/>
 
</head>
<!-- Sidebar dashboard -->
<body id="body-pd">
<header class="header bg-white shadow" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_img"> <img src="images/OIP.jpg" alt=""> </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> 
            <!-- Logo -->
            <a href="dashboard.php" class="nav_logo"> 
                <h4 class="whit">CA</h4><span class="nav_logo-name">Claver Apartment</span> 
            </a>

            <div class="nav_list"> 
                <a href="dashboard.php" class="nav_link <?php if(basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php'){echo 'active'; }?>"> 
                    <i class='bx bx-grid-alt nav_icon'></i><span class="nav_name">Dashboard</span> 
                </a> 

                <a href="dapart.php" class="nav_link <?php if(basename($_SERVER['SCRIPT_NAME']) == 'dapart.php'){echo 'active'; }?>">
                        <i class='bi-building nav_icon'></i><span class="nav_name">Apartments</span> 
                </a> 
                <a href="dimage.php" class="nav_link <?php if(basename($_SERVER['SCRIPT_NAME']) == 'dimage.php'){echo 'active'; }?>"> 
                    <i class='bx bx-images nav_icon'></i><span class="nav_name">Images</span> 
                </a>
                <a href="dbooking.php" class="nav_link <?php if(basename($_SERVER['SCRIPT_NAME']) == 'dbooking.php'){echo 'active'; }?>">
                    <i class='bi-inbox nav_icon'></i><span class="nav_name">Bookings</span> 
                </a> 
                <a href="dsetting.php" class="nav_link <?php if(basename($_SERVER['SCRIPT_NAME']) == 'dsetting.php'){echo 'active'; }?>"> 
                    <i class="bi-gear nav_icon"></i><span class="nav_name">Settings</span> 
                </a> 
                <a href="logouts.php" class="nav_link sign-out"> 
                    <i class='bx bx-log-out nav_icon'></i><span class="nav_name">SignOut</span> 
                </a>                
            </div>
        </div> 
    </nav>
</div>

<script>
document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});
</script>

