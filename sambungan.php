<?php
$host = "hopper.proxy.rlwy.net";
$user = "root";
$pass = "UIYwrnwilzUYNtdqwcAospnHlevSgAZE";
$db   = "railway";
$port = "27613";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Berjaya sambung ke database Railway!";
    ?>
    