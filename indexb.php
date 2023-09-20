<?php
    include "koneksi.php";
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");

    $sql3 = "SELECT * FROM history";
    $result3 = mysqli_query($koneksi, $sql3);
    $data3 = array();
    $index = 0;
    while($dt = mysqli_fetch_object($result3)){
        $data3[$index] = $dt;
        $index++;
    }
    echo json_encode([
        "success" => "true",
        "jadwal_pakan" => $data3,
    ]);die;
