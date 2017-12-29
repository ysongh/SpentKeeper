<?php 
include("db.php");
session_start();
$currentUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove Purchase</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
    <h1>Remove Purchase</h1>
    <nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
        	        <span class="sr-only">Toggle navigation</span>
        	        <span class="icon-bar"></span>
        	        <span class="icon-bar"></span>
        	        <span class="icon-bar"></span>
        	      </button>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav">
					<li><a href="./home.php">Home</a></li>
                    <li><a href="./add.php">Add Purchase</a></li>
                    <li class="active"><a href="./remove.php">Remove Purchase</a></li>
                    <li><a href="./summary.php">Summary</a></li>
                    <li><a href="./setting.php">Setting</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id = "log">Log in as: <?php echo $currentUser ?></li>
                    <li id = "right"><a href="./logout.php"><button type="button" id = "red">Log Out</button></a></li>
				</ul>
			</div>
		</div>
	</nav>
    
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