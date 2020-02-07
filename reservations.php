<?php
session_start();
$connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
$username = $_SESSION['username'];
if($username === null){
    header('Location: ./logout.php');
}
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
    $user_id = $_SESSION['user_id'];
    ?>
    <div class="container">
        <form action="./submit.php" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Choose Room</label>
                <select name="room_id" class="form-control" id="exampleFormControlSelect1">
                    <?php while ($row = mysqli_fetch_row($result)) {
                        echo ("<option>$row[0]</option>");
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="example-date-input" class="col-2 col-form-label">Date Come</label>
                <div class="col-10">
                    <input name="date_in" class="form-control" type="date" value="2020-02-20" id="example-date-input" min="<?php echo Date('Y-m-d'); ?>" >
                </div>
            </div>
            <div class="form-group">
                <label for="example-date-input" class="col-2 col-form-label">Date Leave</label>
                <div class="col-10">
                    <input name="date_out" class="form-control" type="date" value="2020-02-22" id="example-date-input" min="<?php echo Date('Y-m-d'); ?>">
                </div>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
<?php mysqli_close($connection); ?>

</html>