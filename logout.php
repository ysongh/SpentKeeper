<?php
include("db.php");

session_start();
session_unset();
session_destroy();

$action = new action();
$action->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h1>You have log out</h1>
    <img src = "/images/exit.jpeg" >
    
    <br></br>
    <a href="./index.html"><button type="button">Home</button></a><br>
</body>

</html>