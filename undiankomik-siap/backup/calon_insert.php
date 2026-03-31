<?php
include("sambungan.php");
include("admin_menu.php");

if(isset($_POST["submit"])){
    $idcalon = $POSTS["idacalon"];
    $namacalon = $POSTS["namacalon"];
    $genre = $POSTS["genre"];
    $idamdin = $POSTS["idadmin"];
    
    $namafail = $idcalon.".png";
    $sementara = $_FILES["namafail"]["tmp_name"];
    move_uploaded_file($sementara, "imej/".basename($namafail));
    
    $sql = "insert into calon values('$idcalon','$namacalon','$namafail','$genre','$idadmin')";
    if ($result == true)
        echo "<h4>Berjaya tambah</h4>";
    else
        echo"<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
}
?>
< link rel="stylesheet" hreh="borang.css">
< link rel="stylesheet" hreh="button.css">

<h3> BORANG TAMBAH CALON</h3>
<form action="calon_insert.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td> ID Calon</td>
            <td><input required type="text" name="idcalon"></td>
        </tr>
         <tr>
            <td>Nama Calon</td>
            <td><input required type="text" name="namacalon"></td>
        </tr>
         <tr>
            <td> Gambar 350x320</td>
            <td><input required type="file" name="namafile" accept=".png,.jpg"></td>
        </tr>
         <tr>
            <td>Genre</td>
            <td><input required type="text" name="moto"></td>
        </tr>
         <tr>
            <td>Admin</td>
            <td>
                <select name="idadmin">
                <?php
                    $sql = "select*from admin";
                    $data = mysqli_query($sambungan,$sql);
                    while($admin = mysql_fetch_array($data)){
                    echo "<option value='$admin[idadmin]'>$admin[namaadmin]</option>";
                    }
                ?>
                </select>
             </td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>