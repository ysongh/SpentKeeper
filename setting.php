<?php 
include("action.php");
session_start();
$currentUser = $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Setting</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <h1>Account Setting</h1>
    
    <div class = "nav">
        <ul>
            <li><a href="./home.php"><button type="button">Home</button></a></li>
            <li><a href="./add.php"><button type="button">Add Purchase</button></a></li>
            <li><a href="./remove.php"><button type="button">Remove Purchase</button></a></li>
            <li><a href="./summary.php"><button type="button">Summary</button></a></li>
            <li id = "right"><a href="./logout.php"><button type="button" id = "red">Log Out</button></a></li>
            <li id = "log">Log in as: <?php echo $currentUser ?></li>
        </ul>
    </div>
    
    <?php
    $action = new action();
    $action->isUser($currentUser);
    $userInfo = $action->loadUser($currentUser);
    
    ?>
    
    <p id = "userInfo">Username : <?php echo $userInfo[1] ?></p>
    <p id = "userInfo">Email : <?php echo $userInfo[3] ?></p>
    
    
</body>
</html>