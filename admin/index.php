<!DOCTYPE html>
<html>
  <head>
    <title>Login Administrator CBT</title>
    <link rel="shortcut icon" href="../img/test.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/edit.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
    .gambar{
      background-image: url('../img/sunset.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
    }
    </style>
  </head>
  <body class="gambar">
    <?php
    session_start(); // Start session nya
    // Kita cek apakah user sudah login atau belum
    // Cek nya dengan cara cek apakah terdapat session username atau tidak
    if(isset($_SESSION['username'])){ // Jika session username ada berarti dia sudah login
      header("location: beranda.php"); // Kita Redirect ke halaman welcome.php
    }
    ?>
    <div class="container-fluid text-center">
      <form class="login-margin" method="post" action="cek_login.php">
        <div class="">
          <img src="../img/admin.png" style="width:150px;">
        </div>
        <div class="text-light font-weight-bold">
          Administrator CBT
        </div>
        <div class="mt-1">
          <input name="username" type="text" class="rounded-0" style="width:250px; padding:7px;" placeholder="Masukkan Username">
        </div>
        <div class="mt-1">
          <input name="password" type="password" class="rounded-0" style="width:250px; padding:7px;" placeholder="Masukkan Password">
        </div>
        <?php
        if(isset($_GET['pesan'])){
          if($_GET['pesan']=="gagal"){
            echo "<div class=' text-warning text-center'>Username & Password Salah.</div>";
          }
        }
        ?>
        <div class="mt-4">
          <input type="submit" class="btn btn-primary rounded-0" style="width:250px;" value="MASUK">
        </div>
      </form>
    </div>
  </body>
</html>
