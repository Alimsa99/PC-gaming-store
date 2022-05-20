<?php include '../includes/Header.php'; ?>
<DOCTYPE html>
</DOCTYPE>

<html>

<head>

    <link rel="stylesheet" href="../css/productV.css">

    <title>Main Product Page </title>
</head>

<body>
    <?php
    include('../includes/data_con.php');

    ?>

    <p>

    <div class="div">
        <table>
            <?php
//query to get all products from database
            $q = "SELECT * FROM products ";
            $r = $conn->query($q);

            if ($r->num_rows > 0) {
                // output data of each row
                $tableControl = 1;
                while ($row = $r->fetch_assoc()) {
                    //show items


                    if ($tableControl % 2 == 1) {
                        // set <tr> in first lien of the tabel and after tow items

                        print "<tr>";
                    }
                    echo

                    "<td>
<P> <a href='product.php?product=" . $row["ID"] . "'><img style='float:right' width='25%' height='25%' src=" . $row["Picture"] . " alt=" . $row["Name"] . "/></a></P>
<p>" . $row["Name"] . "</p>
<p>" . $row["Price"] . " SAR</p>
</td>";



                    if ($tableControl % 2 == 0) {
                        // set </tr>  after tow items

                        print "</tr>";
                    }
                    $tableControl = $tableControl + 1;
                }
            } else {
                echo "0 results";
            }
            $conn->close();

            ?>
        </table>

    </div>
    </p>

    <?php

    include('../includes/Footer.html');
    ?>

</body>

</html>