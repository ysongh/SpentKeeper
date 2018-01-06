<!DOCTYPE html>
<html>
<head>
    <title>Spent Keeper</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
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
                    <li><a href="./setting.php">Setting</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text">Log in as: <?php echo $currentUser ?></p>
					<a href="./logout.php" class="btn btn-default btn-lg" role="button">Log Out</a>
				</ul>
			</div>
		</div>
	</nav>