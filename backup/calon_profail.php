<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");
include("pengundi_menu.php");
?>

<link rel="stylesheet" href="senarai.css">

<table>
    <caption> SENERAI CALON</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Gambar</th>
        <th>Genre</th>
    </tr>
    
    <?php
    $sql = "select * from calon";
    $result = mysqli_query($sambungan,$sql);
    while($calon = mysqli_fetch_array($result)){
        if($calon['idcalon'] != 'C00')
            echo "<tr> <td>$calon[idcalon]</td>
            <td>$calon[namacalon]</td>
            <td><img width= 100src= 'imej/$calon[gambar]'></td>
            <td>$calon[harga]</td>
            </tr>";
    }
?>
</table>