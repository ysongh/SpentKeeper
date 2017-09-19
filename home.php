<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Weclome to your Item List</h1>

<?php include("action.php"); ?>
<?php

session_start();
$currentUser = $_SESSION['username'];

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
// Seaching
echo <<<_END
Searching for : $date<br>
<form method = "post" action = "home.php">
Enter the Date
    <input type = "text" name = "date">
    <input type = "submit">
</form>
<br></br>
_END;

echo "Log in as : " . $currentUser . "<br></br>";

?>

<a href="add.php">Add Items</a></br>
<a href="remove.php">Remove Items</a></br>
<a href="login.php">Log Out</a><br></br>

</body>



</html>