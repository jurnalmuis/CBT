<?php include 'header.php';?>
  <div class="main mb-5">
    <h5 class="text-center mt-3"><i class="fas fa-tachometer-alt"></i> Dashboard</h5>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-users"></i> Daftar Siswa</b><hr class="mt-1">
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <?php
                include '../included/penghubung.php';
                $data4 = mysqli_query($connectdb, "select * from usr_admin");
                $d = mysqli_num_rows($data4);
                $data5 = mysqli_query($connectdb, "select * from usr_admin where Status='Aktif'");
                $d1 = mysqli_num_rows($data5);

                mysqli_close($connectdb);
              ?>
            <b><i class="fas fa-database"></i> Data</b><hr class="mt-1 font-weight-bold">
            <p>Berisi Informasi Record Data.<hr>
              User Admin Aktif = <b><?php echo $d1 ;?></b></br>
              User Admin Non-Aktif = <b><?php echo $lol = $d - $d1 ;?></b></br>
              Total User Admin = <b><?php echo $d ;?></b></br><hr>
            </p>
          </div>
        </div>
        <div class="col-md-8 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-file-alt"></i> Aturan</b><hr class="mt-1 font-weight-bold">
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-rss"></i> Hasil Nilai</b><hr class="mt-1 font-weight-bold">
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include '../included/footer.php';?>
