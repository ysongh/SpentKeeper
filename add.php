<?php 
include("action.php");
session_start();
$currentUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Purchase</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    
    <h1>Adding Purchase</h1>
    
    <div class = "nav">
        <ul>
            <li><a href="./home.php"><button type="button">Home</button></a></li>
            <li><a href="./remove.php"><button type="button">Remove Purchase</button></a><li>
            <li><a href="./summary.php"><button type="button">Summary</button></a></li>
            <li id = "right"><a href="./logout.php"><button type="button" id = "red">Log Out</button></a></li>
            <li id = "log">Log in as: <?php echo $currentUser ?></li>
        </ul>
    </div>
    
    <form name = "add" method = "post" action = "add.php" onsubmit = "return isNumber()">
        Purchase Name: <input type = "text" name = "itemName" maxlength="20" required>
        Price: <input type = "text" name = "price" required><br>
        <input type = "submit" value = "Add">
    </form>
    
    <p id = "error"></p>
    
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
    ?>
    <script src = "validation.js"></script>
</body>

</html>