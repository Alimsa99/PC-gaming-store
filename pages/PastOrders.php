<?php 
include '../includes/Header.php';
ob_start();
include('../includes/data_con.php');
?>
<!DOCTYPE html>
<html>

<head>

	<title> PastOrders</title>
<link rel="stylesheet" href="../css/PastOrdersCSS.css">
</head>

<body>
	<div class='container'>

		<h1>past orders</h1>

		<div class='cart'>
			<div class='products'>
				<?php

				if (!isset($_SESSION["username"])) {

					header('location: log_in.php');
				}

				if (isset($_GET['OrderNumber'])) {

					$Quantity = 0;
					$TotalPrice = 0;
					$id = $_SESSION["id"];
					$ornumber = $_GET['OrderNumber'];

                    // query to get the bills of the customer from database
					$bill = "SELECT * FROM bill WHERE Customer_ID='$id' AND OrderNumber=$ornumber ";

					$billq = $conn->query($bill);


					if ($billq->num_rows > 0) {


						while ($billq1 = $billq->fetch_assoc()) {
                            
                           //query to get products from databases

							$products = "SELECT * FROM products WHERE ID=" . $billq1["Product_ID"] . " ";

							$productsq = $conn->query($products);


							if ($productsq->num_rows > 0) {

								// output data of each row
								while ($productsq1 = $productsq->fetch_assoc()) {
                                    
                                    //show the item from the cart and retrieve the informatoin of products from databaese



									echo "
	

		

			<div class='product'>

				<img src=" . $productsq1["Picture"] . ">

				<div class='product-info'>

					<h2 class='product-name'>" . $productsq1["Name"] . "</h2>

					<h2 class='product-price'>" . $productsq1["Price"] * $billq1["Quantity"] . " SAR</h2>

				

					<p class='product-quantity'>Qnt: <input type='number' value='" . $billq1["Quantity"] . "' name='' max='11' min='1' readonly>


				</div>

			</div>
            
            
            
            ";
								}
							}
							$TotalPrice = $TotalPrice + $billq1["Price"];
							$Quantity = $Quantity + $billq1["Quantity"];
                            $billnub=$billq1['OrderNumber'];
                            $payment=$billq1["Payment_method"];
						}

						echo "<div class='cart-total'>
            
            

			<p>

				<span>Total Price</span>

				<span>$TotalPrice </span>

			</p>

			<p>

				<span>Number of Items</span>

				<span>$Quantity</span>

			</p>
            
            <p>
            
            <span> Order number </span>
            
            <span> $billnub </span>
            
            
            </p>
            
            
            
            <p>
            
            <span> Payment method </span>
            
            <span> $payment </span>
            
            
            </p>
            
            </div>
";
					} else {
						echo "<div class='cart-total'>
            
            <p>
            select order to view it    
                
                
            </p>

			

			
		</div>";
					}
				} else {
				}


				?>

			</div>

			<div class="cart-total">

				<h2>bill numbers</h2>
                
                

				<?php
                
                //qurey to set OrderNumber buttons 
                
				$orders = "SELECT OrderNumber FROM bill WHERE Customer_ID=" . $_SESSION["id"] . " ";

				$BillNumber = 0;
				$ordersq = $conn->query($orders);

				if ($ordersq->num_rows > 0) {

					while ($ordersq1 = $ordersq->fetch_assoc()) {
                        
                           //uesd to print bill number one time  
						if ($ordersq1['OrderNumber'] > $BillNumber) {
							$BillNumber = $ordersq1['OrderNumber'];
							echo "
                            <form method='get' action='PastOrders.php'>
                            <button class='button' name='OrderNumber' value='$BillNumber' ><span class='button_top'>Order " . $ordersq1['OrderNumber'] . "</span></button>
                            </form>
                            
                        <br>
                            
                            ";
						}
					}
				}

				$conn->close();

				?>
                
			</div>
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