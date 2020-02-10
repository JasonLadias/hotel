<?php
session_start();
$username = $_SESSION['username'];
$res_array = $_SESSION['cart'];
if ($username === null) {
    header('Location: ./logout.php');
}
$connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}
$i = 0;
foreach ($res_array as $key => $resarray) {
    $sql = "Insert into reservation (date_in,date_out,room_id,user_id,cost) values ('$resarray[0]', '$resarray[1]',$resarray[2],$resarray[3],$resarray[4])";
    if(mysqli_query($connection,$sql)){
        $i++;
    }else{
        header("Location: ./error.php");
        exit();
    }
}
$_SESSION['cart'] = array();
header("Location: ./success.php");
mysqli_close($connection);
?>