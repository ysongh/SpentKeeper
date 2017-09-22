<?php include("action.php"); 

session_start();

$action = new action();
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Sign Up</h1>

<form name = "account" method = "post" action = "signup.php" onsubmit = "return check()">
    Username: <input type = "text" name = "username" required><br>
    Password: <input type = "text" name = "password" required><br>
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
    $action->signup($username, $password);
}
else 
{
    $item = "(Not Found)";
}
?>

<br></br>
<a href="login.php">Login</a><br></br>

<script src = "validation.js"></script>
</body>

</html>