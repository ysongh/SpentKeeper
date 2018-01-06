<?php
include("db/db.php");

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
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
    <h1>You have log out</h1>
    <div class = "container">
        <img id = "center" src = "/images/exit.jpeg">
    </div>
    <div class = "container">
        <a href="./index.html"><button type="button" class="btn btn-default btn-lg">Home</button></a><br>
    </div>
</body>
</html>