<?php include 'header.php';?>

  <div class="main mb-5">
    <h5 class="text-center mb-3 mt-4"><i class="fas fa-question"></i> Soal</h5>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-question"></i> Bank Soal</b><hr class="mt-1">
            <?php
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal"){
                echo "<div class=' text-danger text-center mb-2'><h4>Bank Soal Tidak Di Temukan</h4></div>";
              }
            }
            ?>
            <div>
              <?php
                include '../included/penghubung.php';
                include '../included/soalconnect.php';
                for($no =1; $no<=5; $no++){
                  $nd = "bs".$no;
                  ?>
                  <a class="btn btn-light mr-2" href="/CBT/admin/bank/index.php?banksoal=<?php echo $nd;?>"><b>Bank Soal </b> <?php echo $no;?></a>
                  <?php
                  }
                ?>
            </div>
            <hr>
            <div class="pb-2 mt-3">
              <a href="#" class="btn btn-light mr-2"><i class="fas fa-plus-circle"></i> Tambah Bank Soal</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-database"></i> Data Soal</b><hr class="mt-1 font-weight-bold">
            <?php

             ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include '../included/footer.php';?>
