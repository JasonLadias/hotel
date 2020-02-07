<?php
session_start();
$username = $_SESSION['username'];
if($username === null){
    header('Location: ./logout.php');
}
$is_admin = $_SESSION['is_admin'];
if($is_admin === 0){
    header('Location: ./home.php');
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$beds = filter_input(INPUT_GET, 'beds', FILTER_SANITIZE_NUMBER_INT);
$price =filter_input(INPUT_GET, 'price', FILTER_SANITIZE_NUMBER_FLOAT);
$floor = filter_input(INPUT_GET, 'floor', FILTER_SANITIZE_NUMBER_INT);

$connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}

$sql = "UPDATE room SET beds=$beds,price=$price,floor=$floor where id=$id ";
if (mysqli_query($connection, $sql)){
    header('Location: ./success.php');
}else{
    header('Location: ./error.php');
}

mysqli_close($connection);
?>