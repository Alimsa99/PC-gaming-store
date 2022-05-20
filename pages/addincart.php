<?php
session_start();
include('../includes/data_con.php');
// checking if username and id has been set
if(isset($_SESSION["username"]) and $_SESSION["id"]){
    
    $cid = $_SESSION['id'];
    $pid = $_POST['productID'];
    $qnt = $_POST['qnt'];
    $pr = $qnt*$_POST['price'];
    //SQL query
    $sql ="INSERT INTO `cart`( `Price`, `Product_ID`, `Quantity`, `Customer_ID`) VALUES ($pr,$pid,$qnt,$cid)";
if($conn->query($sql)=== TRUE){
    //redirect function 
    header('location: products view.php');
    die();
    
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
    
}
else{
    //redirect if customer did not log in 
    header("Location: log_in.php");
    
}
    

?>