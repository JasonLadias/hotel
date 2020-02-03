<?php
session_start();
$connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}
//3. If the form is submitted or not.
//3.1 If the form is submitted

//3.1.1 Assigning posted values to variables.

//3.1.2 Checking the values are existing in the database or not

$stmt = mysqli_stmt_init($connection);

$sql = "Select * from room";
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
    ?>

    <div class='container'>
        <div class='row'>
            <?php
            while ($row = mysqli_fetch_row($result)) {
                echo ('<div class="column">');
                echo ("<div class='card' style='width: 18rem;'>");
                echo ('<img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQx3oFN4FyptgcAgC41S1FGS2O8-Dr5YlnM4oTxFhDozoYf8LZg" alt="Card image cap">');
                echo ('<div class="card-body">');
                echo ("<h5 class='card-title'>Room $row[0]</h5>");
                echo ("<p class='card-text'>Beds: $row[1] <br>Price: $row[2] $ <br>Floor: $row[3]</p>");
                echo ('<a href="reservations.php" class="btn btn-primary">Make a Reservation</a>');
                echo ('</div></div></div>');
            }
            ?>
        </div>
    </div>
</body>
<?php mysqli_close($connection); ?>

</html>