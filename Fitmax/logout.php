<?php
    session_start();
    error_reporting(0);

?>
<!DOCTYPE html>
<html>
<body>

<?php
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    header("location:home.php");
    exit;
?>

</body>
</html>