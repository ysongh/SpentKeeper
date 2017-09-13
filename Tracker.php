<?php
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
}

?> 
