<?php
session_start();

$servename="localhost";
$user = "root";
$password = ""; 
$database = "claver";

// $servename="fdb33.awardspace.net";
// $user="3998104_claver";
// $password="Claver20@"; 
// $database="3998104_claver";
$conn=new mysqli($servename, $user, $password, $database,);
?>