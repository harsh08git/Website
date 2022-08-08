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
    <title>Keto Diet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="includes/dietplan.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<body>

    <?php
    if ($_SESSION['UserData']['email']) {
        include 'nav_authenticated.php';
    } else {
        include 'nav_unauthenticated.php';
    }
    ?>

    <section class="dl-blurbs" style="margin: 0% 10%;width:40%;">
    <p style="margin: 50% 0%;">KETO SAMPLE DIET PLAN</p>
        <dl>
            <dt>Monday</dt>
            <dd><b>breakfast</b>: veggie and egg muffins with tomatoes<br><b>lunch</b>: chicken salad with olive oil, feta cheese, olives, and a side salad<br>
            <b>dinner</b>: salmon with asparagus cooked in butter</dd>
            <dt>Tuesday</dt>
            <dd><b>breakfast</b>: egg, tomato, basil, and spinach omelet<br><b>lunch</b>: almond milk, peanut butter, spinach, cocoa powder, and stevia milkshake<br>
            <b>dinner</b>: cheese-shell tacos with salsa</dd>
            <dt>Wednesday</dt>
            <dd><b>breakfast</b>: nut milk chia pudding topped with coconut and blackberries<br><b>lunch</b>: avocado shrimp salad<br><b>dinner</b>: pork chops with Parmesan cheese, broccoli, and salad</dd>
            <dt>Thursday</dt>
            <dd><b>breakfast</b>: omelet with avocado, salsa, peppers, onion, and spices<br><b>lunch</b>: a handful of nuts and celery sticks with guacamole and salsa<br>
            <b>dinner</b>: chicken stuffed with pesto and cream cheese, and a side of grilled zucchini</dd>
            <dt>Friday</dt>
            <dd><b>breakfast</b>: sugar-free Greek, whole milk yogurt with peanut butter, cocoa powder, and berries<br>
                <b>lunch</b>: ground beef lettuce wrap tacos with sliced bell peppers<br><b>dinner</b>: loaded cauliflower and mixed veggies</dd>
            <dt>Saturday</dt>
            <dd><b>breakfast</b>: cream cheese pancakes with blueberries and a side of grilled mushrooms<br>
                <b>lunch</b>: Zucchini and beet “noodle” salad<br><b>dinner</b>: white fish cooked in olive oil with kale and toasted pine nuts</dd>
            <dt>Sunday</dt>
            <dd><b>breakfast</b>: fried eggs with and mushrooms<br>
            <b>lunch</b>: low carb sesame chicken and broccoli<br>
            <b>dinner</b>: spaghetti squash Bolognese</dd>

        </dl>
    </section>


</body>

</html>