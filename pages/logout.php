<html>

<body>
    <?php
    session_start();
    $_SESSION = array(); // Clear the variables.
    session_destroy(); // Destroy the session itself.
    header('location: ../pages/Home_page.php');

    ?>
</body>

</html>