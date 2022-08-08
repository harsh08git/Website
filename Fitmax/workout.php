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
		<title>Workout</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="includes/workout.css">
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

		<div id="content">

            <div class="mycard" id="chest">
				<img src="images/chest.jpg"  >
				<div class="mycontainer">
					<h4>Chest Workout</h4>
					<a href="http://localhost/1914031/Fitmax/view_workout.php?workout=chest">Go to Exercises</a>
				</div>
			</div>

            <div class="mycard" id="bicep">
				<img src="images/bicep.jpeg"  >
				<div class="mycontainer">
					<h4>Bicep Workout</h4>
					<a href="http://localhost/1914031/Fitmax/view_workout.php?workout=bicep">Go to Exercises</a>
				</div>
			</div>

            <div class="mycard" id="back">
				<img src="images/back.jpeg"  >
				<div class="mycontainer">
					<h4>Back Workout</h4>
					<a href="http://localhost/1914031/Fitmax/view_workout.php?workout=back">Go to Exercises</a>
				</div>
			</div>

            <div class="mycard" id="abs">
                <img src="images/abs.jpg"  >
				<div class="mycontainer">
					<h4>Abs Workout</h4>
					<a href="http://localhost/1914031/Fitmax/view_workout.php?workout=abs">Go to Exercises</a>
				</div>
			</div>
            
            <div class="mycard" id="shoulder">
				<img src="images/shoulder.jpg"  >
				<div class="mycontainer">
					<h4>Shoulder Workout</h4>
					<a href="http://localhost/1914031/Fitmax/view_workout.php?workout=shoulder">Go to Exercises</a>
				</div>
			</div>

            <div class="mycard" id="cardio">
				<img src="images/cardio.jpg"  >
				<div class="mycontainer">
					<h4>Cardio Workout</h4>
					<a href="http://localhost/1914031/Fitmax/view_workout.php?workout=cardio">Go to Exercises</a>
				</div>
			</div>

		</div>	
	</body>
</html>

