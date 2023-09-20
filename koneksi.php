<?php
    $server = "localhost";
    $user = "client_pens";
    $password = "password";
    $nama_database = "smart_jacket";
    $koneksi = mysqli_connect($server, $user, $password, $nama_database);
    if( !$koneksi ){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
?>