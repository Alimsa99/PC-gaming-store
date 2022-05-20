<?php
    include("../includes/data_con.php");
    include('../includes/Header.php');

    ?>
<html>

<head>
    
    <link rel="stylesheet" href="../css/confirm&paymentCss.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    

</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' or !isset($_SESSION["username"])) {

        header('Location:Home page.php');
    }
    $pr = $_POST["price"];
    ?>


    <?php

    if ($pr == 0) {
        header('Location:products view.php');
    }

    ?>


    <form method="post" action="confirm page.php">


        <h1 align="center">payment <i class="fa fa-money" aria-hidden="true"></i></h1>

        <fieldset>
            <div><legend>payment method</legend></div>
            <table align="center">
                <tr>

                    <td><input type="radio" value="Credit card" name="payment" required></td>
                    <td><i class="fa fa-credit-card-alt" aria-hidden="true"></i></td>
                    <td><label> Visa , master card or mada </label></td>

                </tr>

                <tr>
                    <td><input type="radio" value="stc pay" name="payment"></td>
                    <td><i class="fa fa-credit-card" aria-hidden="true"></i></td>
                    <td><label> STC PAY </label></td>
                </tr>

                <tr>
                    <td><input type="radio" value="Pay on Delivery" name="payment"></td>
                    <td><i class="fa fa-handshake-o" aria-hidden="true"></i></td>
                    <td><label> Pay on Delivery </label></td>

                </tr>



            </table>

        </fieldset>
        <p>
        <div class="cart-total">

            <p>

                <span>Total Price</span>

                <span><?php echo "$pr" ?></span>
            </p>

            <p>

                <span>select location for delivery</span>

                <span><select name="location">
                        <option>Alkhobar</option>
                        <option>Qatif</option>
                        <option>Dammam</option>
                    </select></span>

            </p>
            <p align="center">
                <input type="submit" value="Confirm payment" ?>
            </p>
        </div>
        </p>

    </form>

    <?php
    include('../includes/Footer.html');

    ?>

</body>

</html>