<?php
    include "koneksi.php";
    session_start();
    if($_SESSION['username'] != "admin") header('Location: /');
    if(isset($_POST['logout'])){
        $_SESSION['username'] = null;
        header('Location: /');
    }
    require_once 'vendor/autoload.php';
    $faker = Faker\Factory::create('id_ID');

    if(isset($_POST['nik']) && isset($_POST['nama']) && isset($_POST['alamat'])){        
        $sql = "INSERT INTO `pendaki` (`id`, `NIK`, `nama`, `alamat`) VALUES (NULL, '".$_POST['nik']."', '".$_POST['nama']."', '".$_POST['alamat']."');";
        $result = mysqli_query($koneksi, $sql);
        header('Location: /pendaki.php');
    }
    if(isset($_POST['delete'])){   
        $sql = "DELETE FROM `pendaki` WHERE `pendaki`.`id` = ".$_POST['delete'];
        $result = mysqli_query($koneksi, $sql);
        header('Location: /pendaki.php');
    }
?>

<!doctype html>
<html lang="en" data-bs-theme="auto" class="h-100">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>SARASCUE | Pendaki</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        .header{
            position:sticky;
            top: 0 ;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">
  </head>
    <body class="h-100">    
        <main class="d-flex flex-nowrap h-100 w-100" style="background-color:#fafafa;">
            <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height:100%;background-color:#ffffff;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <!-- <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg> -->
                <span class="fs-4"><b>SARASCUE.</b></span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                      <a href="/beranda.php" class="nav-link link-body-emphasis" aria-current="page">
                      <i class='bx bx-home' ></i>
                      Beranda
                      </a>
                  </li>
                  <li>
                      <a href="/tracking.php" class="nav-link link-body-emphasis">
                      <i class='bx bx-target-lock' ></i>
                      Tracking
                      </a>
                  </li>
                  <li>
                      <a href="/pendaki.php" class="nav-link active">
                      <i class='bx bx-user' ></i>
                      Pendaki
                      </a>
                  </li>
                </ul>
                <hr>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li>
                        <form method="post">
                            <button type="submit" name="logout" value="true" class="dropdown-item">Sign out</a>
                        </form>
                    </li>
                </ul>
                </div>
            </div>

            
            <!-- <div class="row w-100 h-100 ps-5 pe-5 pt-4"> -->
              <div class="w-100 p-1">
              <div class="p-4">
                <div class="row" id="count">
                          
                </div>
              </div>
                <div class="d-flex justify-content-end mt-4 mb-2 me-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambahkan Pendaki
                    </button>
                </div>
                <div class="card m-4 p-2" style="height: 80%;">
                    <div class="pe-4"style="overflow:auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                <th class="header" scope="col">id</th>
                                <th class="header" scope="col">NIK</th>
                                <th class="header" scope="col">nama</th>
                                <th class="header" scope="col">alamat</th>
                                <th class="header" scope="col">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                 
                                $sql = "SELECT * FROM `pendaki`";
                                $result = mysqli_query($koneksi, $sql);
                                while($dt = mysqli_fetch_object($result)){ $index++;
                                ?>
                                    <tr>
                                        <th scope="row"><?=$dt->id?></th>
                                        <td><?=$dt->NIK?></td>
                                        <td><?=$dt->nama?></td>
                                        <td><?=$dt->alamat?></td>
                                        <td><form method="POST"><button type="submit" name="delete" value="<?=$dt->id?>" class="btn btn-danger">Delete</button></form></td>
                                    </tr>                        
                                <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>

              </div>

        </main>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Pendaki</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="sidebars.js"></script>

        
        <script type="text/javascript">
            var last_len = 0;
            var len = 0;
            function ajaxFunction(){
                // var xhttp = new XMLHttpRequest();        
                // function stateck() {
                //     if(xhttp.readyState == 4){
                //         len = xhttp.responseText.length;
                //         if(len != last_len){
                //             document.getElementById("content").innerHTML = xhttp.responseText;
                //         }
                //         last_len = len;
                //     }
                // }
                // xhttp.onreadystatechange = stateck;
                // xhttp.open("GET", "berandaAjax.php", true);
                // xhttp.send(null);
            }
            function ajaxFunction2(){
                var xhttp = new XMLHttpRequest();        
                function stateck() {
                    if(xhttp.readyState == 4) document.getElementById("count").innerHTML = xhttp.responseText;
                }
                xhttp.onreadystatechange = stateck;
                xhttp.open("GET", "totalAjax.php", true);
                xhttp.send(null);
            }
            setInterval(function() {
                ajaxFunction();
                ajaxFunction2();
            }, 100);  

        </script>
    </body>
</html>
