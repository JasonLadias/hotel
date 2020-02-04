<?php 
session_start();

    $room_id = $_GET['room_id'];
    $connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
    if (!$connection) {
        die("Database Connection Failed" . mysqli_error($connection));
    }

    $sql = "DELETE FROM php_db.room where id=$room_id";
    if(mysqli_query($connection,$sql)){
        header("Location: /success.php");
    }else{
        header("Location: /error.php");
    }
    mysqli_close($connection);

?>
