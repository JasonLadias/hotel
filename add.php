<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Jason's Hotel</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    include('navbar.php');
    $username = $_SESSION['username'];
    $is_admin = $_SESSION['is_admin'];
    $user_id = $_SESSION['user_id'];
    ?>
    <div class="container">
        <p>Room Details</p>
        <form action="./submitadd.php" method="get">
            <div class="form-group">
                <input type='text' value='beds' disabled>
                <input type='text' value='price' disabled>
                <input type='text' value='floor' disabled>
                <br>
                <input type='number' name='beds' value=''>
                <input type='number' name='price' value=''>
                <input type='number' name='floor' value=''>
                <input type='Submit'  value='Submit'>
            </div>
        </form>
    </div>
</body>

</html>