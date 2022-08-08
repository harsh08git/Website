<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>BMI</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="includes/bmi.css">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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

	<form name="bmiform" ng-app="myApp"  ng-controller="validateCtrl">

		<h1 class="title-a">BMI Calculator</h1>

		<label>Height</label>
		<div class="input-group mb-3">
		  <input type="number" class="form-control" placeholder="centimeters"  aria-describedby="heightunit" min="0" name="height" ng-model = "height">
		  <span class="input-group-text" id="heightunit">cm</span>
		</div>
		<p ng-show="bmiform.height.$untouched" style="color: red;">Height is Required</p>

		<label>Weight</label>
		<div class="input-group mb-3">
		  <input type="number" class="form-control" placeholder="kilograms"  aria-describedby="weightunit" min="0" name="weight" ng-model = "weight">
		  <span class="input-group-text" id="weightunit">kg</span>
		</div>
		<p ng-show="bmiform.weight.$untouched" style="color: red;">Weight is Required</p>

		<div class="input-group mb-3">
			<button title="Calculate" onclick="OnCalc()" class="btn btn-secondary" style="margin-right: 5px; ">Calculate</button>
			<button title="Reset" onclick="OnRes()" class="btn btn-warning" style="margin-right: 5px; ">Reset</button>			
		</div>

		<label>BMI</label>
		<div class="input-group mb-3">
		  <input type="text" class="form-control" disabled name="bmi">
		  <span class="input-group-text" id="weightunit">kg/m<sup>2</sup></span>
		</div>

		<label>BMI Category</label>
		<div class="input-group mb-3">
			<input class="form-control" type="text" disabled name="bmicat">
		</div>

		<label>Health Risk</label>
		<div class="input-group mb-3">
			<input class="form-control" type="text" disabled name="health">
		</div>		

	</form>
</body>

<script type="text/javascript">

	var app = angular.module('myApp', []);
		app.controller('validateCtrl', function($scope) {
	});

	function roundUp(num, precision) {
 		precision = Math.pow(10, precision)
  		return Math.ceil(num * precision) / precision
	}

	function OnCalc(){
		let height = document.bmiform.height.value;
		let weight = document.bmiform.weight.value;
		let bmi;

		if (height == '' || weight == ''){
			alert("Height and Weight Fields cannot be left empty");
			return false;
		}
		console.log(height);
		console.log(weight);

		height = height/100;
		bmi = weight/(height*height)

		if (bmi<=18.4){
			document.bmiform.bmi.value = roundUp(bmi,2);
			document.bmiform.bmicat.value = "Underweight";
			document.bmiform.health.value = "Malnutrition risk";
		} else if(bmi>18.4 && bmi<=24.9){
			document.bmiform.bmi.value = roundUp(bmi,2);
			document.bmiform.bmicat.value = "Normalweight";
			document.bmiform.health.value = "Low risk";
		} else if(bmi>=25 && bmi<=29.9){
			document.bmiform.bmi.value = roundUp(bmi,2);
			document.bmiform.bmicat.value = "Overweight";
			document.bmiform.health.value = "Enchanced risk";
		} else if(bmi>=30 && bmi<=34.9){
			document.bmiform.bmi.value = roundUp(bmi,2);
			document.bmiform.bmicat.value = "Moderately Obese";
			document.bmiform.health.value = "Medium risk";
		} else if(bmi>=35 && bmi<=39.9){
			document.bmiform.bmi.value = roundUp(bmi,2);
			document.bmiform.bmicat.value = "Severely Obese";
			document.bmiform.health.value = "High risk";
		} else{
			document.bmiform.bmi.value = roundUp(bmi,2);
			document.bmiform.bmicat.value = "Very Severely Obese";
			document.bmiform.health.value = "Very high risk";	
		}

	}

	function OnRes(){
		document.bmiform.height.value = "";
		document.bmiform.weight.value = "";
		document.bmiform.bmi.value = "";
		document.bmiform.bmicat.value = "";
		document.bmiform.health.value = "";
	}

</script>
</html>