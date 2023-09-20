<?php
    include "koneksi.php";
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    $identity_id = null;
    $latitude = null;
    $longitude = null;
    $suhu_badan = null;
    $suhu_heater = null;
    $suhu_udara = null;
    $detak_jantung = null;
    $mdpl = null;
    $penjemputan = null;
    $timestamp = null;
    if(isset($_GET['identity_id'])) $identity_id = $_GET['identity_id'];
    if(isset($_GET['latitude'])) $latitude = $_GET['latitude'];
    if(isset($_GET['longitude'])) $longitude = $_GET['longitude'];
    if(isset($_GET['suhu_badan'])) $suhu_badan = $_GET['suhu_badan'];
    if(isset($_GET['suhu_heater'])) $suhu_heater = $_GET['suhu_heater'];
    if(isset($_GET['suhu_udara'])) $suhu_udara = $_GET['suhu_udara'];
    if(isset($_GET['detak_jantung'])) $detak_jantung = $_GET['detak_jantung'];
    if(isset($_GET['mdpl'])) $mdpl = $_GET['mdpl'];
    if(isset($_GET['penjemputan'])) $penjemputan = $_GET['penjemputan'];
    if(isset($_GET['timestamp'])) $timestamp = $_GET['timestamp'];

    if(isset($_POST['identity_id'])) $identity_id = $_POST['identity_id'];
    if(isset($_POST['latitude'])) $latitude = $_POST['latitude'];
    if(isset($_POST['longitude'])) $longitude = $_POST['longitude'];
    if(isset($_POST['suhu_badan'])) $suhu_badan = $_POST['suhu_badan'];
    if(isset($_POST['suhu_heater'])) $suhu_heater = $_POST['suhu_heater'];
    if(isset($_POST['suhu_udara'])) $suhu_udara = $_POST['suhu_udara'];
    if(isset($_POST['detak_jantung'])) $detak_jantung = $_POST['detak_jantung'];
    if(isset($_POST['mdpl'])) $mdpl = $_POST['mdpl'];
    if(isset($_POST['penjemputan'])) $penjemputan = $_POST['penjemputan'];
    if(isset($_POST['timestamp'])) $timestamp = $_POST['timestamp'];
    
    if($identity_id != null){
        if($timestamp == null) $timestamp = "current_timestamp()";
        else $timestamp = "'".$timestamp."'";
        $sql = "INSERT INTO `history` (`id`, `identity_id`, `latitude`, `longitude`, `suhu_badan`, `suhu_heater`, `suhu_udara`, `detak_jantung`, `mdpl`, `penjemputan`, `timestamp`) VALUES (NULL, '".$identity_id."', '".$latitude."', '".$longitude."', '".$suhu_badan."', '".$suhu_heater."', '".$suhu_udara."', '".$detak_jantung."', '".$mdpl."', '".$penjemputan."', ".$timestamp.");";
        $query = mysqli_query($koneksi, $sql);    
        if($query){
            $sql = "SELECT * FROM history ORDER BY `id` DESC";
            $result = mysqli_query($koneksi, $sql);
            $data = mysqli_fetch_object($result);
    
            echo json_encode([
                "success" => "true",
                "data_latest" => $data,
            ]);die;
        }
        else{
            echo json_encode([
                "success" => "false",
                "message" => "Failed to add data",
            ]);die;
        }
    }
    else{  
        echo json_encode([
            "success" => "false",
            "message" => "identity_id required",
        ]);die;
    }
