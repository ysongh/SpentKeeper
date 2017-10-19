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

    <h1>Weclome to your Purchase List</h1>
    
    <div class = "nav">
        <ul>
            <li><a href="./add.php"><button type="button">Add Purchase</button></a></li>
            <li><a href="./remove.php"><button type="button">Remove Purchase</button></a></li>
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
    ?>
    
    <tfoot>
        <tr>
            <td colspan='2'>Total</td>
            <td colspan='2'><?php $action->total($currentUser); ?></td>
        </tr>
    </tfoot>
    
</body>
</html>