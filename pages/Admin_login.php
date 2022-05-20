<?php include('../includes/Header.php'); ?>
<?php
ob_start();
include '../includes/data_con.php';
?>
<DOCTYPE html>
</DOCTYPE>

<html>

<head>

    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/log_in.css">


    <meta charset="utf-8">
    <title>Log in</title>
</head>

<body>
    <form action="" method="post" name="log" onsubmit="return V_login()">
        <p>
        <fieldset class="center">
            <?php
            if (isset($_POST['log'])) {
                if (isset($_POST['username']) and  isset($_POST['password'])) {
                    //save Username in  Password in variables     
                    $username = test_input($_POST['username']);
                    $password = test_input($_POST['password']);
                }
                //check the Username and Password query 
                $q = "SELECT * FROM admin where Username='$username'and Password= SHA1('$password')";
                $r = $conn->query($q);
                if ($r->num_rows > 0) {
                    while ($row = $r->fetch_assoc()) {
                        //save Admin name and his ID in SESSION
                        $_SESSION["Admin name"] = $row['Username'];
                        $_SESSION["id"] = $row['ID'];
                        header('location: Data view.php');
                        die();
                    }
                }
                // printing message if username and password is wrong
                else {
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
                    <h1>Admin log in</h1>
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
                    <button class="button-7" name="log" role="button"> Submit</button>
                </center>
            </p>
        </fieldset>
    </form>

    <br><br> <br><br> <br><br> <br><br>
    <?php
    include('../includes/Footer.html');
    ob_end_flush();

    ?>
    <!-- log in Form validation -->
    <script src="../js/form_validation.js">

    </script>
</body>

</html>