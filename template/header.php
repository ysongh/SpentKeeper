<?php 
		include("db/db.php");
		session_start();
		$currentUser = $_SESSION['username'];
?>
	
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spent Keeper</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                	<span class="sr-only">Toggle navigation</span>
                  	<span class="icon-bar"></span>
                  	<span class="icon-bar"></span>
                  	<span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./home.php">Home</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              	<ul class="nav navbar-nav">
	                <li><a href="./add.php">Add Purchase</a></li>
	                <li><a href="./remove.php">Remove Purchase</a></li>
	                <li><a href="./summary.php">Summary</a></li>
	                <li><a href="./setting.php">Setting</a></li>
              	</ul>
              	<ul class="nav navbar-nav navbar-right">
                 	<p class="navbar-text">Log in as: <?php echo $currentUser, ", ",  date('F j, Y'); ?></p>
					<a href="./logout.php" class="btn btn-default navbar-btn" role="button">Log Out</a>
              	</ul>
            </div>
        </div>
    </nav>