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
		<title>Diet</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="includes/diet.css">
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


		<div id="content" ng-app="dietinfo" ng-controller="myCtrl">

			<div class="card" id="keto">
				<img src="images/keto.jfif" style="width: 100%; height: 400px;" >
				<div class="container">
					<h4><a href="http://localhost/1914031/Fitmax/keto.php" style="color: black;text-decoration:none;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Keto Diet</a></h4>
					<p id="ketodiet">
						<ul style="background: white;color:black;">
							<li ng-repeat="x in keto">{{x.info}}</li>
						</ul>
					</p>	
				</div>
			</div>
			<div class="card" id="vegan">
				<img src="images/vegan.jfif" style="width: 100%;height: 400px;">
				<div class="container">
					<h4><a href="http://localhost/1914031/Fitmax/vegan.php" style="color: black;text-decoration:none;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Vegan Diet</a></h4>
					<p id="vegandiet">
						<ul style="background: white;color:black;">
							<li ng-repeat="x in vegan">{{x.info}}</li>
						</ul>
					</p>	
				</div>
			</div>
			<div class="card" id="lowcarb">
				<img src="images/lowcarb.jfif" style="width: 100%;height: 400px;" >
				<div class="container">
					<h4><a href="#" style="color: black;text-decoration:none;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Low Carb Diet</a></h4>
					<p id="lowcarbdiet">
						<ul style="background: white;color:black;">
							<li ng-repeat="x in lowcarb">{{x.info}}</li>
						</ul>
					</p>	
				</div>
			</div>
			<div class="card" id="veg">
				<img src="images/vegetarian.jfif" style="width: 100%;height: 400px;">
				<div class="container">
					<h4><a href="#" style="color: black;text-decoration:none;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Vegetarian Diet</a></h4>
					<p id="vegetariandiet">
						<ul style="background: white;color:black;">
							<li ng-repeat="x in veg">{{x.info}}</li>
						</ul>
					</p>	
				</div>
			</div>
		</div>

	<script type="text/javascript">
		var app = angular.module('dietinfo', []);
		app.controller('myCtrl', function($scope) {

			$scope.keto = [{info:"A keto or ketogenic diet is a low-carb, moderate protein, higher-fat diet that can help you burn fat more effectively."},{info:"It has many benefits for weight loss, health, and performance."}]

			$scope.vegan = [{info:"A vegan diet involves eating only foods comprising plants."},{info:"Those who follow this diet avoid all animal products, including meat, dairy, and eggs."}]

			$scope.lowcarb = [{info:"A low-carb diet is one that restricts carbohydrates, primarily found in sugary foods, pasta, and bread."},{info:"Instead of eating carbs, you eat whole foods including natural proteins, fats, and vegetables."}]

			$scope.veg = [{info:"The vegetarian diet involves abstaining from eating meat, fish and poultry."},{info:"Results of vegetarian diet takes time"}]
		});

	</script>
	
	</body>
</html>