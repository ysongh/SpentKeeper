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

<form method = "post" action = "signup.php">
    Username: <input type = "text" name = "username"><br>
    Password: <input type = "text" name = "password"><br>
    <input type = "submit" value="Enter">
</form>

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

</body>



</html>