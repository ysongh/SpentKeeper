<?php
// Connect to Database
$servername = "localhost";
$username = "ysongh";
$password = "";
$dbname = "c9";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
 if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
}

class action
{
    function show($currentUser)
    {
        global $conn;
        $query = "SELECT id, name, price, date FROM purchases WHERE username = '$currentUser'";
        $result = $conn->query($query);
        
        $rows = $result ->num_rows;
        
        echo "<table><tr> <th>Purchase ID</th> <th>Purchase Name</th>  <th>Price</th> <th>Date</th>";
        
        for ($j = 0; $j < $rows; ++$j)
        {
            $result->data_seek($j);
            $row =$result->fetch_array(MYSQLI_NUM);
            
            echo "<tr>";
            for ($k = 0; $k < 4; ++$k) 
            {   
                echo "<td>$row[$k]</td>";
               
            }
            echo "</tr>";
            
        }
    }
   
    function add($itemName, $price, $currentUser)
    {
        global $conn;
        $query = "INSERT INTO purchases (name, price, date, username) VALUES('$itemName', '$price', now(), '$currentUser')";
        $result = $conn->query($query);
    }
    
    function edit()
    {
        global $conn;
        $query = "UPDATE Items SET Date = '08/25/2017' WHERE Item_Name = 'Pencil'";
        $result = $conn->query($query);
    }
    
    function delete($itemID, $currentUser)
    {
        global $conn;
        $query = "DELETE FROM purchases WHERE id = '$itemID' AND username = '$currentUser'";
        $result = $conn->query($query);
    }
    
    function search($date)
    {
        global $conn;
        $query = "SELECT * FROM purchases WHERE Date LIKE '$date%'";
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
            header("Location: home.php");
        }
        else 
        {
            echo "Invaild Username or Password";
        }
    }
    
    function signup($username, $password)
    {
        global $conn;
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        echo $username . $password;
        $result = $conn->query($query);
        header("Location: home.php");
    }
    
    function isUser($currentUser)
    {
        if ($currentUser == ""){
            header("Location: index.php");
        }
    }
    
    function close(){
        global $conn;
        mysqli_close($conn);
    }
    
    function total($currentUser){
        global $conn;
        $query = "SELECT SUM(price) AS value_sum FROM purchases WHERE username = '$currentUser'";
        $result = $conn->query($query);
        $row = $result->fetch_array(MYSQLI_NUM); 
        echo "$" . number_format($row[0] ,2) . "<br />";
    }
    
//edit();
}

?> 