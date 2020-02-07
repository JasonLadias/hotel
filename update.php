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

$room_id = filter_input(INPUT_POST, 'room_id', FILTER_SANITIZE_NUMBER_INT);

$connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}

$sql = "SELECT * FROM php_db.room where id=$room_id";
$result = mysqli_query($connection, $sql);
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
        <form action="./submitedit.php" method="get">
            <div class="form-group">
                <input typed='text' value='id' disabled>
                <input type='text' value='beds' disabled>
                <input type='text' value='price' disabled>
                <input type='text' value='floor' disabled>
                <br>
                <?php
                if($room_id===null){
                    header("Location: ./edit.php");
                }
                while ($row = mysqli_fetch_row($result)) {
                    echo("<input type='number' name='id' value='$row[0]' readonly='readonly'>");
                    echo("<input type='number' name='beds' value='$row[1]'>");
                    echo("<input type='number' name='price' value='$row[2]'>");
                    echo("<input type='number' name='floor' value='$row[3]'>");
                    echo("<input type='Submit'  value='Submit'>");
                }
                ?>

            </div>
        </form>
    </div>
</body>
<?php mysqli_close($connection); ?>

</html>