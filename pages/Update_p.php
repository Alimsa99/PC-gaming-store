<?php 
session_start();
include('../includes/data_con.php');
//check if button has been set
if(isset($_POST["Update"]))
{  
    //Storing information in variable
    $product_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $p_stock = $_POST['stock'];
    $p_price = $_POST['price'];
    $p_picture = $_POST['picture'];
    $p_summary = $_POST['summary'];
    $ad_ID = $_SESSION['id'] ;
    //Query to update product information
    $q = "UPDATE products SET 
    Name= '$p_name' , Stock = $p_stock , Price = $p_price, Picture = '$p_picture', Admin_ID = $ad_ID, Summary = '$p_summary' 
    WHERE ID = $product_id ";
    if(mysqli_query($conn,$q))
    {        
        header("location: Data view.php?success=modifyp");
    }
}
?>
    
</body>
</html>