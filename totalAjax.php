<?php    
    include "koneksi.php";
    date_default_timezone_set('Asia/Jakarta');
    header("Content-Type: text/plain");
    $sql3 = "SELECT COUNT(id) as count FROM pendaki;";
    $result3 = mysqli_query($koneksi, $sql3);
    $countAll = mysqli_fetch_object($result3);
    $sql = "SELECT * FROM `pendaki`";
    $result = mysqli_query($koneksi, $sql);
    $countActive = 0;
    while($pendaki = mysqli_fetch_object($result)){ $index++;
        $sql2 = "SELECT * FROM `history` WHERE identity_id = ".$pendaki->id." ORDER BY timestamp DESC";
        $result2 = mysqli_query($koneksi, $sql2);
        if($result2->num_rows > 0){
            $data = mysqli_fetch_object($result2);
            $time = strtotime($data->timestamp);
            $curtime = time();
            $date = new DateTime($data->timestamp);
            $now = new DateTime();
            $interval = $date->diff($now);
            if($interval->y > 0){
                $interval->m += $interval->y*12;
                $interval->y = 0;
            };
            if($interval->m > 0){
                $interval->d += $interval->m*30;
                $interval->m = 0;
            } 
            if($interval->d > 0){
                $interval->h += $interval->d*24;
                $interval->d = 0;
            } 
        // var_dump($interval); die;
            if($interval->h < 2) $countActive++;
        }
    }
?>

<div class="col-auto">
    <div class="card">
        <div class="card-body">
            <div class="row me-2">
                <div class="col-auto">
                    <i class='bx bxs-user' style="font-size:50px"></i>
                </div>
                <div class="col">
                    <div class="row">
                        <b class="p-0 m-0">Total Pendaki Aktif</b>
                    </div>
                    <div class="row">
                        <?=$countActive?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-auto">
    <div class="card">
        <div class="card-body">
            <div class="row me-2">
                <div class="col-auto">
                    <i class='bx bx-user' style="font-size:50px"></i>
                </div>
                <div class="col">
                    <div class="row">
                        <b class="p-0 m-0">Total Pendaki</b>
                    </div>
                    <div class="row">
                        <?=$countAll->count?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  