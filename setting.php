<h1>Account Setting</h1>

<?php 
    include('template/header.php');
?>

<div class = "container">
    <?php
    $action = new action();
    $action->isUser($currentUser);
    $userInfo = $action->loadUser($currentUser);
    ?>
    
    <p id = "userInfo">Username : <?php echo $userInfo[1] ?></p>
    <p id = "userInfo">Email : <?php echo $userInfo[3] ?></p>
</div>

<?php include('template/footer.php'); ?>