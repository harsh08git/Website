<?php
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>FITMAX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="includes/fitmax.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
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

    <div class = 'mycontainer'>
        <figure>
            <img src='images/fitmax1.jpg' id='mainimg'>
        </figure>

        <div class = 'thumb_list'>
            <ul>
                <li><img src='images/fitmax1.jpg' id='img1' onclick='displayimg1()'></li>
                <li><img src='images/fitmax2.jpeg' id='img2' onclick='displayimg2()'></li>
                <li><img src='images/fitmax3.jpg' id='img3' onclick='displayimg3()'></li>
                <li><img src='images/fitmax4.jpg' id='img4' onclick='displayimg4()'></li>
            </ul> 
        </div>        
    
        <button><a href='home.php'>Click Here!!</a></button>
    </div>
</body>

<script type="text/javascript">
    let mainImg = document.getElementById("mainimg")

    function displayimg1(){
        mainImg.src = document.getElementById('img1').src
    }

    function displayimg2(){
        mainImg.src = document.getElementById('img2').src
    }

    function displayimg3(){
        mainImg.src = document.getElementById('img3').src
    }

    function displayimg4(){
        mainImg.src = document.getElementById('img4').src
    }
</script>
</html>