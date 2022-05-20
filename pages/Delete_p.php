<?php 
include("../includes/data_con.php");
session_start();
//Check if delete button has been set
if(isset($_POST["delete"]))
{
    if(isset($_POST['delete_p']))
    {
        header("Location: Data view.php");
    }
    $product_id = $_POST['delete_p'];
    $ad_ID = $_SESSION['id'] ;
    $q = "SELECT * FROM products WHERE ID = $product_id";
    $r = $conn->query($q);
    if ($r->num_rows > 0){
    //Query to delete product depending on the ID
    $q = "DELETE FROM products WHERE ID = $product_id ";
    //Running the query
    if(mysqli_query($conn,$q))
    {
        header("Location: Data view.php?success=deletep");
        die();
    }
}
else{
header("Location: Data view.php?success=deleteNotp");
        die(); 

}
}
?>