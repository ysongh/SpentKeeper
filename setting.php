<!DOCTYPE html>
<html>
<head>
    <title>Setting</title>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Account Setting</h1>
    
    <?php 
        include("db.php");
        session_start();
        $currentUser = $_SESSION['username'];
        include('header.php');
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
</body>
</html>