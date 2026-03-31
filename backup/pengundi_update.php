<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");
include("admin_menu.php");

/* =========================
   1. AMBIL ID PENGUNDI (GET / POST)
   ========================= */
$idpengundi = null;

if (isset($_POST['idpengundi'])) {
    $idpengundi = $_POST['idpengundi'];
} elseif (isset($_GET['idpengundi'])) {
    $idpengundi = $_GET['idpengundi'];
}

if ($idpengundi == null) {
    die("<h4>Ralat: ID pengundi tidak dijumpai</h4>");
}

/* =========================
   2. PROSES UPDATE
   ========================= */
if (isset($_POST["submit"])) {

    $namapengundi = $_POST["namapengundi"];
    $password     = $_POST["password"];

    // Update data pengundi
    $sql = "UPDATE pengundi 
            SET namapengundi = '$namapengundi', password = '$password'
            WHERE idpengundi = '$idpengundi'";

    $result = mysqli_query($sambungan, $sql);

    if ($result) {
        echo "<script>alert('Berjaya Kemaskini!');</script>";
        echo "<h4>Berjaya kemaskini pengundi</h4>";
    } else {
        echo "<h4>Ralat : " . mysqli_error($sambungan) . "</h4>";
    }
}

/* =========================
   3. PAPAR DATA PENGUNDI
   ========================= */
$sql = "SELECT * FROM pengundi WHERE idpengundi = '$idpengundi'";
$result = mysqli_query($sambungan, $sql);

if ($pengundi = mysqli_fetch_assoc($result)) {
    $namapengundi = $pengundi['namapengundi'];
    $password     = $pengundi['password'];
} else {
    die("<h4>Pengundi tidak dijumpai</h4>");
}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3>KEMASKINI PENGUNDI</h3>

<form action="pengundi_update.php" method="post">
<table>
    <tr>
        <td>ID Pengundi</td>
        <td>
            <input type="text" value="<?php echo $idpengundi; ?>" disabled>
            <input type="hidden" name="idpengundi" value="<?php echo $idpengundi; ?>">
        </td>
    </tr>

    <tr>
        <td>Nama Pengundi</td>
        <td>
            <input type="text" name="namapengundi" value="<?php echo $namapengundi; ?>" required>
        </td>
    </tr>

    <tr>
        <td>Password</td>
        <td>
            <input type="text" name="password" value="<?php echo $password; ?>" required>
        </td>
    </tr>
</table>

<button class="update" type="submit" name="submit">Update</button>
</form>