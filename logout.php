<?php
session_start();
session_destroy();
header('Location: /hotel/login.php');
?>