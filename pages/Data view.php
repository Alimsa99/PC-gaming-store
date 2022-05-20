<?php
include('../includes/Header.php');
include('../includes/data_con.php');
?>
<?php
//Preventing users from accessing admin page
if (isset($_SESSION['username'])) {
    header("Location: Home_page.php");
}
//Check if admin didn't log in redirect him to log in page
if (!isset($_SESSION['Admin name'])) {
    header("Location: Admin_login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dataviewCss.css">
    <title>Data view</title>

</head>

<body>
    <table>

        <h1>Product information</h1>
        <?php
        //printing messages depending on type of process
        if (isset($_GET["success"])) {
            if ($_GET["success"] == "addp") {
                echo "<h2>Product has been successfully add </h2>";
            } elseif ($_GET["success"] == "modifyp") {
                echo "<h2>Product has been successfully updated</h2>";
            } elseif ($_GET["success"] == "deletep") {
                echo "<h2>Product has been successfully deleted</h2>";
            }
            elseif ($_GET["success"] == "deleteNotp") {
                echo "<h2>Product ID doesn't  exist </h2>";
            }
        }
        ?>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Stock</td>
                <td>Price</td>
                <td>Picture</td>
                <td>Admin_id</td>
                <td>Summary</td>
        </thead>
        </tr>
        <tbody>
            <?php

            //printing products information inside table
            $q = "SELECT * FROM products";
            $r = $conn->query($q);
            if ($r->num_rows > 0) {

                while ($row = $r->fetch_assoc()) {
                    echo "
    <tr>
    <td>" . $row["ID"] . "</td>
    <td>" . $row["Name"] . "</td>
    <td>" . $row["Stock"] . "</td>
    <td>" . $row["Price"] . "</td>
    <td>" . $row["Picture"] . "</td>
    <td>" . $row["Admin_ID"] . "</td>
    <td>" . $row["Summary"] . "</td>
    
    </tr>
    ";
                }
            }
            ?>
        </tbody>
    </table>
    <!-- Modify product form -->
    <br>
    <div class="update">
        <form action="Modfiy_product.php" method="post" name="modify" onsubmit=" V_modify()">
            <label>product ID <input type="text" placeholder="Enter product id.." name="modify_p"></label>
            <button class="mod" name="mod">Modify products
            </button>
        </form>
    </div>

    <!-- Delete product form -->
    <div class="Delete">
        <form action="Delete_p.php" method="post" name="delete" onsubmit=" V_delete()">
            <label>product ID <input type="text" placeholder="Enter product id.." name="delete_p"></label>
            <button class="delete" name="delete">Delete products
            </button>
        </form>
    </div>

    <!-- Add product button -->
    <button class="add" onclick="window.location.href='Add_product.php'" name="add">Add products
    </button>
    <br><br><br>

    <script src="../js/form_validation.js">

    </script>
    <?php
    include('../includes/Footer.html');

    ?>
</body>

</html>