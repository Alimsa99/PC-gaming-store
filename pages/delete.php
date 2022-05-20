<?php 

session_start();

include('../includes/data_con.php');

//Delete item from cart 

if(isset($_GET["ID"])and isset($_SESSION["username"]))

$q ="DELETE FROM cart WHERE ID=".$_GET['ID']." ";		

if(mysqli_query($conn, $q))  {
  header('location: Cart.php');
} 



$conn->close();
?>

?>