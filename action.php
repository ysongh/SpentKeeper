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

$userItem = array();
$userInfo = array();

class action
{
    function load($currentUser)
    {
        global $conn;
        $query = "SELECT id, name, price, date FROM purchases WHERE username = '$currentUser'";
        $result = $conn->query($query);
        
        $rows = $result ->num_rows;
        
        for ($j = 0; $j < $rows; ++$j)
        {
            $result->data_seek($j);
            $row =$result->fetch_array(MYSQLI_NUM);
            
            for ($k = 0; $k < 4; ++$k) 
            {   
                $userItem[$j][$k] = "$row[$k]";
            }
            
        }
        return $userItem;
    }
   
    function add($itemName, $price, $currentUser)
    {
        global $conn;
        $query = "INSERT INTO purchases (name, price, date, username) VALUES('$itemName', '$price', now(), '$currentUser')";
        $result = $conn->query($query);
    }
    
    function delete($itemID, $currentUser)
    {
        global $conn;
        $query = "DELETE FROM purchases WHERE id = '$itemID' AND username = '$currentUser'";
        $result = $conn->query($query);
    }
    
    function search($date, $currentUser)
    {
        global $conn;
        $total = 0;
        $query = "SELECT * FROM purchases WHERE Date LIKE '$date%' AND username = '$currentUser'";
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
                if ($k == 2){
                    $total += $row[$k];
                    echo "<td>$ $row[$k]</td>";
                }
                else{
                    echo "<td>$row[$k]</td>";
                }
            }
            
            echo "<tr>";
        }
        echo "<tfoot>
        <tr>
            <td colspan='2'>Total</td>
            <td colspan='2'>$$total</td>
        </tr>
        </tfoot>";
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
    
    function signup($username, $password, $email)
    {
        global $conn;
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
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
    
    function loadUser($currentUser){
        global $conn;
        $query = "SELECT * FROM users WHERE username = '$currentUser'";
        $result = $conn->query($query);
        
        $rows = $result ->num_rows;
        
        $result->data_seek(0);
        $row = $result->fetch_array(MYSQLI_NUM);
        
        for ($j = 0; $j < 4; ++$j)
        {
            $userInfo[$j] = $row[$j];
        }
        return $userInfo;
    }

}

?> 