<?php

error_reporting(E_ALL);
ini_set('display_error',1);

$nama_database = "undiankomik";

$sambungan = mysqli_connect("localhost","root","admin123",$nama_database);
if (!$sambungan){
    die("sambungan gagal");
}
?>
