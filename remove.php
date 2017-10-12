<?php 
include("action.php");
session_start();
$currentUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove Item</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Remove Item</h1>
    
    <div class = "nav">
        <ul>
            <li><a href="./home.php"><button type="button">Home</button></a></li>
            <li><a href="./add.php"><button type="button">Add Items</button></a><li>
            <li id = "right"><a href="./logout.php"><button type="button" id = "red">Log Out</button></a></li>
        </ul>
    </div>
    
    <form method = "post" action = "remove.php">
    Enter the id of the item to remove<br>
        <input type = "text" name = "itemID" required><br>
        <input type = "submit" value = "Remove">
    </form>
    <br></br>
    
    <?php
    $action = new action();
    $action->isUser($currentUser);
    $action->show($currentUser);
    
    if (isset($_POST['itemID'])) 
    {
        $itemID = $_POST['itemID'];
        $action->delete($itemID, $currentUser);
        echo "Success</br>";
    }
    else 
    {
        $itemID = "(Not Found)";
    }
    ?>
</body>

</html>