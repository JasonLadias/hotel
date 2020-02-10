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

if ((isset($_POST['date_in']) && isset($_POST['date_out']) && isset($_POST['room_id']))&&($_POST['date_in']<$_POST['date_out'])) {
    $room_id = filter_input(INPUT_POST, 'room_id', FILTER_SANITIZE_NUMBER_INT);
    $date_in = filter_input(INPUT_POST, 'date_in');
    $date_out = filter_input(INPUT_POST, 'date_out');

    $diff = abs(strtotime($date_out) - strtotime($date_in));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));   
    $days_stayed = $days ;

    $user_id = $_SESSION['user_id'];

    $connection = mysqli_connect('localhost', 'root', 'root', 'php_db');
    if (!$connection) {
        die("Database Connection Failed" . mysqli_error($connection));
    }

    $stmt = mysqli_stmt_init($connection);

    $sql = "Select date_in,date_out from reservation where room_id=$room_id";
    $result = mysqli_query($connection, $sql);  
    $stop = false ;

    while ($row = mysqli_fetch_row($result)) {
        if(($date_in >= $row[0]) && ($date_in <= $row[1])){
            $stop = true ;
            echo("stop");
        }

        if(($date_out >= $row[0]) && ($date_out <= $row[1])){
            $stop = true ;
            echo("stop");
        }
    }

    if(!$stop){
        $sql = "Select price from room where id=$room_id";
        $result = mysqli_query($connection,$sql);
        $price1 = mysqli_fetch_row($result);
        $price = $price1[0] * $days_stayed;
        
        $new_reservation = array($date_in,$date_out,$room_id,$user_id,$price);

        if (empty($_SESSION['cart'])){
            $_SESSION['cart'] = array($new_reservation);
        }else{
            foreach ($_SESSION['cart'] as $resarray) {
                if(in_array($new_reservation[2],$resarray)){
                    header("Location: ./error.php");
                    exit();
                }
            }
            array_push($_SESSION['cart'],$new_reservation);
        }

        header("Location: ./cartsuccess.php");

        /*$sql = "Insert into reservation (date_in,date_out,room_id,user_id,cost) values ('$date_in', '$date_out',$room_id,$user_id,$price)";
        if(mysqli_query($connection,$sql)){
            header("Location: ./success.php");
        }else{
            header("Location: ./error.php");
        }*/
    }else{
        header("Location: ./error.php");
    }

    mysqli_close($connection);
}else{
    header("Location: ./error.php");
}


?>
