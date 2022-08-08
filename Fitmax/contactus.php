<?php
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();

session_start();
error_reporting(0);

$contact = 0;
?>

<!DOCTYPE html>
<html>

<head>
	<title>Contact Us</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="includes/contact.css">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<style>
	.error {
		color: red;
	}

	i {
		color: white;
		padding: 10px;
	}

	#connect a {
		font-size: 30px;
	}

	.response{
		background: rgb(0,0,0,0.8);
		width: 100%;
		color: white;
	}

</style>

<body>

	<?php

	if ($_SESSION['UserData']['email']) {
		include 'nav_authenticated.php';
	} else {
		include 'nav_unauthenticated.php';
	}

	?>


	<?php

	$nameErr = $emailErr = $mobileErr = $genderErr = $ageErr = $checkErr = $msgErr = "";
	$name = $email = $mobile = $gender = $age = $check = $msg = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST['Name'])) {
			$nameErr = "Name is required";
		} else {
			$name = input_data($_POST['Name']);
			//Name contains only alphabets and white space
			if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
				$nameErr = "Only alphabets and white space are allowed";
			}
		}

		if (empty($_POST["Email"])) {
			$emailErr = "Email is required";
		} else {
			$email = input_data($_POST["Email"]);
			//Email format validation  
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}

		if (empty($_POST["Number"])) {
			$mobileErr = "Mobile number is required";
		} else {
			$mobile = input_data($_POST["Number"]);
			//Mobile Format validation
			if (!preg_match("/^[0-9]*$/", $mobile)) {
				$mobileErr = "Invalid Mobile Number";
			}
			if (strlen($mobile) != 10) {
				$mobileErr = "10 Digit Number required";
			}
		}

		if (isset($_POST["Sex"]) && $_POST["Sex"] != "") {
			$gender = input_data($_POST["Sex"]);
		} else {
			$genderErr = "Please select your sex";
		}

		if (empty($_POST['Age'])) {
			$ageErr = "Age is required";
		} else {
			$age = intval(input_data($_POST["Age"]));
			if ($age < 0) {
				$ageErr = "Invalid age";
			}
		}

		if (isset($_POST["Check"]) && $_POST['Check'] != "") {
			$check = input_data($_POST["Check"]);
		} else {
			$checkErr = "Tick the box to complete submission";
		}

		if (empty($_POST['Message'])) {
			$msgErr = "Message cannot be empty";
		} else {
			$msg = input_data($_POST['Message']);
		}
	}

	function input_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	?>

	<div class="row">
		<div class="col-lg-7 col-md-12">
			<div id="detailsform">
				<p>Get in touch</p>

				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<label for="name">Name</label>
					<input type="text" name="Name" id="name" placeholder="Name" onfocus="myfocus('name')" onblur="myblur('name')">
					<div class="error"><?php echo $nameErr; ?></div><br>

					<label for="email">Email</label>
					<input type="text" name="Email" id="email" placeholder="Email Address" onfocus="myfocus('email')" onblur="myblur('email')">
					<div class="error"><?php echo $emailErr; ?></div><br>

					<label for="phone">Phone</label>
					<input type="text" name="Number" id="phone" placeholder="Phone Number" onfocus="myfocus('phone')" onblur="myblur('phone')">
					<div class="error"><?php echo $mobileErr; ?></div><br>

					<label>Sex</label><br>
					<input type="radio" name="Sex" id="male" value="Male">
					<label for="male">Male</label>
					<input type="radio" name="Sex" id="female" value="Female">
					<label for="female">Female</label>
					<div class="error"><?php echo $genderErr; ?></div><br>

					<label for="age">Age</label>
					<input type="number" id="age" name="Age" style="width: 60px;"><br>
					<div class="error"><?php echo $ageErr; ?></div><br>

					<label for="msg" id="msgbar">Message: </label>
					<textarea id="msg" rows="5" cols="25" placeholder="Message" name="Message" onfocus="myfocus()" onblur="myblur()"></textarea><br>
					<div class="error"><?php echo $msgErr; ?></div><br>

					<label>Not a robot</label>
					<input type="checkbox" name="Check">
					<div class="error"><?php echo $checkErr; ?></div><br>

					<input type="submit" name='submit' value="SEND">
					<input type="reset" value="RESET">
				</form>
			</div>
		</div>

		<div class="col-lg-5 col-md-12 ">
			<div class="card" style="width: 30rem;background:rgb(0,0,0,0.8);margin:10%;">
				<img src="images/pic.jpg" class="card-img-top" alt="Owners">
				<div class="card-body">
					<p class="card-text" style="color: white; font-size:40px; font-family:'Times New Roman', Times, serif;">About Us</p>
					<p class="card-text" style="color: white; font-size:20px;font-family:'Times New Roman', Times, serif;">We are Harsh and Krishang. FITMAX is a all in one fitness website. The thought process behind FITMAX was that people can access everything at one place and thus improve their health and fitness. </p>
					<p class="card-text" style="color: white; font-size:40px; font-family:'Times New Roman', Times, serif;">Reach Us</p>
					<div id="connect" style="margin-left: 28%;">
						<a href="https://www.instagram.com/_harshkhona_/" style="order: 3;"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="https://www.facebook.com/profile.php?id=100008000297592" style="order: 2;"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
						<a href="#" style="order: 4;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="#" style="order: 1;"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div class="response">
			<?php

			if (isset($_POST['submit'])) {
				if ($nameErr == "" && $emailErr == "" && $mobileErr == "" && $ageErr == "" && $genderErr == "" && $msgErr == "" && $checkErr == "") {
					echo "<h4 style='text-align: center; font-size: 40px; font-weight: bolder;'>Thank You !!</h4>";
					echo "<h6 style='color: white; padding: 20px; text-align: center; width: 100%;font-size: 30px;'>";

					$mail->isSMTP();
					$mail->Host = "smtp.gmail.com";
					$mail->SMTPAuth = "true";
					$mail->SMTPSecure = "ssl";
					$mail->Port = 465;

					$mail->Username = "harshkhona082001@gmail.com";
					$mail->Password = "Hello#1234";
					$mail->isHTML(TRUE);
					$mail->Subject = "Thank you for contacting FITMAX";

					$mail->setFrom("harshkhona082001@gmail.com");

					$msg = "<p style='color:white;font-size:20px;background:black;width:100%;'>Information Received: </p><div style='background:black;color:white;width:100%; padding:10px'>Name: <b>" . $name . "</b><br>Mobile: <b>" . $mobile . "</b><br>Age: <b>" . $age . "</b><br>Sex: <b>" . $gender . "</b><br>Message: <b>" . $msg . "</b></div><br><a href='http://localhost/1914031/Fitmax/home.php' style='text-decoration: none;border: 1px solid white;background:black;color: white;font-size:30px;'>Visit</a>";

					$mail->Body = $msg;

					$mail->addAddress("$email");

					if ($mail->send()) {
						echo "Check your email and revert back if details incorrect";
					} else {
						echo "Email not sent";
					}

					$mail->smtpClose();

					echo "<br>Our team will contact you";
					echo "</h6>";
					echo "</div>";
				}
			}
			?>
		</div>
	</div>
	<b></b>
	<script src="contact.js"></script>
</body>
</html>