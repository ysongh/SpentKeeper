<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Adding Items</h1>

<?php include("action.php"); ?>
<?php

$action = new action();
$action->show();

if  (isset($_POST['itemID']) &&
    isset($_POST['itemName']) &&
    isset($_POST['price']) &&
    isset($_POST['date'])) 
{
    $itemID = $_POST['itemID'];
    $itemName= $_POST['itemName'];
    $price= $_POST['price'];
    $date= $_POST['date'];
    $action->add($itemID, $itemName, $price, $date);
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
Item ID
    <input type = "text" name = "itemID">
Item Name
    <input type = "text" name = "itemName">
Price
    <input type = "text" name = "price">
Date
    <input type = "text" name = "date">
    <input type = "submit">
</form>
<br></br>
_END;

?>

<a href="home.php">Home</a></br>
<a href="remove.php">Remove Items</a><br></br>

</body>

</html>