<?php
$servername = "localhost";
$username = "sadiq";
$password = "123";
$db_name = "gaming_shopV4";

// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>