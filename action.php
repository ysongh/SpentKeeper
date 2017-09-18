<?php
// Connect to Database
$servername = "localhost";
$username = "ysongh";
$password = "";
$dbname = "c9";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

class action
{
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
        
    }
    
    function add($itemId, $itemName, $price, $date)
    {
        global $conn;
        $query = "INSERT INTO Items VALUES('$itemId', '$itemName', '$price', '$date')";
        $result = $conn->query($query);
    }
    
    function edit()
    {
        global $conn;
        $query = "UPDATE Items SET Date = '08/25/2017' WHERE Item_Name = 'Pencil'";
        $result = $conn->query($query);
    }
    
    function delete($itemName)
    {
        global $conn;
        $query = "DELETE FROM Items WHERE Item_Name = '$itemName'";
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
    
    function login($username, $password)
    {
        global $conn;
        $query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0)
        {
            echo "right";
            header("Location: home.php");
        }
        else 
        {
            echo "Invaild Username or Password";
        }
    }
//edit();
//delete();
}
//mysqli_close($conn);

?> 