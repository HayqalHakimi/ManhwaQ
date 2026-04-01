<?php 
   include("keselamatan.php");  
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="menu.css">

<header>
    <img class="tajuk" src="imej/tajuk.png">
</header>

<nav>
    <ul>
        <li>
            <a href="#"><b>ADMIN</b></a>
            <ul>
                <li><a href="admin_insert.php">Tambah</a></li>
                <li><a href="admin_senarai.php">Senarai</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="#"><b>PENGUNDI</b></a>
            <ul>
                <li><a href="pengundi_insert.php">Tambah</a></li>
                <li><a href="pengundi_senarai.php">Senarai</a></li>
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
    
    <?php
       include("sambungan.php"); 
       if (isset($_SESSION["idpengguna"])) {
          $idadmin = $_SESSION["idpengguna"]; 
          $sql = "select * from admin where idadmin = '$idadmin' "; 
          $result = mysqli_query($sambungan, $sql);
          $admin = mysqli_fetch_array($result);   
          
          if ($admin) {
              echo "<h5 style='text-align:right; margin-right:20px;'>Selamat datang <span class='hiasan-nama'>$admin[namaadmin]</span></h5>";
          }
       } 
    ?>
</nav>
