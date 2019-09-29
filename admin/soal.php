<?php include 'header.php';?>

  <div class="main mb-5">
    <h5 class="text-center mt-3"><i class="fas fa-question"></i> Soal</h5>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-question"></i> Bank Soal</b><hr class="mt-1">
            <?php
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal"){
                echo "<div class=' text-danger text-center mb-2'><h4>Bank Soal Tidak Di Temukan</h4></div>";
              }
            }
            ?>
            <div class="table-responsive-sm">
              <table class='table table-sm'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Bank Soal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
              <?php
                //include '../included/penghubung.php';
                include '../included/soalconnect.php';
                $data = mysqli_query($soalconnect,"show tables");
                $cek = mysqli_num_rows($data);
                for($no =1; $no<=$cek; $no++){
                  $nd = "bs".$no;
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $nd;?></td>
                    <td>
                      <a style="padding:5px; text-decoration:none;" class="text-dark bg-warning text-light rounded mr-2" href="/CBT/admin/bank/index.php?aksi=create&banksoal=<?php echo $nd;?>"><i class="fas fa-edit"></i> Edit</a>
                      <a style="padding:5px; text-decoration:none;" class="text-light bg-danger text-light rounded" href="/CBT/admin/bank/index.php?aksi=create&banksoal=<?php echo $nd;?>"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php
                  }
                ?>
              </table>
            </div>
            <hr>
            <div class="pb-2 mt-3">
              <?php
              include '../included/soalconnect.php';
              if (isset($_POST['btn_simpan'])){
                $tambah = $cek + 1;
                $bstambah = "bs".$tambah;
                $sql = "CREATE TABLE `db_banksoal`.`$bstambah` ( `idsoal` VARCHAR(6) NOT NULL PRIMARY KEY, `soal` VARCHAR(80) NOT NULL , `a` VARCHAR(50) NOT NULL , `b` VARCHAR(50) NOT NULL , `c` VARCHAR(50) NOT NULL , `d` VARCHAR(50) NOT NULL , `jawaban` VARCHAR(50) NOT NULL )";
                if (mysqli_query($soalconnect, $sql)) {
                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=soal.php">';
                    exit;
                  } else {
                    echo "Error creating table: " . mysqli_error($soalconnect);
                  }

                  mysqli_close($soalconnect);
              }
              ?>
              <form action="" method="post">
                <input type="submit" name="btn_simpan" value="Tambah Bank Soal" class="btn btn-light"/>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-database"></i> Administrator</b><hr class="mt-1 font-weight-bold">
            <div class="pb-2">
              <p>Hai, <b><?php echo $_SESSION['user'];?></b><br> Halaman ini untuk menambahkan Bank Soal Dan Menghapus Bank Soal<br>
                <hr>
                Jumlah Bank Soal = <?php echo $cek;?><br>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include '../included/footer.php';?>
