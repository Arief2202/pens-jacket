<?php
    session_start();
    if($_SESSION['username'] == "admin") header('Location: /beranda.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
      if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
        $_SESSION['username'] = 'admin';
        header('Location: /beranda.php');
      }
    }
?>

<!doctype html>
<html lang="en" style="width:100%;height:100%">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <style>
    body{
        background-image: url("/img/background.jpg");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .mybtn{
        background-color: rgba(255,255,255,0.5);
        border-color: transparent;
        border-radius:100px;
        width:300px;
        height:80px;
        font-size:25px;
        color: rgba(20,20,20, .5);
        animation-name: fadedown;
        animation-duration: 0.3s;
    }
    @keyframes fadeup {
        from {background-color: rgba(255,255,255,0.5);}
        to {background-color: rgba(255,255,255,0.8);}
    }
    @keyframes fadedown {
        from {background-color: rgba(255,255,255,0.8);}
        to {background-color: rgba(255,255,255,0.5);}
    }
    .mybtn:hover{
        animation-name: fadeup;
        animation-duration: 0.31s;
        background-color: rgba(255,255,255,0.8);
    }
    .mycontainer{
        background-color: rgba(0,0,0,0.6)
    }
  </style>
  <body style="width:100%; height:100%">
    <div class="d-flex justify-content-center align-items-center h-100 w-100 mycontainer">
        <button class="mybtn" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>Getting Started</b></button>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>