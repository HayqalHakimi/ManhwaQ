<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("sambungan.php");
include("admin_menu.php");

?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<table>
   <caption>SENARAI NAMA CALON</caption>
   <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Gambar</th>
    <th>Genre</th>
    <th colspan="3">Tindakan</th>
</tr>
    
<?php
    $sql = "select * from calon";
    $result = mysqli_query($sambungan,$sql);
    while($admin = mysqli_fetch_array($result)){
    $idcalon = $calon["idcalon"];
        $idadmin = $admin["idadmin"];
    echo "<tr> <td>$calon[idcalon]</td>
    <td>$calon [namacalon]</td> 
    <td><img width= 100 src= 'imej/$calon[gambar]'></td>
    <td>$calon[harga]</td>
    <td>
       <a href='calon_update =.php?idcalon=$idcalon'title='update'>
        <img src='imej/refresh.png'>
       </a>
    </td>
    <td>
      <a href='javascript:padam(\"$idcalon\");'title='delete'>
       <img src='imej/delete.png'>
      </a>
    </td>
</tr>";
    }
?>
</table>

<script>
    function padam(id) {
    if (confirm("adakah adna ingin padam")== true){
    window.location = "calon_delete.php?idcalon=" + id;
    
    }
}
</script>
