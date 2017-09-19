<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Adding Items</h1>

<?php include("action.php"); ?>
<?php

session_start();
$currentUser = $_SESSION['username'];

$action = new action();

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

// Seaching
echo <<<_END
Enter the item information<br>
<form method = "post" action = "add.php">
Item Name
    <input type = "text" name = "itemName">
Price
    <input type = "text" name = "price">
    <input type = "submit">
</form>
<br></br>
_END;

?>

<a href="home.php">Home</a></br>
<a href="remove.php">Remove Items</a><br></br>

</body>

</html>