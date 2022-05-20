<?php
ob_start();
include '../includes/Header.php';
include '../includes/data_con.php';
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../css/regis.css">
  <meta charset="utf-8">
  <title>PC Gaming Website | Registration</title>

</head>

<body>

  <?php

  if (isset($_POST['register'])) {

    //get information from the form 
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $phone = test_input($_POST['phone']);

    //encrypting password
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

    // condition to check if user leaves field empty 
    if (emptyInputSignup($username, $email, $password, $phone) !== false) {
      header("Location: registrationnew.php?error=emptyinput");
      die();
    }

    // condition to check if user enters invalid username 
    if (invalidUsername($username) !== false) {
      header("Location: registrationnew.php?error=invalidusername");
      die();
    }

    // condition to check if user enters invalid email 
    if (invalidEmail($email) !== false) {
      header("Location: registrationnew.php?error=invalidemail");
      die();
    }

    // condition to check if user enters invalid phone 
    if (invalidPhone($phone) !== false) {
      header("Location: registrationnew.php?error=invalidphone");
      die();
    }

    //query to insert customer information in database
    $sql = "INSERT INTO customer(Username,Email,Password,Phone_number)VALUES('$username','$email','$hashedpwd','$phone')";
    if ($conn->query($sql) === TRUE) {
      header("Location: Log_in.php?success=register");
      die();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  //functions to check users errors
  $result;
  //check empty fields
  function emptyInputSignup($username, $email, $password, $phone)
  {
    if (empty($username) || empty($email) || empty($password) || empty($phone)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }
  //function to check username format
  function invalidUsername($username)
  {
    if (!preg_match("/^\w{5,20}$/", $username)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  //function to check email format
  function invalidEmail($email)
  {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  //function to check phone format
  function invalidPhone($phone)
  {

    if (!preg_match("/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/", $phone)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }
  ?>

  <p>
  <form method="post" name="reg" onsubmit="return V_reg()">
    <fieldset class="center">
      <?php

      //printing messages depending on type of error 
      if (isset($_GET["error"])) {
        //empty fields
        if ($_GET["error"] == "emptyinput") {
          echo "<h2>All field is required</h2>";
        }
        //invalid username
        elseif ($_GET["error"] == "invalidusername") {
          echo "<h2>Invalid username</h2>";
        } 
        //invalid email
        elseif ($_GET["error"] == "invalidemail") {
          echo "<h2>choose proper email</h2>";
        } 
        //invalid phone
        elseif ($_GET["error"] == "invalidphone") {
          echo "<h2>Error invalid Phone number format <br> example: (055) 555-5555 </h2>";
        }
      }

      ?>
      <legend>
        <font size="+3">
          <h1>Registration</h1>
        </font>
      </legend>
      <label for="username"><strong>
          <font size="+2">Username:</font>
        </strong></label>
      <input type="text" id="username" name="username" size="30" maxlength="30" placeholder="Enter your Username"><br><br>
      <label for="email"><strong>
          <font size="+2">Email:</font>
        </strong></label>
      <input type="email" id="email" name="email" size="30" maxlength="30" placeholder="Enter your Email"><br><br>
      <label for="password"><strong>
          <font size="+2">Password:</font>
        </strong></label>
      <input type="password" id="password" name="password" size="30" maxlength="30" placeholder="Enter your password"><br><br>
      <label for="phone"><strong>
          <font size="+2">Phone Number:</font>
        </strong></label>
      <input type="tel" id="phone" name="phone" size="30" maxlength="30" placeholder="(###) ###-####"><br><br>
      <p>
        <center>
          <button class="button-7" role="button" name="register">Register Here</button>
        </center>
      </p>
      Already Member ?<a href="log_in.php" class="link"> Log in</a>
    </fieldset>
  </form>
<br><br><br><br><br>
  
    <?php
    include('../includes/Footer.html');
    ob_end_flush();
    ?>
  

  <!-- Register Form validation -->
  <script src="../js/form_validation.js">

  </script>
</body>

</html>