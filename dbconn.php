<?php

$servename="localhost";
$user = "root";
$password = ""; 
$database = "claver";
$conn = new mysqli($servename, $user, $password, $database,);

// $servename="fdb33.awardspace.net";
// $user="3998104_claver";
// $password="Claver20@"; 
// $database="3998104_claver";
// $conn=new mysqli($servename, $user, $password, $database,);
include 'api/sql.php';
?>
