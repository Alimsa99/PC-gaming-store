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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/add&Modfiy_productCSS.css">

</head>
<body>
<?php
    //Check if button has been set
    if(isset($_POST['add_p'])){
        //get information of new product from the form 
        $product_name = $_POST['p_name'];
        $product_stock = $_POST['stock'];
        $product_price = $_POST['price'];
        $product_picture = $_POST['picture'];
        $product_summary = $_POST['summary'];
        $ad_ID = $_SESSION['id'] ;

        //Condition to check if Admin leaves field empty 
    if (emptyInput($product_name, $product_stock, $product_price, $product_picture , $product_summary) !== false) {
        header("Location: Add_product.php?error=emptyinput");
        die();
    }
        //Adding new product in the database
        $sql ="INSERT INTO products(Name,Stock,Price,Picture,Summary,Admin_ID)
        VALUES('$product_name','$product_stock','$product_price','$product_picture','$product_summary','$ad_ID')";
    if($conn->query($sql)=== TRUE){
        header('Location: Data view.php?success=addp');    
    }
    else{
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    }

    //functions to check Admin errors
    $result;
    function emptyInput($product_name, $product_stock, $product_price, $product_picture , $product_summary)
    {
    if (empty($product_name) || empty($product_stock) || empty($product_price) || empty($product_picture) || empty($product_summary)) {
    $result = true;
    } else {
    $result = false;
    }
    return $result;
}

    ?>
<h1>Add new prodcut</h1>
<form action="" method = "post" name ="add_f" onsubmit=" V_add()">

<?php

//printing messages depending on type of error 
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
    echo "<h3>All field is required</h3>";
}
}

?>
<div class="container">
<div class="row">
<div class="col-25">
    <label for="pname">Product Name</label>
</div>

<div class="col-75">
    <input type="text" id="pname" name="p_name" placeholder="Product name..">
</div>
</div>
<div class="row">
<div class="col-25">
    <label for="stock">Stock</label>
</div>
<div class="col-75">
    <input type="text" id="stock" name="stock" placeholder="stock .." >

</div>
</div>
<div class="row">
<div class="col-25">
    <label for="price">Price</label>
</div>
<div class="col-75">
<input type="text" id="price" name="price" placeholder="Price .." >
</div>
</div>

<div class="row">
<div class="col-25">
<label for="picture">picture</label>
</div>
<div class="col-75">
<input type="text" id="picture" name="picture" placeholder="Write picture path .." >
</div>
</div>

<div class="row">
<div class="col-25">
    <label for="summary">Summary</label>
</div>
<div class="col-75">
    <textarea id="summary" name="summary" placeholder="Write product details.." style="height:200px" >
    </textarea>
</div>
</div>
<div class="row">
<input type="submit" value="Add product" name = "add_p">
</div>
</form>
</div>

    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
    include('../includes/Footer.html');
    ob_end_flush();
    ?>
<script>
function V_add()
        {
            var name = document.add_f.p_name.value ;
            var stock = document.add_f.stock.value ;
            var price = document.add_f.price.value ;
            var picture = document.add_f.picture.value ;
            var summary = document.add_f.summary.value ;
            if(name  == "" || stock  == "" || price  == "" || picture  == ""  || summary  == "")
            {
                alert("All field is required");

            }

        }


</script>
</body>
</html>