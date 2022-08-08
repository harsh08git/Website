<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "fitmax";

//Connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

//Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
error_reporting(0);

if (!($_SESSION['UserData']['email'])) {
    header("location:login.php");
}

$member = isset($_GET['member']) ? $_GET['member'] : die();
if ($member == "mini") {
    $amount = 500;
} else if ($member == "super") {
    $amount = 2000;
} else {
    $amount = 5000;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="includes/payment.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<style>
    .error{
        color: red;
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
    $fnameErr = $lnameErr = $numberErr = $dateErr = $cvvErr  = "";
    $fname = $lname  = $number = $date = $cvv = "";

    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['FName'])) {
            $fnameErr = "First Name is required";
        } else {
            $fname = input_data($_POST['FName']);
            //Name contains only alphabets and white space
            if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
                $fnameErr = "Only alphabets and white space are allowed";
            }
        }

        if (empty($_POST['LName'])) {
            $lnameErr = "Last Name is required";
        } else {
            $lname = input_data($_POST['LName']);
            //Name contains only alphabets and white space
            if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
                $lnameErr = "Only alphabets and white space are allowed";
            }
        }

        if (empty($_POST["Number"])) {
            $numberErr = "Card number is required";
        } else {
            $number = input_data($_POST["Number"]);
            //Mobile Format validation
            if (!preg_match("/^[0-9]*$/", $number)) {
                $numberErr = "Invalid Card Number";
            }
            if (strlen($number) != 12) {
                $mobileErr = "12 Digit Card Number required";
            }
        }

        if (empty($_POST['expiry'])) {
            $dateErr = "Expiry Date is required";
        } else {
            $date = input_data($_POST["expiry"]);
        }

        if (empty($_POST["Cvv"])) {
            $cvvErr = "CVV number is required";
        } else {
            $cvv = input_data($_POST["Cvv"]);
            //Mobile Format validation
            if (!preg_match("/^[0-9]*$/", $cvv)) {
                $cvvErr = "Invalid Cvv";
            }
            if (strlen($cvv) != 3) {
                $cvvErr = "3 Digit Cvv required";
            }
        }

    }

    ?>

    <form method="POST" action="<?php echo('http://localhost/1914031/Fitmax/payment.php?member=' .$member )?>">
        <div class=" form-container">
        <div class="personal-information">
            <h1>Payment Information</h1>
        </div>

        <input id="column-left" type="text" name="FName" placeholder="First Name"><br>
        <div class="error"><?php echo $fnameErr ; ?></div><br>

        <input id="column-right" type="text" name="LName" placeholder="Surname"><br>
        <div class="error"><?php echo $lnameErr ; ?></div><br>
        
        <input type="text" name="Number" placeholder="Card Number">
        <div class="error"><?php echo $numberErr ; ?></div>
        
        <input id="column-left" type="Date" name="expiry" placeholder="MM / YY">
        <div class="error"><?php echo $dateErr ; ?></div>
        
        <input id="column-right" type="text" name="Cvv" placeholder="CVV"><br>
        <div class="error"><?php echo $cvvErr ; ?></div><br>
        
        <input type="text" name="coupon" maxlength="45" placeholder="Coupon Code" id="coupon" onchange="hcon()">
        <label>Amount</label>
        <div class="input-group mb-3">
            <?php
            echo "<input type='number' class='form-control' id='amount' name='Amount' readonly value=" . $amount . ">";
            ?>
            <span class="input-group-text">Rs</span>
        </div>

        <input type="submit" value="Submit" />
        </div>
    </form>

    <script>
        function hcon() {
            let code = "HARSHANG";
            let coupon = document.getElementById("coupon").value;
            let amount = parseInt(document.getElementById("amount").value);

            if (code = console) {
                document.getElementById("amount").value = amount - ((40 * amount) / 100);
            }
        }
    </script>

</body>
<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($fnameErr == "" && $lnameErr == "" && $numberErr == "" && $dateErr == "" && $cvvErr == ""){
            
            $fname  = $_POST['FName'];
            $lname =  $_POST['LName'];
            $number =  $_POST['Number'];
            $date =  $_POST['expiry'];
            $cvv =  $_POST['Cvv'];
            $my_amount =  $_POST['Amount'];

            $sql = "SELECT * FROM account WHERE number = '$number' AND cvv = '$cvv' AND expiry='$date'";
            $result = $conn->query($sql);

            if($result>0){
                $row = $result->fetch_assoc();
                $new_amount = $row['amount']- $my_amount;
                
                if($new_amount>0){
                    $sql = "UPDATE account SET amount='$new_amount' WHERE  number = '$number' AND cvv = '$cvv' AND expiry='$date' ";
                    $result = $conn->query($sql);
                    header("location:success.php");
                }
                else{
                    header("location:fail.php");
                }
            }
            else{
                header("location:fail.php");
            }
        }
    }

?>
</html>