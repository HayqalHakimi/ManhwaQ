<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

/* Program ini bertujuan untuk memasukkan admin yg baru pastikan idadmin tidak sama semasa memasukkan data*/
 include("sambungan.php");
include("admin_menu.php");

if(isset($_POST["submit"])){
    $idadmin = $POSTS["idadmin"];
    $password = $POSTS["password"];
    $namaadmin = $POSTS["namaadmin"];
     $sql = "insert into admin values('$admin','$password','$namadmin')";
    $result = mysqli_query($sambungan,$sql);
    if ($result == true)
        echo "<h4>Berjaya tambah</h4>";
    else
        echo"<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
}
?>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3>BORANG TAMBAH ADMIN</h3>
<form action="admin_insert.php" method="post">
    <table>
        <tr>
            <td> ID Admin</td>
            <td><input required type="text" name="idadmin"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" placeholder="max: 8 char"></td>
        </tr>
    </table>
    <button class="tambah" type="submit">Tambah</button>
</form> 