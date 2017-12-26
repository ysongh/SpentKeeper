<?php 
include("db.php");
session_start();
$currentUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Purchase</title>
    <link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
    <h1>Adding Purchase</h1>
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
                    <li class="active"><a href="./add.php">Add Purchase</a></li>
                    <li><a href="./remove.php">Remove Purchase</a></li>
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
        <form name = "add" class="form-inline" method = "post" action = "add.php" onsubmit = "return isNumber()">
            <div class="form-group">
                <label for="purchaseName">Purchase Name:</label>
                <input type = "text" class="form-control" name = "itemName" maxlength="20" required>
                <label for="price">Price:</label>
                <input type = "text" class="form-control" name = "price" required>
                <input type = "submit" class="btn btn-default" value = "Add">
            </div>
            
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
    </div>
    <script src = "validation.js"></script>
</body>

</html>