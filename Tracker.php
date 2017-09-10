<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Weclome to your Item List</h1>

<?php
// Connect to Database
$servername = "localhost";
$username = "ysongh";
$password = "";
$dbname = "c9";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Display table
$query = "SELECT * FROM Items";
$result = $conn->query($query);

$rows = $result ->num_rows;

echo "<table><tr> <th>Item ID</th> <th>Item Name</th>  <th>Price</th> <th>Date</th>";

for ($j = 0; $j < $rows; ++$j)
{
    $result->data_seek($j);
    $row =$result->fetch_array(MYSQLI_NUM);
    
    echo "<tr>";
    for ($k = 0; $k < 4; ++$k) 
    {   
        echo "<td>$row[$k]</td>";
    }
    
    echo "<tr>";

}

if (isset($_POST['name'])) $name = $_POST['name'];
else $name = "(Not entered)";

echo <<<_END
Your Name is: $name<br>
<form method = "post" action = "Tracker.php">
What is your name?
    <input type = "text" name = "name">
    <input type = "submit">
</form>
_END;

function add()
{
    global $conn;
    $query = "INSERT INTO Items VALUES(3, 'Pizza', 5.75, '09/08/2017')";
    $result = $conn->query($query);
}

function edit()
{
    global $conn;
    $query = "UPDATE Items SET Date = '08/25/2107' WHERE Item_Name = 'Pencil'";
    $result = $conn->query($query);
}

function delete()
{
    global $conn;
    $query = "DELETE FROM Items WHERE Item_Name = 'Notebook'";
    $result = $conn->query($query);
}

//add();
//edit();
//delete();

mysqli_close($conn);
?> 

</body>

<link rel="php" href="ListOfItems.php">

</html>