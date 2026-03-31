<?php
include("sambungan.php");

if (isset($_POST["submit"])) {
    $idpengundi = $_POST["idpengundi"];
    $idcalon = $_POST["idcalon"];
    
    $sudah_undi = false;
    
    $sql = "select * from pengundi where idpengundi = '$idpengundi' ";
    $result = mysqli_query($sambungan, $sql);
    while($pengundi = mysqli_fetch_array($result)) {
        $password = $pengundi['password'];
        $namapengundi = $pengundi['namapengundi'];
        if ($pengundi['idcalon'] != 'C00')
            $sudah_undi = true;    
    }

    if ($sudah_undi == false) {
        $sql = "update pengundi set idcalon = '$idcalon' 
                where idpengundi = '$idpengundi'";

        $result = mysqli_query($sambungan, $sql);
        if ($result == true)
            echo "<script>alert('Berjaya Mengundi Calon')</script></h4>";
        else
            echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
    }
    else
        echo "<script>alert('Maaf! Anda sudah mengundi')</script></h4>";
}
echo "<script>window.location='index.php'</script>";
?>