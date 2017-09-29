<?php include("action.php"); 

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
    Username: <input type = "text" name = "username" required><br>
    Password: <input type = "text" name = "password1" required><br>
    Re-enter Password: <input type = "text" name = "password2" required><br>
    <input type = "submit" value="Enter">
</form>

<p id = "error"></p>

<?php
if (isset($_POST['username']) &&
    isset($_POST['password1']) &&
    isset($_POST['password2'])) 
{
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $_SESSION["username"] = $username;
    $action->signup($username, $password1);
}
else 
{
    $item = "(Not Found)";
}
?>

<br></br>
<a href="login.php"><button type="button">Login</a><br></button></br>

<script src = "validation.js"></script>
</body>

</html>