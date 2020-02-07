<?php
session_start();
$username = $_SESSION['username'];
if ($username === null) {
    header('Location: ./logout.php');
}
$is_admin = $_SESSION['is_admin'];
if ($is_admin === 0) {
    header('Location: ./home.php');
}
$connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}

$stmt = mysqli_stmt_init($connection);

$sql = "SELECT res.id, res.date_in, res.date_out, res.room_id, u.username, res.cost FROM reservation res inner join isuser u on res.user_id=u.idisuser;";
$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
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
        <table class="table table-striped">
            <thread>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date In</th>
                    <th scope="col">Date Out</th>
                    <th scope="col">Room ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Date Out</th>
                </tr>
            </thread>
            <tbody>
            <?php while ($row = mysqli_fetch_row($result)) {
                echo ("<tr>");
                echo ("<th scope='row'>$row[0]</th>");
                echo ("<td>$row[1]</td>");
                echo ("<td>$row[2]</td>");
                echo ("<td>$row[3]</td>");
                echo ("<td>$row[4]</td>");
                echo ("<td>$row[5]</td>");
                echo ("</tr>");
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
<?php mysqli_close($connection); ?>

</html>