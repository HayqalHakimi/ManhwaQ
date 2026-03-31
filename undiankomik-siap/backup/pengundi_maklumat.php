<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

/*fail pengundi_maklumat.php perlu dipanggil dari fail pengundi_carian.php
 */

include("sambungan.php");
include("admin_menu.php");

$idpengundi = "";
$namapengundi = "Tidak dijumpai";
$password = "Tidak dijumpai";

if (isset($_POST["idpengundi"])) {
$idpengundi = $_POST["idpengundi"];

$sql = "select * from pengundi where idpengundi = '$idpengundi'";

$result = mysqli_query($sambungan,$sql);
    while($pengundi = mysqli_fetch_array($result)){
   $namapengundi = $pengundi["namapengundi"];
   $password = $pengundi["password"];
    }
    }
?>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<main>
    <table class="maklumat">
        <caption>MAKLUMAT PENGUNDI</caption>
        <tr>
            <th>Perkara</th>
            <th>Maklumat</th>
        </tr>
        <tr>
            <td class="maklumat">ID Penggundi</td>
            <td class="maklumat"><?php echo $idpengundi; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Nama</td>
            <td class="maklumat"><?php echo $namapengundi; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Password</td>
            <td class="maklumat"><?php echo $password; ?></td>
        </tr>
    </table>
</main>

            