<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Weclome to Spent Tracker</h1>

<?php include("action.php"); ?>
<?php

$action = new action();
//$action->show();

if (isset($_POST['username']) &&
    isset($_POST['password'])) 
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $action->login($username, $password);
    //echo $username . $password;
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

<a href="add.php">Add Items</a></br>
<a href="remove.php">Remove Items</a><br></br>

</body>



</html>