<?php include '../../admin/header.php' ;?>
<?php
if(isset($_GET['banksoal'])){
  if($_GET['banksoal']==""){
    header("location:/CBT/admin/soal.php?pesan=gagal");
  }
}else{
  header("location:/CBT/admin/soal.php?pesan=gagal");
}
?>
<?php include '../../included/footer.php' ;?>
