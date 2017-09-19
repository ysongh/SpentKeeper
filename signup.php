<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Sign Up</h1>

<?php include("action.php"); ?>
<?php

session_start();

$action = new action();

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
// Seaching
echo <<<_END
<form method = "post" action = "signup.php">
Enter the Username
    <input type = "text" name = "username">
Enter the Password
    <input type = "text" name = "password">
    <input type = "submit">
</form>
<br></br>
_END;

?>

<a href="login.php">Login</a><br></br>

</body>



</html>