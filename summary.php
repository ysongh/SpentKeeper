<?php 
include("db.php");
session_start();
$currentUser = $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Summary</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

    <h1>Summary of your Purchase</h1>
    
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
                    <li class="active"><a href="./summary.php">Summary</a></li>
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
        <form class="form-inline" method = "post" action = "summary.php">
            <div class="form-group">
                <label for="year">Enter the Year:</label>
                <input type = "text" class="form-control" name = "year" maxlength="4" required><br>
            </div>
            <div class="form-group">
                <label for="month">Select the Month:</label>
                <select class="form-control" name="month">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <input type = "submit" class="btn btn-default" value="Search">
        </form>
    
        <?php
        $action = new action();
        $action->isUser($currentUser);
        
        if (isset($_POST['year']) &&
            isset($_POST['month'])) 
        {
            $year = $_POST['year'];
            $month = $_POST['month'];
            $date = $year . "-" . $month;
            $action->search($date, $currentUser);
        }
        ?>
    </div>
    
</body>
</html>