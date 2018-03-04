<h1>Adding Purchase</h1>

<?php 
    include('template/header.php');
?>

<div class = "container">
    <form name = "add" class="form-inline" method = "post" action = "add.php" onsubmit = "return isNumber()">
        <div class="form-group">
            <label for="purchaseName">Purchase Name:</label>
            <input type = "text" class="form-control" name = "itemName" maxlength="20" required>
            <label for="price">Price:</label>
            <input type = "text" class="form-control" name = "price" required>
            <input type = "submit" class="btn btn-default" value = "Add">
        </div>
        
    </form>
    <p id = "error"></p>

    <?php
    $action = new action();
    $action->isUser($currentUser);
    
    if  (isset($_POST['itemName']) &&
        isset($_POST['price'])) 
    {
        $itemName= $_POST['itemName'];
        $price= $_POST['price'];
        $action->add($itemName, $price, $currentUser);
        echo "Success</br>";
    }
    ?>
</div>

<?php include('template/footer.php'); ?>