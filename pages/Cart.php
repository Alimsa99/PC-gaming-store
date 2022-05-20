<?php 
include '../includes/Header.php';
ob_start();
?>
<!DOCTYPE html>
<html>

<head>

    <title> Cart</title>
    <link rel="stylesheet" href="../css/cartCSS.css">
</head>

<body>

    <?php


	include('../includes/data_con.php');
	?>

    <div class='container'>

        <h1> Cart</h1>

        <div class='cart'>
            <div class='products'>
                <?php
                //Check if the User log-in
				if (!isset($_SESSION["username"])) {
                    
                //Redirect non log-in User to log-in page
					header('location: log_in.php');
				} else {
                    
					$Quantity = 0;
					$TotalPrice = 0;
					$id = $_SESSION["id"];
                    
                    //Query to get the User cart from database
					$cart = "SELECT ID, Product_ID, Quantity, Price FROM cart WHERE Customer_ID='$id' ";

					$cartq = $conn->query($cart);


					if ($cartq->num_rows > 0) {

                        
						while ($cartq1 = $cartq->fetch_assoc()) {
                        //The start of cart query   

                            //Query to get products from databases
							$products = "SELECT * FROM products WHERE ID='" . $cartq1["Product_ID"] . "' ";

							$productsq = $conn->query($products);

							if ($productsq->num_rows > 0) {

								
								while ($productsq1 = $productsq->fetch_assoc()) {
                                    //The start of products query


                                    //Show the item from the cart and retrieve the information of products from database
									echo "

			<div class='product'>

				<img src=" . $productsq1["Picture"] . ">

				<div class='product-info'>

					<h2 class='product-name'>" . $productsq1["Name"] . "</h2>

					<h2 class='product-price'>" . $productsq1["Price"] * $cartq1["Quantity"] . " SAR</h2>

				

					<p class='product-quantity'>Qnt: <input type='number' value='" . $cartq1["Quantity"] . "' name='' max='11' min='1' readonly>
                    
                    <a href='delete.php?ID=" . $cartq1["ID"] . "'>
					<p class='product-remove'>
                    
                    
						<i class='fa fa-trash' aria-hidden='true'></i>

						<span class='remove'>Remove</span>

					</p>
                    </a>

				</div>

			</div>
            ";
								}
                                //The end of products query
							}
							$TotalPrice = $TotalPrice + $cartq1["Price"];
							$Quantity = $Quantity + $cartq1["Quantity"];
						}
                        //The end of cart query
					}
                    
                    else {
                        // Show (no item in cart) when the cart of the User is empty 
						echo "<div class='cart-total'> 
                        
        <h2> no item in cart</h2>      
            <h2>
        <script src='https://cdn.lordicon.com/lusqsztk.js'></script>
<lord-icon
    src='https://cdn.lordicon.com/cllunfud.json'
    trigger='loop'
    delay='1400'
    colors='outline:#121331,primary:#eee966,secondary:#30c9e8'
    stroke='40'
    style='width:200px;height:200px'>
</lord-icon>
</h2>	

			
		</div>
        
        ";
					}
					$conn->close();
				}


				?>

            </div>
            </form>




            <div class="cart-total">

                <p>
                    <span>Total Price</span>

                    <span><?php echo "$TotalPrice"; ?></span>
                </p>
                <p>
                    <span>Number of Items</span>

                    <span><?php echo "$Quantity" ?></span>

                </p>

                <!-- post the TotalPrice to payment.php -->
                <form method="post" action="payment.php">
                    <input type="hidden" name="price" value='<?php echo "$TotalPrice" ?>'>
                    <input type=submit value="Proceed to Checkout">
                </form>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <?php

	include("../includes/Footer.html");
	ob_end_flush();
	?>


</body>


</html>
