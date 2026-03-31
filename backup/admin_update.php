<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");
include("admin_menu.php");

/* =========================
   AMBIL ID ADMIN (GET / POST)
   ========================= */
$idadmin = null;

if (isset($_POST['idadmin'])) {
    $idadmin = $_POST['idadmin'];
} elseif (isset($_GET['idadmin'])) {
    $idadmin = $_GET['idadmin'];
}

if ($idadmin == null) {
    die("<h4>Ralat: ID admin tidak dijumpai</h4>");
}

/* =========================
   PROSES UPDATE
   ========================= */
if (isset($_POST["submit"])) {

    $namaadmin = $_POST["namaadmin"];
    $password  = $_POST["password"];

    // Jika password diisi → update password
    if (!empty($password)) {
        $sql = "UPDATE admin 
                SET namaadmin = '$namaadmin', password = '$password'
                WHERE idadmin = '$idadmin'";
    } 
    // Jika password kosong → update nama sahaja
    else {
        $sql = "UPDATE admin 
                SET namaadmin = '$namaadmin'
                WHERE idadmin = '$idadmin'";
    }

    $result = mysqli_query($sambungan, $sql);

    if ($result) {
        echo "<h4>Berjaya kemaskini</h4>";
    } else {
        echo "<h4>Ralat : ".mysqli_error($sambungan)."</h4>";
    }
}

/* =========================
   PAPAR DATA ADMIN
   ========================= */
$sql = "SELECT * FROM admin WHERE idadmin = '$idadmin'";
$result = mysqli_query($sambungan, $sql);

if ($admin = mysqli_fetch_assoc($result)) {
    $namaadmin = $admin['namaadmin'];
} else {
    die("<h4>Admin tidak dijumpai</h4>");
}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3>KEMASKINI ADMIN</h3>

<form action="admin_update.php" method="post">
<table>
    <tr>
        <td>ID Admin</td>
        <td>
            <input type="text" value="<?php echo $idadmin; ?>" disabled>
            <input type="hidden" name="idadmin" value="<?php echo $idadmin; ?>">
        </td>
    </tr>

    <tr>
        <td>Nama Admin</td>
        <td>
            <input type="text" name="namaadmin" value="<?php echo $namaadmin; ?>" required>
        </td>
    </tr>

    <tr>
        <td>Password Baru</td>
        <td>
            <input type="password" name="password" placeholder="Kosongkan jika tidak tukar">
        </td>
    </tr>
</table>

<button class="update" type="submit" name="submit">Update</button>
</form>