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

show();

// Seaching
echo <<<_END
Searching for : $date<br>
<form method = "post" action = "Tracker.php">
Enter the Date
    <input type = "text" name = "date">
    <input type = "submit">
</form>
<br></br>
_END;


// Display table
function show()
{
    global $conn;
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
    
    if (isset($_POST['date'])) {
        $date = $_POST['date'];
        search($date);
    }
    else {
        $item = "(Not Found)";
    }
}

function add($ItemId, $ItemName, $Price, $Date)
{
    global $conn;
    $query = "INSERT INTO Items VALUES($ItemId, $ItemName, $Price, $Date)";
    $result = $conn->query($query);
}

function edit()
{
    global $conn;
    $query = "UPDATE Items SET Date = '08/25/2017' WHERE Item_Name = 'Pencil'";
    $result = $conn->query($query);
}

function delete()
{
    global $conn;
    $query = "DELETE FROM Items WHERE Item_Name = 'Notebook'";
    $result = $conn->query($query);
}

function search($date)
{
    global $conn;
    $query = "SELECT * FROM Items WHERE Date = '$date'";
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
}


//add();
//edit();
//delete();

mysqli_close($conn);
?> 

</body>

<link rel="php" href="ListOfItems.php">

</html>