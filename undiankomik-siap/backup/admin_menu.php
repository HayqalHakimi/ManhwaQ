<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("keselamatan.php");
?>

<link rel="stylesheet" href="menu.css">

<header>
    <img class="tajuk" src="imej/tajuk.png">
 </header>
     
    <nav>
        <ul>
            <li>
                <a href="#"><b>ADMIN</b></a>
                <ul>
                    <li><a href="admin_insert.php"> Tambah</a></li>
                    <li><a href="admin.senarai.php">Senarai</a></li>
                </ul>
            </li>
        </ul>
    <ul>
        <li>
            <a href="#"><b>PENGUNDI</b></a>
            <ul>
                <li><a href="pengundi_insert.php">Tambah</a></li>
                <li><a href="pengundi_insert.php">Senarai</a></li>
                <li><a href="pengundi_carian.php">Carian</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="#"><b>CALON</b></a>
            <ul>
                <li><a href="calon_insert.php">Tambah</a></li>
                <li><a href="calon_senarai.php">Senarai</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="laporan_pilih.php"><b>LAPORAN</b></a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="import.php"><b>IMPORT</b></a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="logout.php"><b>LOG KELUAR</b></a>
        </li>
    </ul>
</nav>