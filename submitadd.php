<?php
$beds = filter_input(INPUT_GET, 'beds', FILTER_SANITIZE_NUMBER_INT);
$price =filter_input(INPUT_GET, 'price', FILTER_SANITIZE_NUMBER_FLOAT);
$floor = filter_input(INPUT_GET, 'floor', FILTER_SANITIZE_NUMBER_INT);

$connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}

$sql = "INSERT INTO room(beds,price,floor) VALUES ($beds,$price,$floor)";
if (mysqli_query($connection, $sql)){
    header('Location: /hotel/success.php');
}else{
    header('Location: /hotel/error.php');
}

mysqli_close($connection);
?>