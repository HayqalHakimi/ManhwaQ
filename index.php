<?php

ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include("sambungan.php");
    include("pengundi_menu.php");

    // 1. SEMAK STATUS LOGIN & STATUS UNDI
    if (isset($_SESSION["idpengguna"])) {
        $idpengundi = $_SESSION["idpengguna"];
        
        // Semak jika sudah mengundi (idcalon bukan C00)
        $sql_cek = "SELECT * FROM pengundi WHERE idpengundi = '$idpengundi' AND idcalon != 'C00'";
        $res_cek = mysqli_query($sambungan, $sql_cek);
        
        // Jika sudah mengundi, terus pergi ke fail keputusan
        if (mysqli_num_rows($res_cek) > 0) {
            header("Location: pengundi_keputusan.php");
            exit();
        }
    } else {
        // Jika belum login, pastikan pembolehubah idpengundi kosong
        $idpengundi = "";
    }

    echo "<link rel='stylesheet' href='button.css'>";
    echo "<main>";

    // 2. AMBIL SENARAI CALON DARI DATABASE
    $sql = "SELECT * FROM calon";
    $result = mysqli_query($sambungan, $sql);
    
    // 3. PAPARAN BORANG UNDI (JIKA LOGIN)
    if (isset($_SESSION["idpengguna"])) {
        echo "<form method='post' action='pengundi_undi.php'>";
        echo "<div class='gambar'>"; // Dibetulkan: Tambah petikan pada class
        
        while($calon = mysqli_fetch_array($result)) {
            if ($calon['idcalon'] != 'C00') {    
                echo "<figure>
                          <img class='home' src='imej/$calon[gambar]'>
                          <figcaption>                 
                                  <input type='hidden' name='idpengundi' value='$idpengundi'>
                                  <input type='radio' name='idcalon' value='$calon[idcalon]' required> </figcaption>
                      </figure>";
            }
        }
        echo "</div>";
        
        echo "<center>
                 <p class='arahan'>Status : belum mengundi, Pilih calon yang sesuai dan klik butang undi</p>  
                 <button class='tambah' type='submit' name='submit'>Undi</button>
              </center> 
              </form>";
    }
    // 4. PAPARAN BIASA (JIKA BELUM LOGIN)
    else {
        echo "<div class='gambar'>"; // Dibetulkan: Tambah petikan pada class
        while ($calon = mysqli_fetch_array($result)) {
              if ($calon['idcalon'] != 'C00') 
                     echo "<figure><img class='home' src='imej/$calon[gambar]'></figure>";
        }
        echo "</div>";
        echo "<center><p class='arahan'>Sila log masuk untuk membuat undian.</p></center>";
    }
    echo "</main>";
?>