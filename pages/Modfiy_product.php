<?php 
    ob_start();
    include('../includes/Header.php');
    include('../includes/data_con.php');
?>
<?php 
//Preventing users from accessing admin page
if(isset($_SESSION['username']))
{
    header("Location: Home_page.php");
}
//Check if admin didn't log in redirect him to log in page
if(!isset($_SESSION['Admin name']))
{
    header("Location: Admin_login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify product</title>
    <link rel="stylesheet" href="../css/add&Modfiy_productCSS.css">
</head>
<body>
<h1>Modify products</h1>
<form action="Update_p.php" method = "post">
<?php

if(empty($_POST['modify_p'])){
    
    header('location: Data view.php');
    
}
//Check if button has been set
if(isset($_POST["mod"]))
{ 
$products_id = $_POST['modify_p'];
$ad_id =  $_SESSION['id'] ;

//SQL query 
$q = "SELECT * FROM products WHERE ID ='$products_id' ";
$r = $conn->query($q);
if($r->num_rows > 0){
while($row = $r->fetch_assoc())
{
//printing products information in the form
echo "
<div class='container'>
<div class='row'>
<div class='col-25''>
    <label for='pname'>Product Name</label>
</div>
<input type='hidden' id='pname' name='p_id' placeholder='Product name..' value='$products_id'>
<div class='col-75'>
    <input type='text' id='pname' name='p_name' placeholder='Product name..' value='".$row['Name']."'>
</div>
</div>
<div class='row'>
<div class='col-25'>
    <label for='stock'>Stock</label>
</div>
<div class='col-75'>
    <input type='text' id='stock' name='stock' placeholder='stock ...' value='".$row['Stock']."'>

</div>
</div>
<div class='row'>
<div class='col-25'>
    <label for='price'>Price</label>
</div>
<div class='col-75'>
<input type='text' id='price' name='price' placeholder='Price ..' value='".$row['Price']."'>
</div>
</div>

<div class='row'>
<div class='col-25'>
<label for='picture'>picture</label>
</div>
<div class='col-75'>
<input type='text' id='picture' name='picture' placeholder='Write picture path ..' value='".$row['Picture']."'>
</div>
</div>

<div class='row'>
<div class='col-25'>
    <label for='summary'>Summary</label>
</div>
<div class='col-75'>
    <textarea id='summary' name='summary' placeholder='Write product detaiels..' style='height:200px' >".$row['Summary'].";
    </textarea>
</div>
</div>
<div class='row'>
<input type='submit' value='Update' name = 'Update'>
</div>
</form>
</div>";
}
}
else{
    
    echo"<div class='container'>
    
    <h2> ID not found  </h2>
    
    <h2><script src='https://cdn.lordicon.com/lusqsztk.js'></script>
<lord-icon
    src='https://cdn.lordicon.com/msoeawqm.json'
    trigger='loop'
    delay='2000'
    colors='primary:#121331,secondary:#eee966'
    style='width:250px;height:250px'>
</lord-icon></h2>
    
    </div>";
}
}

?>


    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
    include('../includes/Footer.html');
    ob_end_flush();
    ?>
</body>
</html>