<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");

$idcalon= $_GET["idcalon"];
$sql = "delete from calon where idcalon = '$idcalon'";
$result = mysqli_query($sambungan,$sql);

echo"<script>window.location='calon_senarai.php'</script>";
?>
