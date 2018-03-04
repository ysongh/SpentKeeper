<h1>Weclome to your Purchase List</h1>

<?php 
include('template/header.php');
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

<?php include('template/footer.php'); ?>
    