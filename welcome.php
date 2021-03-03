<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(isset($_GET['logout'])){
    $_SESSION = array();
    
    // Destroy the session.
    session_destroy();
    
    // Redirect to Signin form
    
    header("location: index.php?signin");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">  
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo $_SESSION["username"]; ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="welcome.php?logout" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>