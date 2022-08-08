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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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


<?php   
        $fnameErr = $lnameErr = $emailErr = $mobileErr = $genderErr = $dateErr = $passwordErr  = "";
        $fname = $lname = $email = $mobile = $gender = $date = $password = "";

        function input_data($data) {  
            $data = trim($data);  
            $data = stripslashes($data);  
            $data = htmlspecialchars($data);  
            return $data;  
        }            

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if (empty($_POST['FName'])){
                $fnameErr = "First Name is required";
            }
            else{
                $fname = input_data($_POST['FName']);
                //Name contains only alphabets and white space
                if(!preg_match("/^[a-zA-Z ]*$/",$fname)) {  
                    $fnameErr = "Only alphabets and white space are allowed";  
                }  
            }

            if (empty($_POST['LName'])){
                $lnameErr = "Last Name is required";
            }
            else{
                $lname = input_data($_POST['LName']);
                //Name contains only alphabets and white space
                if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {  
                    $lnameErr = "Only alphabets and white space are allowed";  
                }  
            }

            if (empty($_POST["Email"])) {  
                $emailErr = "Email is required";  
            } 
            else {  
                $email = input_data($_POST["Email"]);  
                //Email format validation  
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){  
                    $emailErr = "Invalid email format";  
                }  
            }

            if(empty($_POST["Number"])){
                $mobileErr = "Mobile number is required";
            }
            else{
                $mobile = input_data($_POST["Number"]);
                //Mobile Format validation
                if (!preg_match ("/^[0-9]*$/", $mobile)){  
                    $mobileErr = "Invalid Mobile Number";  
                }  
                if (strlen($mobile)!=10){
                    $mobileErr = "10 Digit Number required";
                }
            }

            if (isset($_POST["Sex"]) && $_POST["Sex"]!=""){
                $gender = input_data($_POST["Sex"]);
            }
            else{
                $genderErr = "Please select your sex";
            }

            if(empty($_POST['DOB'])){
                $dateErr = "Date of Birth is required";
            }
            else{
                $date = input_data($_POST["DOB"]); 
            }

            if (empty($_POST['Password'])){
                $passwordErr = "Password is needed";
            }
            else{
                $password = input_data($_POST['Password']);
                //Password should contains one lower, one upper alphabet, one number and length between 8 and 20
                if( strlen($password ) < 8 ) {
                    $passwordErr = "Password too short!";
                }
                else if( strlen($password ) > 20 ) {
                    $passwordErr = "Password too long!";
                }
                else if( !preg_match("#[0-9]+#", $password ) ) {
                    $passwordErr = "Password must include at least one number!";
                }
                else if( !preg_match("#[a-z]+#", $password ) ) {
                    $passwordErr = "Password must include at least one lowercase letter!";
                }
                else if( !preg_match("#[A-Z]+#", $password ) ) {
                    $passwordErr = "Password must include at least one uppercase letter!";
                }
                else if( !preg_match("#[\W]+#", $password ) ) {
                    $passwordErr = "Password must include at least one symbol!";
                }
            }


    }
?>

<?php 
    if(isset($_POST['submit'])){
        if ($fnameErr=="" && $lnameErr=="" && $emailErr=="" && $mobileErr=="" && $dateErr=="" && $genderErr=="" && $passwordErr==""){
            $fname = $_POST['FName'];
            $lname = $_POST['LName'];
            $email = $_POST['Email'];
            $phone = $_POST['Number'];
            $sex = $_POST['Sex'];
            $dob = $_POST['DOB'];
            $password = $_POST['Password'];  

            setcookie("User",$_POST['FName'],time()+3600);

            $sql = "INSERT INTO users(fname,lname,email,mobile,gender,dob,password) VALUES ('$fname','$lname','$email','$phone','$sex','$dob','$password')";
        
            if(mysqli_query($conn , $sql)){
                header("location:login.php");
            }
            else{
                header("location:signup.php");
            }
    
        }
    }
?>


    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="title-a" style="text-align: center;">SIGN UP</h1>

        <label for="fname">First Name</label>
        <div class="input-group ">
            <input type="text" class="form-control" placeholder="Virat" name="FName" id="fname">
        </div>
        <div class="error"><?php echo $fnameErr ; ?></div>

        <label for="lname">Last Name</label>
        <div class="input-group ">
            <input type="text" class="form-control" placeholder="Kohli" name="LName" id="lname">
        </div>
        <div class="error"><?php echo $lnameErr ; ?></div>

        <label for="email">Email</label>
        <div class="input-group">
            <input type="text" name="Email" id="email" placeholder="Email Address" class="form-control" placeholder="virat@g.com">
        </div>
        <div class="error"><?php echo $emailErr ; ?></div>

        <label for="phone">Phone</label>
        <div class="input-group">
            <input type="text" name="Number" id="phone" placeholder="9192939495" class="form-control">
        </div>
        <div class="error"><?php echo $mobileErr ; ?></div>

        <label>Sex</label>
        <input type="radio" name="Sex" id="male" value="Male">
        <label for="male">Male</label>
        <input type="radio" name="Sex" id="female" value="Female">
        <label for="female">Female</label>
        <div class="error"><?php echo $genderErr ; ?></div>

        <label for="date">Date of Birth</label>
        <div class="input-group">
            <input type="date" class="form-control" name="DOB" placeholder="dd-mm-yyyy" id="date">
        </div>
        <div class="error"><?php echo $dateErr ; ?></div>
        
        <label for="password">Password</label>
        <div class="input-group">
            <input type="password" class="form-control" placeholder="Virat#12" name="Password" id="password">
        </div>
        <div class="error"><?php echo $passwordErr ; ?></div>

        <input type="submit" name='submit' value="Submit" class="btn btn-dark" style="margin: 10px;">
        <input type="reset" value="RESET" class="btn btn-dark">
    </form>

</body>
</html>


