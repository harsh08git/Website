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
    <title>Vegan Diet</title>
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
    <p style="margin: 50% 0%;">VEGAN SAMPLE DIET PLAN</p>
        <dl> 
            <dt>Monday</dt>
            <dd><b>breakfast</b>: Vegan breakfast sandwich with tofu, lettuce, tomato, turmeric and a plant-milk chai latte.<br><b>lunch</b>: Spiralized zucchini and quinoa salad with peanut dressing.<br>
            <b>dinner</b>: Red lentil and spinach dal over wild rice.</dd>
            <dt>Tuesday</dt>
            <dd><b>breakfast</b>: Overnight oats made with fruit, fortified plant milk, chia seeds and nuts.<br><b>lunch</b>: Seitan sauerkraut sandwich.<br><b>dinner</b>: Pasta with a lentil bolognese sauce and a side salad.</dd>
            <dt>Wednesday</dt>
            <dd><b>breakfast</b>: Mango and spinach smoothie made with fortified plant milk and a banana-flaxseed-walnut muffin<br><b>lunch</b>: Baked tofu sandwich with a side of tomato salad.<br><b>dinner</b>: Vegan chili on a bed of amaranth</dd>
            <dt>Thursday</dt>
            <dd><b>breakfast</b>: Whole-grain toast with hazelnut butter, banana and a fortified plant yogurt<br>
            <b>lunch</b>: Tofu noodle soup with vegetables<br>
            <b>dinner</b>: Jacket sweet potatoes with lettuce, corn, beans, cashews and guacamole</dd>
            <dt>Friday</dt>
            <dd><b>breakfast</b>: Vegan chickpea and onion omelet and a cappuccino made with fortified plant milk.<br>
            <b>lunch</b>: Vegan tacos with mango-pineapple salsa.<br><b>dinner</b>: Tempeh stir-fry with bok choy and broccoli.</dd>
            <dt>Saturday</dt>
            <dd><b>breakfast</b>: Spinach and scrambled tofu wrap and a glass of fortified plant milk.<br>
            <b>lunch</b>: Spiced red lentil, tomato and kale soup with whole-grain toast and hummus<br><b>dinner</b>: Veggie sushi rolls, miso soup, edamame and wakame salad.</dd>
            <dt>Sunday</dt>
            <dd><b>breakfast</b>: Chickpea pancakes, guacamole and salsa and a glass of fortified orange juice<br>
            <b>lunch</b>: Tofu vegan quiche with a side of sautéed mustard greens.<br>
            <b>dinner</b>: Vegan spring rolls.</dd>
        </dl>
    </section>


</body>

</html>