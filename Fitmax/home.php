<?php
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="includes/home.css"> 
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    </head>

    <body>
        <?php 

            if($_SESSION['UserData']['email']){
                include 'nav_authenticated.php';
            }
            else{
                include 'nav_unauthenticated.php';
            }    

        ?>

    	<div id="Fitmax">
    		<!-- <h2 onmouseover="headcenter()" onmouseout="headnormal()" id="brand">FITMAX</h2> -->
            <h2 id="brand">FITMAX</h2>
    		<p>Fitness and health have become one of the major aspects of concern nowadays. With new ideas and evolution in the sector of living healthy, and exercising, there is now the unlimited possibility of what we can do. And the best part about being in this digitalized era is that you have access to almost everything online. That’s right, now there is no need to wait for health tips, gym memberships, reserve and book for personal trainers or even shop for gym equipment the old-fashioned way. Want to be healthy and have a perfect body? FITMAX is the right decision for you! Our personal training program and diet plans could get the shape of your dream shortly!</p>
    	</div>
        <div id="Result">
            <h2>OUR RESULTS</h2>
            <div id="bodyimages">
                <img src="images/body1.jfif" id="img1" onmouseover="imghigh('img1')" onmousedown="imgnormal('img1')">
                <img src="images/body2.jfif" id="img2" onmouseover="imghigh('img2')" onmousedown="imgnormal('img2')">
                <img src="images/body3.jfif" id="img3" onmouseover="imghigh('img3')" onmousedown="imgnormal('img3')">
                <img src="images/body4.jfif" id="img4" onmouseover="imghigh('img4')" onmousedown="imgnormal('img4')">
                <img src="images/body5.jfif" id="img5" onmouseover="imghigh('img5')" onmousedown="imgnormal('img5')">
                <img src="images/body6.jfif" id="img6" onmouseover="imghigh('img6')" onmousedown="imgnormal('img6')">
                <img src="images/body7.jfif" id="img7" onmouseover="imghigh('img7')" onmousedown="imgnormal('img7')">
                <img src="images/body8.jfif" id="img8" onmouseover="imghigh('img8')" onmousedown="imgnormal('img8')">     
            </div>
        </div>
    	<div id="Diet">
    		<h2>DIET</h2>
    		<p>Diet can also refer to the food and drink a person consumes daily and the mental and physical circumstances connected to eating. Nutrition involves more than simply eating a “good” diet—it is about nourishment on every level. Maintaining a healthy diet is to balance the correct level of essential nutrients, vitamins, minerals, etc. regularly and adequately. It is necessary to achieve a balanced diet for living a healthy life. We provide three types of Diet- Keto, Vegan and Low Carb diet. A proper description of each diet is available, you can go and check that out in the Diet section</p>
            <a href="diet.php" class="button">View more</a>
    	</div>
    	<div id="Workout">
    		<h2>WORKOUT</h2>
    		<p>Studies show that diet alone is not as effective in achieving a healthy body weight as diet combined with exercise. Physical activity has many other health benefits as well. To keep your body fit and strong you need to workout daily. Working out with consistency is important for achieving fitness results. Creating a workout plan will help you to achieve greater consistency. A commitment to a regular workout regimen will increase your fitness level, improve your health and generate a greater sense of mental well being. A well thought out fitness plan will go a long way in helping you to reach your goals. To achieve consistency, you will want to think about the types of exercise that you can do on a regular basis. We help you by providing customised workout schedules prepared by expert trainers taht you can follow on regular basis. All the exercises have a video attached to reference and steps as well</p>
            <a href="workout.php" class="button">View more</a>
    	</div>
    	<div id="Feature">
    		<h2>FEATURES</h2>
    		<p>Here we provide users with features like BMI calculator, Calorie calculator and Membership options.</p>
            <a href="feature.php" class="button">View more</a>
    	</div>
        <div id="Choose">
            <h2>WHY CHOOSE US</h2>
            <div id="choose_section">
                <div class="choose_section">
                    <h4>12</h4>
                    <h6>Training Programs</h6>
                </div>
                <div class="choose_section">
                    <h4>14</h4>
                    <h6>Years Experience</h6>
                </div>
                <div class="choose_section">
                    <h4>650</h4>
                    <h6>Happy Clients</h6>
                </div>
                <div class="choose_section">
                    <h4>6</h4>
                    <h6>Best Trainers</h6>
                </div>
            </div>
        </div>
    	<div id="Contact">
    		<h2>CONTACT US</h2>
    		<p>In case of any queries you can check out the Contact Us section <span style="font-weight: bolder; text-decoration: underline;" ondblclick="offershow()">Double Click Here for Special Offer</span></p>
            <p id="offer"></p>
            <a href="contact.php" class="button">Contact Us</a>
    	</div>

        <div class="footer">
            <div class="column-left">
                <h5>MENU</h5>
                <a href="fitmax.php">FITMAX</a> 
                <a href="home.php">Home</a> 
                <a href="diet.php">Diet</a>
                <a href="workout.php">Workout</a>
                <a href="feature.php">Features</a>
                <a href="contact.php">Contact Us</a>
            </div>
            <div class="column-middle">
                <p>Feel free to reach out to us</p>
                <p>123, Purnima society, Vashi Sector 17, Navi Mumbai - 86</p>
                <p>Our timings(Thurs-Sun Closed)</p>
                <p>Monday: 9am-4pm</p>
                <p>Tuesday: 10am-4pm</p>
                <p>Wednesday: 9am-11pm</p>
            </div>
            <div class="column-right">
                <p>Managed by HARSH & KRISHANG</p>
                <p>Mobile: 9594532421 / 9876543210</p>
                <p>Email: Harshang@fitmax.in</p>
                <p>Connect with Us</p>
                <div id="connect">
                    <a href="https://www.instagram.com/_harshkhona_/" style="order: 3;"><i class="fa fa-instagram" aria-hidden="true"></i></a>                  
                    <a href="https://www.facebook.com/profile.php?id=100008000297592" style="order: 2;"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    <a href="#" style="order: 4;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" style="order: 1;"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>                
                </div>
            </div>
        </div>

    <script type="text/javascript">

        function imghigh(elmId){
            document.getElementById(elmId).style.opacity = "1";
            document.getElementById(elmId).style.boxShadow = "4px 0px 10px grey";
        }

        function imgnormal(elmId){
            document.getElementById(elmId).style.opacity = "0.2";
        }        
        
        function headcenter(){
            document.getElementById("brand").style.textAlign = 'center';
            document.getElementById("brand").style.textDecoration = 'underline';
        }

        function headnormal(){
            document.getElementById("brand").style.textAlign = '';
            document.getElementById("brand").style.textDecoration = 'none';
        }

        function offershow(){
            document.getElementById("offer").innerHTML = "Coupon Code: HARSHANG";
            document.getElementById("offer").style.fontWeight = "bolder";
            document.getElementById("offer").style.fontSize = "30px";
        }
    </script>

</html>