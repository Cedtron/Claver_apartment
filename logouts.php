<?php
if (isset($_COOKIE['pass'])) {
    unset($_COOKIE['pass']); 
    setcookie('pass', null, -1, "http://claverapartment.com"); 
    header("location:index.php");
} else {
   echo "failed to log out";
}
?>