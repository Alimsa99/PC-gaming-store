<?php include('../includes/Header.php'); ?>
<?php
ob_start();
include '../includes/data_con.php';
?>
<?php
//check if user did log in redirect him to homepage
if (isset($_SESSION['username'])) {
    header("Location: Home_page.php");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/log_in.css">

    <title>Log in</title>
</head>

<body>
    <form method="post" name="log" onsubmit=" V_login()">
        <?php
        //Check if registration process was successful
        if (isset($_GET["success"])) {
            //printing message to new users
            if ($_GET["success"] == "register") {
                echo "<h2 style='text-align:center;'>Account has been successfully created</h2>";
            }
        }
        ?>
        <p>
        <fieldset class="center">
            <?php

            // checking if button has been set 
            if (isset($_POST['in'])) {
                if (isset($_POST['username']) and isset($_POST['password'])) {
                    $username = test_input($_POST['username']);
                    $password = test_input($_POST['password']);
                }

                //getting the username and password from database
                $q = "SELECT * FROM customer where Username='$username'";
                $r = $conn->query($q);
                if ($r->num_rows > 0) {
                    while ($row = $r->fetch_assoc()) {
                        $checkpwd = password_verify($password, $row['Password']);
                        if ($checkpwd) {
                            $_SESSION["username"] = $row['Username'];
                            $_SESSION["id"] = $row['ID'];
                            header('location: Home_page.php');
                            die();
                        } 
                    }
                }else {
                    // non match Username or Password message
                    echo "
                <script src='https://cdn.lordicon.com/lusqsztk.js'></script>
                <lord-icon
                src='https://cdn.lordicon.com/vfzqittk.json'
                trigger='loop'
                delay='1000'
                colors='primary:#e83a30'
                state='hover-3'
                style='width:120px;height:120px'>
                </lord-icon>
                        
                        <p><h3>Your username or password is wrong</h3></p>";
                }
            }
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            ?>
            <legend>
                <font size="+3">
                    <h1>log in</h1>
                </font>
            </legend>
            <label for="username"><strong>
                    <font size="+2"> Username:</font>
                </strong></label><br><br>
            <input type="text" id="username" name="username" size="30" maxlength="30" placeholder="Enter your Username"><br><br>
            <br>
            <label for="password"><strong>
                    <font size="+2">Password:</font>
                </strong></label><br><br>
            <input type="password" id="password" name="password" size="30" maxlength="30" placeholder="Enter your password"><br><br>
            <p>
                <center>

                    <button class="button-7" name="in" role="button">Log in</button>
                </center>
            </p>
            Don't have an account ? <a href="registrationnew.php" class="link">Register here</a><br>
            Admin ?<a href="Admin_login.php" class="link"> Log in here</a>
        </fieldset>
    </form>

    <br><br> <br><br> <br><br> <br><br>
    <?php
    include('../includes/Footer.html');
    ob_end_flush();

    ?>

    <!----log in Form validation --->
    <script src="../js/form_validation.js">

    </script>
</body>

</html>