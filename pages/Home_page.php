<?php 
include('../includes/Header.php');
include('../includes/data_con.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="../css/homeCSS.css">

</head>
<br><br><br><br>

<!--- Search field form --->
<form class="search" action="search.php" method="post">
    <input type="text" placeholder="Search.." name="search_field">
    <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
</form><br>

<!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <a href="products view.php">
    <div class="mySlides fade">
        <img src="../images/Astro-A10-gen-2-1200x675.jpg" style="width:100%">
        <div class="text">Astro A10</div>
    </div>

    <div class="mySlides fade">
        <img src="../images/card.jpeg" style="width:100%">
        <div class="text">Graphic card</div>
    </div>

    <div class="mySlides fade">
        = <img src="../images/intel.jpeg" style="width:100%">
        <div class="text">Processor</div>
    </div>

    <div class="mySlides fade">
        <img src="../images/ram.jpeg" style="width:100%">
        <div class="text">Random access memory</div>
    </div>
    </a>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>

</div>

<div>
    <table class="Middle-bar">
        <tr>
            <td><i class="fa fa-money fa-2x" aria-hidden="true"></i></td>
            <td><i class="fa fa-shield fa-2x" aria-hidden="true"></i></td>
            <td><i class="fa fa-reply fa-2x" aria-hidden="true"></i></td>
            <td><i class="fa fa-comments-o fa-2x" aria-hidden="true"></i></td>
            <br>

        <tr>
            <td>Cash on delivery</td>
            <td>Secure shopping</td>
            <td>Returns Accepted</td>
            <td>24/7 Support</td>

        </tr>

    </table><br>
</div>


<?php 
if (isset($_COOKIE['product5'])) {
    $product = "";
    $id = "";
    echo "
                <div class='container'>
                <div class='last'>
                <h2>Last items seen</h2>
                <table class='cardt'>
                ";
    if (!isset($_COOKIE['product4'])) {
        echo "<tr>";
    }
    for ($conter = 1; $conter <= 5; $conter++) {
        $product = "product" . (string)$conter;
        $id = $_COOKIE[$product];

        $q = "SELECT * FROM products where ID=$id ";
        $r = $conn->query($q);

        if ($r->num_rows > 0) {
            // output data of each row
            $tableControl = 1;

            while ($row = $r->fetch_assoc()) {
                //show items



                echo

                "
<td>
<a href='product.php?product=" . $row["ID"] . "'>
<div class='card'>
<div class='card2'>
<P> <img src=" . $row["Picture"] . " alt=" . $row["Name"] . " class='img' /></P>
<p>" . $row["Name"] . "</p>
<p>" . $row["Price"] . " SAR</p>
</div>
</div>
</a>
</td>


";
            }
        }
    }
    $conn->close();
}
?>
</tr>
</table>
</div>
</div>
<script src="../js/Slider.js"></script>
<br> <br>
<?php
include('../includes/Footer.html');
?>

</body>

</html>