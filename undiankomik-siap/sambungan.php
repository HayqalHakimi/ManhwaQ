<?php

    $nama_database = "undiankomik";



    $sambungan = mysqli_connect("localhost", "root", "", $nama_database);

    if ( !$sambungan ) {

          die("sambungan gagal");

    } 

?>