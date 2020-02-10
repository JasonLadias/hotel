<?php
session_start();
$username = $_SESSION['username'];
if ($username === null) {
    header('Location: ./logout.php');
}
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
    $res_array = $_SESSION['cart'];
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
                    <th scope="col">Price</th>
                </tr>
            </thread>
            <tbody>
                <?php foreach ($res_array as $key => $resarray) {
                    echo ("<tr>");
                    echo ("<th scope='row'>$key</th>");
                    echo ("<td>$resarray[0]</td>");
                    echo ("<td>$resarray[1]</td>");
                    echo ("<td>$resarray[2]</td>");
                    echo ("<td>$resarray[3]</td>");
                    echo ("<td>$resarray[4]</td>");
                    echo ("</tr>");
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="cartsubmit.php" class="btn btn-primary">Make the Reservations</a>
</body>

</html>