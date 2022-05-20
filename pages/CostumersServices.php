<?php
ob_start();

?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/productV.css">
    <title> Customer Services </title>
    <link rel="stylesheet" href="../css/costumersSV.css">
</head>

<body>
    <?php
    include('../includes/Header.php');
    ?>

    <br>
    <div class="container">

        <h1 class="container"> Common Questions</h1>

        <summary>
            <h2> Q1-How can I get free shipping? </h2>
        </summary>
        <details>
            <h3>It depends on what's in your cart and what country you're ordering from</h3>
        </details>

        <summary>
            <h2>Q2-How can I cancel my order?</h2>
        </summary>
        <details>
            <h3>You can cancel your order during the confirmation or while it's under preparing</h3>
        </details>

        <summary>
            <h2>Q3-How can I track my order?</h2>
        </summary>
        <details>
            <h3>As well as being notified by email, you can check the progress and status of your order</h3>
        </details>

        <summary>
            <h2>Q4-Which countries do you ship to?</h2>
        </summary>
        <details>
            <h3>Currently we only ship orders to Saudi araibia</h3>
        </details>

        <br>

    </div>
    <div class="container">
        <h2 style="text-align:center"> If you don't see your question, you can ask here: </h2>
        <form action="mailto: am7g_123@hotmail.com" method="post">
            <?php

            ?>
            <div class="row">
                <div class="col-25">
                    <label for="pname">Name</label>
                </div>

                <div class="col-75">
                    <input type="text" id="username" name="p_name" placeholder="Enter your name here " required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="stock">Email Address</label>
                </div>
                <div class="col-75">
                    <input type="email" id="email" name="price" placeholder="Enter your Email here.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="price">Write your question </label>
                </div>
                <div class="col-75">
                    <textarea id="summary" name="quetion" placeholder="Write your quetion here.." style="height:200px" required></textarea>
                </div>
            </div>


            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    <h1 class="h1"> Our location </h1>
    <div class="map" id="googleMap"></div>

    <script>
        //google map API script
        var marker
        function myMap() {
            var mapProp = {
                center: new google.maps.LatLng(26.39511, 50.19561),
                zoom: 18,
                mapTypeId: 'satellite',
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var marker = new google.maps.Marker({
                map,
                animation: google.maps.Animation.DROP,
                position: {
                    lat: 26.39511,
                    lng: 50.19561
                },
            });

        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxSoD96jbfa84IOyGaTb3Kd_9tTQznZ5s&callback=myMap"></script>

    <?php
    include('../includes/Footer.html');
    ob_end_flush();
    ?>

</body>

</html>