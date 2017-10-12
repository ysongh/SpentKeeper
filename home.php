<?php 
include("action.php");
session_start();
$currentUser = $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Weclome</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <h1>Weclome to your Item List</h1>
    
    <div class = "nav">
        <ul>
            <li><a href="./add.php"><button type="button">Add Items</button></a></li>
            <li><a href="./remove.php"><button type="button">Remove Items</button></a></li>
            <li id = "right"><a href="./logout.php"><button type="button" id = "red">Log Out</button></a></li>
            <li id = "log">Log in as: <?php echo $currentUser ?></li>
        </ul>
    </div>
    
    <form method = "post" action = "home.php">
        Enter the Date: <input type = "text" name = "date" required>
        <input type = "submit" value="Enter">
    </form>
    <br></br>

    <?php
    $action = new action();
    $action->isUser($currentUser);
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
    
    $action->total($currentUser);
    ?>
    
</body>
</html>