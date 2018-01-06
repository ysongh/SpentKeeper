<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Weclome to your Purchase List</h1>
    
    <?php 
        include("db/db.php");
        session_start();
        $currentUser = $_SESSION['username'];
        include('header.php');
    ?>
    
    <div class = "container">
        <?php
        $action = new action();
        $action->isUser($currentUser);
        $userItem = $action->load($currentUser);
        
        if (isset($_POST['date'])) 
        {
            $date = $_POST['date'];
            $action->search($date);
        }
        ?>
        
        <table class="table table-hover">
            <thead>
                <tr> 
                    <th>Purchase ID</th>
                    <th>Purchase Name</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($userItem as $key => $col) {
                        echo "<tr>";
                        foreach ($col as $row) {
                            echo "<td>$row</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan='2'>Total</td>
                    <td colspan='2'><?php $action->total($currentUser); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>