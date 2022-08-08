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
    <title>Membership</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="includes/join.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body style="background-image: url('images/membership_mini.jpg');">

    <?php

    if ($_SESSION['UserData']['email']) {
        include 'nav_authenticated.php';
    } else {
        include 'nav_unauthenticated.php';
    }
    ?>

    <section class="info">
    <h1 style="font-size: 50px; margin:0% 25%;font-weight:bolder;">JOIN FITMAX COMMUNITY</h1>
    </section>
    <section class="cards-wrapper">
        <div class="card-grid-space">
            <a class="card" href="http://localhost/1914031/Fitmax/payment.php?member=mini" style="background-image: url(images/mini.jpg); background-size:cover;background-repeat:no-repeat">
                <div>
                    <h1>Premium Mini</h1>
                    <p>Premium Mini is a 3 month membership program. Plan Features:</p>
                    <div class="tags">
                        <div class="tag">Personal Training</div>
                        <div class="tag">Diet Plan</div>
                        <div class="tag">Strength Training</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-grid-space">
            <a class="card" href="http://localhost/1914031/Fitmax/payment.php?member=super" style="background-image: url(images/premium_normal.jpg); background-size:cover;background-repeat:no-repeat">
                <div>
                    <h1>Premium Super</h1>
                    <p>Premium Super is a 6 month membership program. Plan Features:</p>
                    <div class="tags">
                        <div class="tag">Personal & Group Training</div>
                        <div class="tag">Nutrition Support</div>
                        <div class="tag">Crossfit Workout</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-grid-space">
            <a class="card" href="http://localhost/1914031/Fitmax/payment.php?member=pro" style="background-image: url(images/premium_pro.jpg); background-size:cover;background-repeat:no-repeat">
                <div>
                    <h1>Premium Pro</h1>
                    <p>Premium Pro is a 12 month membership program. Plan Features:</p>
                    <div class="tags">
                        <div class="tag">Full Body Assessment</div>
                        <div class="tag">Training & Diet Routine</div>
                        <div class="tag">Access to Fitmax's Private Member Area</div>
                    </div>
                </div>
            </a>
        </div>
        <!-- https://images.unsplash.com/photo-1520839090488-4a6c211e2f94?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=38951b8650067840307cba514b554ba5&auto=format&fit=crop&w=1350&q=80 -->
    </section>

</body>

</html>