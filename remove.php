<?php 
include("db.php");
session_start();
$currentUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove Purchase</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Remove Purchase</h1>
    
    <div class = "nav">
        <ul>
            <li><a href="./home.php"><button type="button">Home</button></a></li>
            <li><a href="./add.php"><button type="button">Add Purchase</button></a><li>
            <li><a href="./remove.php"><button type="button">Remove Purchase</button></a></li>
            <li><a href="./summary.php"><button type="button">Summary</button></a></li>
            <li><a href="./setting.php"><button type="button">Setting</button></a></li>
            <li id = "right"><a href="./logout.php"><button type="button" id = "red">Log Out</button></a></li>
            <li id = "log">Log in as: <?php echo $currentUser ?></li>
        </ul>
    </div>
    
    <form method = "post" action = "remove.php">
        <label for="remove">Enter the id of the purchase to remove</label><br>
        <input type = "text" name = "itemID" required><br>
        <input type = "submit" value = "Remove">
    </form>
    <br></br>
    
    <?php
    $action = new action();
    $action->isUser($currentUser);
    $userItem = $action->load($currentUser);
    
    if (isset($_POST['itemID'])) 
    {
        $itemID = $_POST['itemID'];
        $action->delete($itemID, $currentUser);
        echo "Success</br>";
    }
    ?>
    <table>
        <thead>
            <tr> 
                <th>Purchase ID</th>
                <th>Purchase Name</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($userItem as $key => $col) {
                    echo "<tr>";
                    foreach ($col as $row) {
                        echo "<td>$row</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    
</body>

</html>