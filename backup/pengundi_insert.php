<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");
include("admin_menu.php");

// Pastikan pembolehubah ada nilai awal supaya HTML tidak ralat
$idpengundi = "";
$namapengundi = "";
$password = "";

if(isset($_POST["idpengundi"])){
    $idpengundi = $_POST["idpengundi"];
    $password = $_POST["password"];
    $namapengundi = $_POST["namapengundi"];
    
    $sql = "INSERT INTO pengundi VALUES('$idpengundi','$password','$namapengundi','C00')";
    $result = mysqli_query($sambungan, $sql);
    
    if ($result) {
        echo "<h4 style='color:green'>Berjaya tambah</h4>";
    } else {
        echo "<h4 style='color:red'>Ralat : ".mysqli_error($sambungan)."</h4>";
    }
}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3>BORANG TAMBAH PENGUNDI</h3>
<form name="borang" action="pengundi_insert.php" method="post" onsubmit="return semak()">
    <table>
        <tr>
            <td class="saiz">ID pengundi</td>
            <td><input type="text" name="idpengundi" placeholder="cth : U065" required></td>
        </tr>
        <tr>
            <td class="saiz">Nama pengundi</td>
            <td><input type="text" name="namapengundi" placeholder="cth : hajar" required></td>
        </tr>
        <tr>
            <td class="saiz">Password</td>
            <td><input type="text" name="password" placeholder="cth : 123 " required></td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>

<br>
<div>
    <p class="saiz">Ubah saiz tulisan</p>
    <input type="range" min="14" max="30" value="14" oninput="ubahSaiz(this.value)">
</div>

<script>
    function semak() {
        var id = document.forms["borang"]["idpengundi"].value.trim();
        
        if(id.length !== 4) {
            alert("ID Pengundi mesti tepat 4 aksara");
            return false; // Jangan hantar borang
        }
        
        return true; // Teruskan hantar borang
    }

    function ubahSaiz(saiz) {
        var elemen = document.getElementsByClassName("saiz");
        for (var i = 0; i < elemen.length; i++) {
            // Betulkan fontSaiz kepada fontSize
            elemen[i].style.fontSize = saiz + "px";
        }
    }
</script>