<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");
include("admin_menu.php");

/* =========================
   AMBIL ID CALON (GET / POST)
   ========================= */
$idcalon = null;

if (isset($_POST['idcalon'])) {
    $idcalon = $_POST['idcalon'];
} elseif (isset($_GET['idcalon'])) {
    $idcalon = $_GET['idcalon'];
}

if ($idcalon == null) {
    die("<h4>Ralat: ID calon tidak dijumpai</h4>");
}

/* =========================
   PROSES UPDATE
   ========================= */
if (isset($_POST["submit"])) {

    $namacalon = $_POST["namacalon"];
    $harga     = $_POST["harga"];

    // Proses Gambar (Jika ada fail baru dimuat naik)
    if (!empty($_FILES["namafail"]["tmp_name"])) {
        $namafail = $idcalon . ".png";
        $sementara = $_FILES["namafail"]["tmp_name"];
        move_uploaded_file($sementara, "imej/" . basename($namafail));
        
        // Update dengan gambar baru
        $sql = "UPDATE calon 
                SET namacalon = '$namacalon', gambar = '$namafail', harga = '$harga'
                WHERE idcalon = '$idcalon'";
    } 
    else {
        // Update tanpa tukar gambar
        $sql = "UPDATE calon 
                SET namacalon = '$namacalon', harga = '$harga'
                WHERE idcalon = '$idcalon'";
    }

    $result = mysqli_query($sambungan, $sql);

    if ($result) {
        echo "<h4>Berjaya kemaskini</h4>";
    } else {
        echo "<h4>Ralat : " . mysqli_error($sambungan) . "</h4>";
    }
}

/* =========================
   PAPAR DATA CALON
   ========================= */
$sql = "SELECT * FROM calon WHERE idcalon = '$idcalon'";
$result = mysqli_query($sambungan, $sql);

if ($calon = mysqli_fetch_assoc($result)) {
    $namacalon = $calon['namacalon'];
    $harga     = $calon['harga'];
    $gambar    = $calon['gambar'];
} else {
    die("<h4>Calon tidak dijumpai</h4>");
}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3>KEMASKINI CALON</h3>

<form action="calon_update.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>ID Calon</td>
        <td>
            <input type="text" value="<?php echo $idcalon; ?>" disabled>
            <input type="hidden" name="idcalon" value="<?php echo $idcalon; ?>">
        </td>
    </tr>

    <tr>
        <td>Nama Calon</td>
        <td>
            <input type="text" name="namacalon" value="<?php echo $namacalon; ?>" required>
        </td>
    </tr>

    <tr>
        <td>Genre / Harga</td>
        <td>
            <input type="text" name="harga" value="<?php echo $harga; ?>" required>
        </td>
    </tr>

    <tr>
        <td class="warna">Gambar (PNG/JPG)</td>
        <td>
            <input type="file" name="namafail" accept=".png, .jpg">
            <br>
            <small>Gambar semasa:</small><br>
            <img width="100" src="imej/<?php echo $gambar; ?>?t=<?php echo time(); ?>">
        </td>
    </tr>
</table>

<button class="update" type="submit" name="submit">Update</button>
</form>