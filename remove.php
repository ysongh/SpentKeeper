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

<h1>Remove Item</h1>

<form method = "post" action = "remove.php">
Enter the name of the item to remove<br>
    <input type = "text" name = "itemName" required><br>
    <input type = "submit" value = "Remove">
</form>
<br></br>

<?php
$action = new action();
$action->show($currentUser);

if (isset($_POST['itemName'])) 
{
    $itemName = $_POST['itemName'];
    $action->delete($itemName, $currentUser);
    echo "Success</br>";
}
else 
{
    $itemName = "(Not Found)";
}
?>

<a href="home.php">Home</a></br>
<a href="add.php">Add Items</a><br></br>

</body>



</html>