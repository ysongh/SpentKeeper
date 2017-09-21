<?php 
include("action.php");
session_start();
$currentUser = $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Weclome to your Item List</h1>

<form method = "post" action = "home.php">
    Enter the Date: <input type = "text" name = "date">
    <input type = "submit" value="Enter">
</form>
<br></br>

<?php
$action = new action();
$action->show($currentUser);

if (isset($_POST['date'])) 
{
    $date = $_POST['date'];
    $action->search($date);
}
else 
{
    $item = "(Not Found)";
}

echo "Log in as : " . $currentUser . "<br></br>";
?>

<a href="add.php">Add Items</a></br>
<a href="remove.php">Remove Items</a></br>
<a href="login.php">Log Out</a><br></br>

</body>

</html>