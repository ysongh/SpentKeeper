<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Weclome to Spent Tracker</h1>

<?php include("action.php"); ?>
<?php

session_start();
$_SESSION = array();

$action = new action();

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
// Seaching
echo <<<_END
<form method = "post" action = "login.php">
Enter the Username
    <input type = "text" name = "username">
Enter the Password
    <input type = "text" name = "password">
    <input type = "submit">
</form>
<br></br>
_END;

?>

<a href="signup.php">Sign Up</a><br></br>

</body>

</html>