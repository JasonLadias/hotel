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

$sql = "Select id from room";
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
    <form action="/update.php" method="post">
    <p>Edit Room</p>
    <div class='container'>
    <div class='row'>
    <form action="/update.php" method="get">
            <?php
            $sql = "Select id from room";
            $result = mysqli_query($connection, $sql);            
            while ($row = mysqli_fetch_row($result)) {
                echo("<div class='column'>");
                echo("<input type='radio' name='room_id' value='$row[0]'>$row[0]</input>");       
                echo("</div>");                    
            }
            ?> 
      <input type="submit" value="Edit">
      </form>
      </div></div>
    <p>Delete Room</p>
    <div class='container'>
    <div class='row'>
    <form action="/delete.php" method="get">
            <?php
            $sql = "Select id from room";
            $result = mysqli_query($connection, $sql);            
            while ($row = mysqli_fetch_row($result)) {
                echo("<div class='column'>");
                echo("<input type='radio' name='room_id' value='$row[0]'>$row[0]</input>");       
                echo("</div>");                    
            }
            ?> 
      <input type="submit" value="Delete">
      </form>
      </div></div>
    <a class="nav-item nav-link" href="add.php">Add Room</a>
</body>
<?php mysqli_close($connection); ?>

</html>