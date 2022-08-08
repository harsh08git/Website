<?php

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "fitmax";

    //Connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    //Check Connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    error_reporting(0);

    if (!($_SESSION['UserData']['email'])) {
        header("location:login.php");
    }

    $workout = isset($_GET['workout']) ? $_GET['workout'] : die();

    $sql = "SELECT * FROM " . $workout  ;
    $result = $conn->query($sql);

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
		<link rel="stylesheet" type="text/css" href="includes/workout_single.css">
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
            <?php 
                echo "<h2>". ucfirst($workout) . " Workout Exercises</h2>";
            ?>

            <?php 
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<div class='exercise'>";
                        echo "<h4>" . $row['name'] . "</h4>";
                        echo "<p>" . $row["description"] . "</p>";
                        echo "<iframe width='560' height='315' src=' " . $row["video"] . "' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                        echo "</div>";
                    }
                }
            ?>
        
        </div>

	</body>
</html>

