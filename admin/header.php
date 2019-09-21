<!DOCTYPE html>
<html>
  <head>
    <title>Beranda</title>
    <link rel="shortcut icon" href="/CBT/img/test.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/CBT/css/bootstrap.min.css">
    <link rel="stylesheet" href="/CBT/css/edit.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="/CBT/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <style>
    </style>
  </head>
  <body class="bg-light">
    <?php
  	session_start();
  	if($_SESSION['status']!="admin"){
  		header("location:index.php");
  	}
  	?>
    <!-- navbar menu start -->
    <nav class="navbar navbar-expand-sm bg-white navbar-light text-dark fixed-top navposisi shadow-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-user"></i> Hai, <?php echo $_SESSION['user'];?></a>
        </li>
      </ul>
    </nav>
    <div class="sidenav">
      <a class="text-light" style="background-color: #212121;"><img src="/CBT/img/admin.png" style="width:25px;"> Administrator</a>
      <hr class="my-2" style="background-color: white;">
      <a class="nav-link text-light" href="/CBT/admin/beranda.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <button class="dropdown-btn text-light"><i class="fas fa-handshake"></i> Kebijakan &nbsp<i class="fa fa-caret-right"></i></button>
      <div class="dropdown-container">
        <a href="/CBT/admin/aturan.php" class="text-light"><i class="fas fa-file-alt"></i> Aturan</a>
        <a href="/CBT/admin/soal.php" class="text-light"><i class="fas fa-question"></i> Soal</a>
        <a href="#" class="text-light"><i class="fas fa-heart"></i> Nilai</a>
      </div>
      <button class="dropdown-btn text-light"><i class="fas fa-user-circle"></i> User &nbsp<i class="fa fa-caret-right"></i></button>
      <div class="dropdown-container">
        <a href="#" class="text-light"><i class="fas fa-users"></i> Guru</a>
        <a href="#" class="text-light"><i class="fas fa-users"></i> Siswa</a>
      </div>
      <button class="dropdown-btn text-light"><i class="fas fa-cog"></i> Setting &nbsp<i class="fa fa-caret-right"></i></button>
      <div class="dropdown-container">
        <a href="/CBT/admin/admin.php" class="text-light"><i class="fas fa-user-tie"></i> Administrator</a>
      </div>
      <hr class="my-2" style="background-color: white;">
      <a class="nav-link text-light" href="logout.php"><i class="fas fa-running"></i> Logout</a>
      <hr class="my-2" style="background-color: white;">
      <small><a href="#" class="footer-side text-light" target="_blank">CBT Version 1</a></small>
    </div>
    <!-- Navbar Menu End -->
    <!-- Script Dropdown Side bar -->
    <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
        } else {
        dropdownContent.style.display = "block";
        }
      });
    }
    </script>
