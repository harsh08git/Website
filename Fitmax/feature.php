<?php
session_start();
error_reporting(0);

if (!($_SESSION['UserData']['email'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Features</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="includes/features.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body>

    <?php

    if ($_SESSION['UserData']['email']) {
        include 'nav_authenticated.php';
    } else {
        include 'nav_unauthenticated.php';
    }
    ?>

    <div class="card-container">
        <div class="card">
            <div class="card__header">
                <img src="images/bmi.jpg" alt="card__image" class="card__image" width="600" height="200">
            </div>
            <div class="card__body">
                <span class="tag tag-blue">Health</span>
                <h4>BMI CALCULATOR</h4>
                <p>BMI stands for Body Mass Index and is measure of one's body fat based on height and weight. It is an important health factor. We help you know your BMI, the category you fall in and health risk you might face.</p>
            </div>
            <div class="card__footer">
                <a type="button" class="btn btn-outline-primary" href="bmi.php">Check your BMI</a>
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <img src="images/calorie.jpg" alt="card__image" class="card__image" width="600" height="200">
            </div>
            <div class="card__body">
                <span class="tag tag-yellow">Diet</span>
                <h4>CALORIE CALCULATOR</h4>
                <p>Biggest confusion people undergo is amount of nutrients their body actually needs for proper diet and weight management. Our calorie calculator solves that problem and helps to achieve better body results.</p>
            </div>
            <div class="card__footer">
                <a type="button" class="btn btn-outline-warning" href="calorie.php">Show my Calories</a>
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <img src="images/join.jpg" alt="card__image" class="card__image" width="600" height="200">
            </div>
            <div class="card__body">
                <span class="tag tag-red">Member</span>
                <h4>JOIN US</h4>
                <p>Become a part of Fitmax community to access more features like personalized workouts, diets, monthly checkup. We have three plans and you can choose the one that best suits your routine.</p>
            </div>
            <div class="card__footer">
                <a type="button" class="btn btn-outline-danger" href="join.php">Become a Member</a>
            </div>
        </div>
    </div>

</body>

</html>