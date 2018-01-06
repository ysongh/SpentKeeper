<?php include("db/db.php"); 

session_start();

$action = new action();
?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
    <div class = "container">
        <h1>Sign Up</h1>
        
        <form name = "account" method = "post" action = "signup.php" onsubmit = "return check()">
            <div class = "form-group">
                <label for="username">Username: </label>
                <input type = "text" name = "username" class="form-control" required>
            </div>
            <div class = "form-group">
                <label for="password1">Password: </label>
                <input type = "password" name = "password1" class="form-control" required>
            </div>
            <div class = "form-group">
                <label for="password2">Re-enter Password: </label>
                <input type = "password" name = "password2" class="form-control" required>
            </div>
              <div class = "form-group">
                <label for="email">Email: </label>
                <input type = "text" name = "email"   class="form-control" required>
            </div>
            <input type = "submit" class="btn btn-default" value="Enter">
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
        <a href="./login.php"><button type="button">Login</a><br></button></br>
    </div>
    
    <script src = "js/validation.js"></script>
</body>

</html>