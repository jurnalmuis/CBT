<?php include 'header.php';?>
  <div class="main mb-5">
    <h5 class="text-center mb-3 mt-4"><i class="fas fa-user-tie"></i> Administrator</h5>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-user-tie"></i> Administrator</b><hr class="mt-1">
            <div class="table-responsive-sm">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Akun</th>
                    <th>Status</th>
                  </tr>
                </thead>
              <?php
              include '../included/penghubung.php';
              $no = 1;
              $data = mysqli_query($connectdb, "select Username,Nama_Akun,Status from usr_admin where IDADMIN='$_SESSION[iduser]'");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $d['Username'];?></td>
                  <td><?php echo $d['Nama_Akun'];?></td>
                  <td><?php echo $d['Status'];?></td>
                </tr>
                <?php
              }
              ?>
              </table>
            </div>
            <div class="pb-2">
              <a href="" class="btn btn-light mr-2"><i class="fas fa-plus-circle"></i> Tambah Administrator</a>
              <a href="#" class="btn btn-light"><i class="fas fa-edit"></i> Edit Administrator</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-database"></i> Data Administrator</b><hr class="mt-1 font-weight-bold">
              <?php
                include '../included/penghubung.php';
                $data = mysqli_query($connectdb, "select Username,Nama_Akun,Status from usr_admin");
                $d = mysqli_num_rows($data);
                $data2 = mysqli_query($connectdb, "select Username,Nama_Akun,Status from usr_admin where Status='Aktif'");
                $d1 = mysqli_num_rows($data2);
              ?>
            <div class="col-md-10 pb-2">
              Total Administrator = <?php echo $d;?><br>
              Administrator Aktif = <?php echo $d1;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include '../included/footer.php';?>
