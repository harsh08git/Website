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

    $emailErr = $passwordErr  = $msg = "";
    $email =  $password = "";

    if(isset($_POST['submit'])){

        if (empty($_POST["Email"])) {  
            $emailErr = "Email is required";  
        } 

        if (empty($_POST['Password'])){
            $passwordErr = "Password is needed";
        }

        $email = $_POST['Email'];
        $password = $_POST['Password'];

        $sql = "SELECT password FROM users WHERE email = '$email' ";
        $result = $conn->query($sql);

        if($result->num_rows > 0){

            $row = $result->fetch_assoc();
            
            if ($password == $row['password']){
                $_SESSION['UserData']['email'] = $email;
                $_SESSION['UserData']['password'] = $password;
                header("location:home.php");
                exit;
            }
            else {
                if($emailErr == "" && $passwordErr == "")
                {
                    $msg="<span style='color:red'>Invalid Login Credentials</span>";                    
                }
                else{
                    $msg = "";
                }
            }

        }
        
        else{
            if($emailErr == "" && $passwordErr == "")
            {
                $msg="<span style='color:red'>Invalid Login Credentials</span>";                    
            }
            else{
                $msg = "";
            }        
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="includes/signup.css">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body style="background-image: url('images/bg2.jpg'); background-repeat:no-repeat ; background-size:cover; ">
    <?php 
    
        if($_SESSION['UserData']['email']){
            include 'nav_authenticated.php';
        }
        else{
            include 'nav_unauthenticated.php';
        }    

    ?>


    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="title-a" style="text-align: center;">LOG IN</h1>

        <label for="email">Email</label>
        <div class="input-group">
            <input type="text" name="Email" id="email" placeholder="Email Address" class="form-control" placeholder="virat@g.com">
        </div>
        <div class="error"><?php echo $emailErr ; ?></div>
        
        <label for="password">Password</label>
        <div class="input-group">
            <input type="password" class="form-control" placeholder="Virat#12" name="Password" id="password">
        </div>
        <div class="error"><?php echo $passwordErr ; ?></div>

        <?php 
        if(isset($msg)){
            echo $msg;
        }
        ?>

        <input type="submit" name='submit' value="Log In" class="btn btn-dark" style="margin: 10px;">
        <input type="reset" value="RESET" class="btn btn-dark"><br>
        <label><a href="signup.php">Click Here</a> to create new account</label>


    </form>


</body>
</html>

