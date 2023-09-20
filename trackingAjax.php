<?php    
    include "koneksi.php";
    date_default_timezone_set('Asia/Jakarta');
    header("Content-Type: text/plain");
    $sql = "SELECT * FROM `pendaki`";
    $result = mysqli_query($koneksi, $sql);
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
?>
<div class="card m-4">
    <div class="card-header">
    <b style="font-size:30px;"><?=$pendaki->nama?></b>
    </div>
    <div class="card-body">
    <table class="table">
        <tbody>
        <tr>
            <th scope="row" style="width:200px;">Latitude</th>
                <td><?=$data->latitude?></td>
            </tr>
            <tr>
                <th scope="row" style="width:200px;">Longitude</th>
                <td><?=$data->longitude?></td>
            </tr>
            <tr>
                <th scope="row" style="width:200px;">Ketinggian</th>
                <td colspan="2"><?=$data->mdpl?> mdpl</td>
            </tr>    
        </tbody>
    </table>
    <iframe style="mb-5" id="map" width="100%" height="500" src="https://maps.google.com/maps?q=<?=$data->latitude?>,<?=$data->longitude?>&output=embed"></iframe>
    </div>
</div>

<?php }}?>