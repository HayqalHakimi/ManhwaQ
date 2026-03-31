<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");

if(isset($_POST["submit"])){
    $idpengundi = $POSTS["idpengundi"];
    $idcalon = $POSTS["idcalon"];
    
    $sudah_undi = false;
    
    $sql = "select * from pengundi where idpengundi ='$idpengundi'";

$result = mysqli_query($sambungan,$sql);
    while($pengundi = mysqli_fetch_array($result)){
   $password = $pengundi["password"];
   $namapengundi = $pengundi["namapengundi"];
    if($pengundi['idcalon'] !='C00')
        $sudah_undi = true;
    }
    
    if($sudah_undi == false){
        $sql ="update pengundi set idcalon = '$idcalon'
        where id pengundi = 'idpengundi'";
        
    $result = mysqli_query($sambungan,$sql);
        if($result == true)
            echo "<script>alert('Berjaya mengundi calon')<script></h4>";
        else
            echo "<h4>ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
    }
    else
        echo "<script>alert ('maaf! anda sudah mengundi')</script></h4>";
    }
echo "<script>window.location='index.php'</script>";
?>