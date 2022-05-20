<?php include '../includes/Header.php'; ?>
<DOCTYPE html>
</DOCTYPE>

<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="../css/productCSS.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
</head>
<meta charset="utf-8">
<title> Product page </title>

<body>
  <button class="open-button" onclick="openForm()">Do you need Help ?</button>

  <div class="form-popup" id="myForm">
    <form action="mailto: am7g_123@hotmail.com" class="form-container">
      <h1>Contact us</h1>

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter your name" name="name" required>

      <label for="q"><b>Question</b></label>
      <input type="text" placeholder="Enter your question" name="q" required>

      <button type="submit" class="btn">Send</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
  </div>

  <?php

  include('../includes/data_con.php');

  if (!isset($_COOKIE['product5'])) {

    setcookie('product1', 0);
    setcookie('product2', 0);
    setcookie('product3', 0);
    setcookie('product4', 0);
    setcookie('product5', 0);
  }

  ?>


  <p>
    <?php

    $id = $_GET["product"];

    if (empty($_COOKIE['product5'])) {
      setcookie('product5', $id);
    } else {
      $add = 1;
      for ($conter = 1; $conter <= 5; $conter++) {
        $product = "product" . (string)$conter;
        $check = $_COOKIE[$product];

        if ($id == $check) {

          $add = 0;
        }
      }
      if ($add == 1) {

        setcookie('product1', $_COOKIE['product2']);
        setcookie('product2', $_COOKIE['product3']);
        setcookie('product3', $_COOKIE['product4']);
        setcookie('product4', $_COOKIE['product5']);
        setcookie('product5', $id);
      }
    }




    $q = "SELECT * FROM products WHERE ID='$id' ";
    $r = $conn->query($q);

    if ($r->num_rows > 0) {
      // output data of each row
      while ($row = $r->fetch_assoc()) {
        echo "<div class='continer'>
       <p>   
   <h1 class='text-editting'>" . $row['Name'] . "</h1>
       </p>
       
        <img  class='img-design'src=" . $row['Picture'] . "  
         alt=" . $row['Name'] . " style='25'>
  
        
        <p class='mysize'>" . $row['Price'] . "SAR</p>
     
        
        <br>
        <details>
  <summary class='mysize'>Specifications </summary><br>
  <p>" . $row['Summary'] . "</p>
  <br>
  </div>
            
</details>
        <br><div class='centring'>
        <h3 class='qut'>Quantity:</h3>
<form action='addincart.php'method='POST'>
        <input type='number' value='1' max='11'  min='1' class='centring' name='qnt'>
        <br></div>
        <br>
        <button class='button-format' type='submit' name='`AddToCart' value='cart'>
        <i class='fa fa-shopping-cart'style='font-size:30px'></i> <strong>Add to Cart</strong> </button>
            <input type='hidden' name='productID' value='$id'>
            <input type='hidden' name='price' value='" . $row['Price'] . "'>
            </form>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();

    ?>
  </p>

  <?php

  include('../includes/Footer.html');
  ?>

  <script>
    // pop up form functions 
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>
</body>

</html>