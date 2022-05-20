<?php 
session_start();


?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/Header.css" rel="stylesheet">
</head>


<body>
<!-- header icons and logo -->
<div class="navbar">
    <a href="../pages/Cart.php"><i class="fa fa-shopping-cart"></i> Cart</a>
    <a  href="../pages/Home_page.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a  href="../pages/products view.php"><i class="fa fa-product-hunt"></i> Products</a>
<img src="../images/logo_transparent_background.png">


    <?php 
    

    //add new icon and log-out to header if normal User log-in
    if(isset($_SESSION["username"])){
        
        echo"<a  href='../pages/PastOrders.php'><i class='fa fa-shopping-bag' aria-hidden='true'></i> past orders</a>
        
        <a id='log'><i class='fa fa-fw fa-user' ></i> ".$_SESSION["username"]."</a>
        
        <a href='../pages/logout.php' id='log'><i class='fa fa-fw fa-user' ></i>Log out </a>";
        
        
    }
    
    //add new icons and log-out to header if Admin log-in 
    if(isset($_SESSION["Admin name"])){
        echo"<a  href='../pages/Data view.php'><i class='fa fa-inbox' aria-hidden='true'></i>  data view</a>
        
        <a  id='log'><i class='fa fa-fw fa-user' ></i> ".$_SESSION["Admin name"]." (Admin)</a>
        <a href='../pages/logout.php' id='log'><i class='fa fa-fw fa-user' ></i>Log out </a>";
    }
    
    //set (Sign in / Regesteration) for non log-in User
    if(!isset($_SESSION["username"])and !isset($_SESSION["Admin name"])){
    echo"<a href='../pages/log_in.php' id='log'><i class='fa fa-fw fa-user' ></i> Sign in / Registration</a>";
        }
    
    ?>
</div>
    
</body>
</html>