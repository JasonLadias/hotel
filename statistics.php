<?php
session_start();
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
        <table>
            <tr>
                <th>ID</th>
                <th>Date In</th>
                <th>Date Out</th>
                <th>Room ID</th>
                <th>User ID</th>
                <th>Date Out</th>
            </tr>
            <?php while ($row = mysqli_fetch_row($result)) {
                echo("<tr>");
                echo ("<td>$row[0]</td>");
                echo ("<td>$row[1]</td>");
                echo ("<td>$row[2]</td>");
                echo ("<td>$row[3]</td>");
                echo ("<td>$row[4]</td>");
                echo ("<td>$row[5]</td>");
                echo("</tr>");
            }
            ?>
        </table>
    </div>
</body>
<?php mysqli_close($connection); ?>

</html>