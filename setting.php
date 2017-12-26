<?php 
include("db.php");
session_start();
$currentUser = $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Setting</title>
    <link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>

    <h1>Account Setting</h1>
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
                    <li><a href="./remove.php">Remove Purchase</a></li>
                    <li><a href="./summary.php">Summary</a></li>
                    <li class="active"><a href="./setting.php">Setting</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id = "log">Log in as: <?php echo $currentUser ?></li>
                    <li id = "right"><a href="./logout.php"><button type="button" id = "red">Log Out</button></a></li>
				</ul>
			</div>
		</div>
	</nav>
    
    <div class = "container">
        <?php
        $action = new action();
        $action->isUser($currentUser);
        $userInfo = $action->loadUser($currentUser);
        ?>
        
        <p id = "userInfo">Username : <?php echo $userInfo[1] ?></p>
        <p id = "userInfo">Email : <?php echo $userInfo[3] ?></p>
    </div>
</body>
</html>