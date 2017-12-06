<?php 
include("action.php");
session_start();
$currentUser = $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Summary</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <h1>Summary of your Purchase</h1>
    
    <div class = "nav">
        <ul>
            <li><a href="./home.php"><button type="button">Home</button></a></li>
            <li><a href="./add.php"><button type="button">Add Purchase</button></a></li>
            <li><a href="./remove.php"><button type="button">Remove Purchase</button></a></li>
            <li><a href="./setting.php"><button type="button">Setting</button></a></li>
            <li id = "right"><a href="./logout.php"><button type="button" id = "red">Log Out</button></a></li>
            <li id = "log">Log in as: <?php echo $currentUser ?></li>
        </ul>
    </div>
    
    <form method = "post" action = "summary.php">
        Enter the Year: <input type = "text" name = "year" required><br>
        Select the Month: 
        <select name="month">
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
        </select><br>
        <input type = "submit" value="Search">
    </form>
    <br></br>

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
    
</body>
</html>