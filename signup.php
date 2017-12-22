<?php include("db.php"); 

session_start();

$action = new action();
?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Sign Up</h1>
    
    <form name = "account" method = "post" action = "signup.php" onsubmit = "return check()">
        <label for="username">Username: </label>
        <input type = "text" name = "username" required><br>
        <label for="password1">Password: </label>
        <input type = "password" name = "password1" required><br>
        <label for="password2">Re-enter Password: </label>
        <input type = "password" name = "password2" required><br>
        <label for="email">Email: </label>
        <input type = "text" name = "email" required><br>
        <input type = "submit" value="Enter">
    </form>
    
    <p id = "error"></p>
    
    <?php
    if (isset($_POST['username']) &&
        isset($_POST['password1']) &&
        isset($_POST['password2']) &&
        isset($_POST['email'])) 
    {
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $email = $_POST['email'];
        $_SESSION["username"] = $username;
        $action->signup($username, $password1, $email);
    }
    ?>
    
    <br></br>
    <a href="./login.php"><button type="button">Login</a><br></button></br>
    
    <script src = "validation.js"></script>
</body>

</html>