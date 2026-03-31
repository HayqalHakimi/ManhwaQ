<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");

$idpengundi= $_GET["idcalon"];
$sql = "delete from pengundi where idpengundi = '$idpengundi'";
$result = mysqli_query($sambungan,$sql);

echo"<script>window.location='pengundi_senarai.php'</script>";
?>