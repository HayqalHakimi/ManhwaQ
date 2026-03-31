<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");
include("admin_menu.php");
?>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<main>
    <h3> PILIH JENIS LAPORAN</h3>
    <form action="laporan_cetak.php" method="post">
        <table>
            <tr>
                <td>Jenis Laporan</td>
                <td>
                    <select id='pilih' name='pilih' onchange='papar_pilihan()'>
                        <option value=1 >Keputusan ikut jumlah undi </option>
                        <option value=2 > Keputusan ikut peratus undi</option>
                    </select>
                </td>
            </tr>
        </table>
        <button class="papar" type="submit" name="submit">Papar</button>
</form>
</main>