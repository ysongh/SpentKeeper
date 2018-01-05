<?php 
include("db.php");

session_start();
$_SESSION = array();

$action = new action();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
    <div class = "container">
        <h1>Login</h1>
        <form name = "account" class="form-horizontal" method = "post" action = "login.php">
            <div class = "form-group">
                <label for="username">Username: </label>
                <input type = "text" name = "username" class="form-control" required>
            </div>
            <div class = "form-group">
                <label for="password">Password: </label>
                <input type = "password" name = "password" class="form-control" required>
            </div>
            <input type = "submit" class="btn btn-default" value="Enter">
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
        <a href="./signup.php"><button type="button">Sign Up</button></a>
    </div>
    
    <script src = "js/validation.js"></script>
</body>

</html>