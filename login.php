<?php 
include("action.php");

session_start();
$_SESSION = array();

$action = new action();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Login</h1>
    
    <form name = "account" method = "post" action = "login.php">
        Username: <input type = "text" name = "username" required><br>
        Password: <input type = "password" name = "password" required><br>
        <input type = "submit" value="Enter">
    </form>
    
    <p id = "error"></p>
    
    <?php
    if (isset($_POST['username']) &&
        isset($_POST['password'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION["username"] = $username;
        $action->login($username, $password);
    }
    else 
    {
        $item = "(Not Found)";
    }
    ?>
    <br></br>
    <a href="./signup.php"><button type="button">Sign Up</button></a>
    
    <script src = "validation.js"></script>
</body>

</html>