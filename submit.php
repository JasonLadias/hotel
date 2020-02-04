<?php 
session_start();

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
        
        $sql = "Insert into reservation (date_in,date_out,room_id,user_id,cost) values ('$date_in', '$date_out',$room_id,$user_id,$price)";
        if(mysqli_query($connection,$sql)){
            header("Location: /hotel/success.php");
        }else{
            header("Location: /hotel/error.php");
        }
    }else{
        header("Location: /error.php");
    }

    mysqli_close($connection);
}else{
    header("Location: /error.php");
}


?>
