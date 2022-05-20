<html>

<head>

    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/confirm&paymentCss.css">

    <title>Confirm page</title>
</head>

<body>

    <?php
    include('../includes/Header.php');
    include('../includes/data_con.php');
    ?>

    <p></p>


    <fieldset>


        <p><strong>Thank you for shopping</strong></p>



        <p>
            <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
            <lord-icon src="https://cdn.lordicon.com/hjeefwhm.json" trigger="loop" colors="primary:#30e849" state="morph-check-in" style="width:250px;height:250px">
            </lord-icon>
        </p>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            header('location: Home_page.php');
        }
        ?>

        <p>Your order number is :<?php
                                    $q = "SELECT OrderNumber FROM bill ";
                                    $r = $conn->query($q);
                                    $max = 1000;
                                    if ($r->num_rows > 0) {
                                        // output data of each row

                                        while ($row = $r->fetch_assoc()) {
                                            if ($max < $row["OrderNumber"]) {
                                                $max = $row["OrderNumber"];
                                            }
                                        }
                                    }
                                    $max = $max + 1;
                                    echo "$max";
                                    ?>
            <?php
            if (!isset($_SESSION["username"])) {

                header('location: log_in.php');
            } else {




                $id = $_SESSION["id"];


                $cart = "SELECT * FROM cart WHERE Customer_ID='$id' ";
                $cartq = $conn->query($cart);


                if ($cartq->num_rows > 0) {
                    while ($cartq1 = $cartq->fetch_assoc()) {
                        $pr = $cartq1['Price'];
                        $pid = $cartq1['Product_ID'];
                        $pm = $_POST['payment'];
                        $lo = $_POST['location'];
                        $qu = $cartq1['Quantity'];

                        $bill = "INSERT INTO bill(Price, Product_ID, Payment_method, Customer_ID, OrderNumber, Location, Quantity)
        VALUES($pr,$pid,'$pm',$id,$max,'$lo',$qu)";
                        mysqli_query($conn, $bill);

                        $updateStock = "Update products set Stock  = Stock - $qu  WHERE ID=$pid";

                        mysqli_query($conn, $updateStock);
                    }
                }
            }
            $del = "DELETE FROM `cart` WHERE Customer_ID=$id";
            mysqli_query($conn, $del);

            $conn->close();
            ?>

        </p>
    </fieldset>
    <p>

    </p>



    <?php
    (include('../includes/Footer.html'));
    ?>

</body>

</html>