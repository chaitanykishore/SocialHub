<?php

$hostname     = "localhost";
$username     = "root";
$password     = ""; 
$databasename = "codingstatus"; 
// Create connection 
$conn = new mysqli($hostname, $username, $password,$databasename);
 // Check connection 
if ($conn->connect_error) { 
die("Unable to Connect database: " . $conn->connect_error);
 }
?>