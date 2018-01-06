<!DOCTYPE html>
<html>
<head>
    <title>Remove Purchase</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Remove Purchase</h1>
    
    <?php 
        include("db/db.php");
        session_start();
        $currentUser = $_SESSION['username'];
        include('header.php');
    ?>
    
    <div class = "container">
        <form class="form-inline" method = "post" action = "remove.php">
            <div class="form-group">
                <label for="remove">Enter the id of the purchase to remove</label>
                <input type = "text" class="form-control" name = "itemID" required>
            </div>
            <input type = "submit" class="btn btn-default" value = "Remove">
        </form>
        
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
        <table class="table table-hover">
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
    </div>
    
</body>

</html>