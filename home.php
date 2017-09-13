<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Weclome to your Item List</h1>

<?php include("Tracker.php"); ?>
<?php
// Connect to Database
$servername = "localhost";
$username = "ysongh";
$password = "";
$dbname = "c9";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$action = new action();

$action->show();

if (isset($_POST['date'])) 
{
    $date = $_POST['date'];
    $action->search($date);
}
else 
{
    $item = "(Not Found)";
}

// Seaching
echo <<<_END
Searching for : $date<br>
<form method = "post" action = "home.php">
Enter the Date
    <input type = "text" name = "date">
    <input type = "submit">
</form>
<br></br>
_END;

mysqli_close($conn);

?>

</body>



</html>