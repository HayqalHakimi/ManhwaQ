<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "hopper.proxy.rlwy.net";
$user = "root";
$pass = "UIYwrnwilzUYNtdqwcAospnHlevSgAZE";
$db   = "railway";
$port = "27613";

$sambungan = mysqli_connect($host, $user, $pass, $db, $port);
$conn = &$sambungan;

if (!$sambungan) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($sambungan, 'utf8mb4');
    