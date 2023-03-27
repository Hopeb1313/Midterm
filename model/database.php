<?php
$host = "en1ehf30yom7txe7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com"; 
$user = "vp8744gaikmgekne"; 
$pass = "hwntszmccbzzh0vx"; 
$db = "gsx4xjtkbbf7dvh7"; 
 
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

