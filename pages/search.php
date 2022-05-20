<?php
include('../includes/Header.php');
include('../includes/data_con.php');
?>

<html>
<head>

<link rel="stylesheet" href="../css/searchCSS.css">
</head>
<body>
<div class= "container">
<h1>Search page</h1>
<div class="cart">
<div class='products'>
<?php
//check if button has been set 
if(isset($_POST['submit-search']))
{
    $search_box = $_POST['search_field'];
    $search  = mysqli_real_escape_string($conn,$search_box);
    //Query to select product depending on its name
    $sql = "SELECT * FROM products WHERE Name LIKE '%$search%' OR Price LIKE '%$search%' OR 'Summary' LIKE '%$search%' OR ID LIKE '%$search%' ";
    $result = mysqli_query($conn,$sql);
    $queryResult = mysqli_num_rows($result);
    //print number of results found
    echo "<h2>There are ".$queryResult." results found </h2>";

    if($queryResult > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            //printing product information 
            echo "<div class='product'><a  class ='links' href='product.php?product=" . $row["ID"] . "' >
            <img class='img-design'src=".$row['Picture']." width='300' 
            height='300' style='25'>
            <div class='product-info'>
            <h3>Product name: ".$row['Name']."</a></h3>
            <h3>product Price: ".$row['Price']."</h3>
            <h3>Summary: ".$row['Summary']."</h3></div>
            </div>";  
        }

    }else {
        //print message if there are not results
        echo "<h2>There are no results matching your search</h2>";
    }

}


?>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br>

<?php 
include('../includes/Footer.html');

?>

</body>
</html>