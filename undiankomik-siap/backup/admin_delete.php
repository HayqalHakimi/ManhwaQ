<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");
include("admin_menu.php");

$idadmin = $_GET["idadmin"];

$sql = "delete from admin where idadmin = '$idadmin'";
$result = mysqli_query($sambungan,$sql);

echo "<script>window.location='admin_senarai.php'</script>";
?>