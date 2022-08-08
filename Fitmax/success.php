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
    <title>Success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="includes/join.css">
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

    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4" style="color: green;">Payment Successful</h1>
        <p class="lead">You are now a part of fitmax community.</p>
    </div>
    </div>

</body>
</html>