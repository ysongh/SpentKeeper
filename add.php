<?php 
include("action.php");
session_start();
$currentUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Adding Items</h1>

<form method = "post" action = "add.php">
    Item Name: <input type = "text" name = "itemName" required>
    Price: <input type = "text" name = "price" required><br>
    <input type = "submit" value = "Add">
</form>
<br></br>

<?php
$action = new action();
$action->isUser($currentUser);

if  (isset($_POST['itemName']) &&
    isset($_POST['price'])) 
{
    $itemName= $_POST['itemName'];
    $price= $_POST['price'];
    $action->add($itemName, $price, $currentUser);
    echo "Success</br>";
}
else 
{
    $item = "(Not Found)";
}
?>

<a href="home.php"><button type="button">Home</button></a></br>
<a href="remove.php"><button type="button">Remove Items</button></a><br></br>

</body>

</html>