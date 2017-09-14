<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Remove Item</h1>

<?php include("action.php"); ?>
<?php

$action = new action();
$action->show();

if (isset($_POST['itemName'])) 
{
    $itemName = $_POST['itemName'];
    $action->delete($itemName);
    echo "Success</br>";
}
else 
{
    $itemName = "(Not Found)";
}
// Seaching
echo <<<_END
Removeing : $itemName<br>
<form method = "post" action = "remove.php">
Enter the name of the item to remove
    <input type = "text" name = "itemName">
    <input type = "submit">
</form>
<br></br>
_END;

?>

<a href="home.php">Home</a></br>
<a href="add.php">Add Items</a><br></br>

</body>



</html>