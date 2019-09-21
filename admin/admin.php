<?php include 'header.php';?>
  <div class="main mb-5">
    <h5 class="text-center mb-3 mt-4"><i class="fas fa-user-tie"></i> Administrator</h5>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-user-tie"></i> Administrator</b><hr class="mt-1">
            <div class="table-responsive-sm">
              <?php
                include "../included/penghubung.php";
                //Create Data
                function tambah($connectdb){
                  if (isset($_POST['btn_simpan'])){
                    $idadmin = $_POST['IDADMIN'];
                    $useradd = $_POST['Username'];
                    $passadd = $_POST['Password'];
                    $namaadd = $_POST['Nama_Akun'];
                    $statusadd = $_POST['Status'];
                    if(!empty($useradd) && !empty($passadd) && !empty($namaadd) && !empty($statusadd)){
                      $sql = "INSERT into usr_admin (IDADMIN,Username,Password,Nama_Akun,Status) VALUES('$idadmin','$useradd','$passadd','$namaadd','$statusadd')";
                      //$sql = "INSERT INTO usr_admin (IDAMIN, Username, Password, Nama_Akun, Status) VALUES(".$id.",'".$nm_tanaman."','".$hasil."','".$lama."','".$tgl_panen."')";
                      $simpan = mysqli_query($connectdb, $sql);
                      if($simpan && isset($_GET['aksi'])){
                        if($_GET['aksi'] == 'create'){
                          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
                          exit;
                        }
                      }
                    } else{
                      $pesan = "Data belum lengkap!";
                    }
                  }
                  ?>
                    <form action="" method="post">
                      <fieldset>
                      <input type="text" name="IDADMIN" value="<?php
                      $query2 = "SELECT max(IDADMIN) as maxKode FROM usr_admin";
                      $hasil1 = mysqli_query($connectdb,$query2);
                      $data1 = mysqli_fetch_array($hasil1);
                      $admcode = $data1['maxKode'];
                      $noUrut = (int) substr($admcode, 3, 3);
                      $noUrut++;
                      $char1 = "ADM";
                      $admcode = $char1 . sprintf("%03s", $noUrut);
                      echo $admcode;
                      ?>" hidden>
                      <div class="input-group my-2">
                        <label class="col-md-2 form-control-plaintext">Nama</label>
                        <input class="col-md-5 form-control rounded" type="text" name="Nama_Akun">
                      </div>
                      <div class="input-group my-2">
                        <label class="col-md-2 form-control-plaintext">Username</label>
                        <input class="col-md-5 form-control rounded" type="text" name="Username">
                      </div>
                      <div class="input-group my-2">
                        <label class="col-md-2 form-control-plaintext">Password</label>
                        <input class="col-md-5 form-control rounded" type="password" name="Password">
                      </div>
                      <div class="input-group my-2">
                        <label class="col-md-2 form-control-plaintext">Status</label>
                        <!--<input class="col-md-5 form-control rounded" type="text" name="Status">-->
                        <select name="Status" class="col-md-5 form-control rounded" value="'<?php echo $status;?>'">
                          <option>Aktif</option>
                          <option>Tidak Aktif</option>
                        </select>
                      </div>
                      <div class="input-group my-3">
                        <label class="col-md-2 form-control-plaintext"></label>
                        <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-dark mr-2"/>
                        <input type="reset" name="reset" value="Batal" class="btn btn-light"/>
                      </div>
                      <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                    </fieldset>
                    </form>
                  <?php
                }
                // --- Fungsi Delete
                  function hapus($connectdb){
                  if(isset($_GET['IDADMIN']) && isset($_GET['aksi'])){
                  	$id = $_GET['IDADMIN'];
                  	$sql_hapus = "Update usr_admin SET Status='Tidak Aktif' WHERE IDADMIN='$id'";
                  	$hapus = mysqli_query($connectdb, $sql_hapus);
                    if(isset($_GET['IDADMIN'])){
                      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
                      exit;
                    }
                  }

                }
                  // --- Tutup Fungsi Hapus
                function tampil_data($connectdb){
                  $sql = "select * from usr_admin";
                  $query = mysqli_query($connectdb,$sql);
                  echo "<fieldset>";
                  echo "<table class='table table-sm'>
                          <thead>
                            <tr>
                              <th>Username</th>
                              <th>Nama Akun</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>";
                  while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                      <td><?php echo $data['Username'];?></td>
                      <td><?php echo $data['Nama_Akun'];?></td>
                      <td><?php echo $data['Status'];?></td>
                      <td>
                        <a href="admin.php?aksi=update&IDADMIN=<?php echo $data['IDADMIN'];?>" class="bg-warning text-light rounded" style="padding:4px;"><i class="fas fa-edit"></i> Edit</a>
                        <a href="admin.php?aksi=delete&IDADMIN=<?php echo $data['IDADMIN'];?>" class="bg-danger text-light rounded" style="padding:4px;"><i class="fas fa-trash-alt"></i> Nonaktif</a>
                      </td>
                    </tr>
                    <?php
                  }
                  echo "</table>";
                  echo "</fieldset>";
                }
                function ubah($connectdb){
                  //ubah data
                  if(isset($_POST['btn_ubah'])){
                    $id = $_POST['IDADMIN'];
                    $useradd = $_POST['Username'];
                    $passadd = $_POST['Password'];
                    $namaadd = $_POST['Nama_Akun'];
                    $statusadd = $_POST['Status'];
                    if(!empty($useradd) && !empty($passadd) && !empty($namaadd) && !empty($statusadd)){
                      $query1="UPDATE usr_admin SET Username='$useradd',Password='$passadd',Nama_Akun='$namaadd',Status='$statusadd' where IDADMIN='$id'";
                			//$perubahan = "Username='".$useradd."',Password='".$passadd."',Nama_Akun='".$namaadd."',Status='".$statusadd."'";
                			//$sql_update = "UPDATE usr_admin SET ".$perubahan." WHERE IDADMIN=$id";
                      $update = mysqli_query($connectdb,$query1);
                      if($update && isset($_GET['aksi'])){
                				if($_GET['aksi'] == 'update'){
                          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
                          exit;
                				}
                			}
                    }else{
                      $pesan= "Data Belum Lengkap";
                    }
                  }
                  // tampilan ubah
                  if(isset($_GET['IDADMIN'])){
                    $idadm = $_GET['IDADMIN'];
                    $data3 = mysqli_query($connectdb,"select * from usr_admin where IDADMIN='$idadm'");
                    $usr3 = mysqli_fetch_array($data3);
                    ?>
                    <form action="" method="post">
                      <fieldset>
                      <input type="text" name="IDADMIN" value="<?php echo $usr3['IDADMIN']; ?>" hidden>
                      <div class="input-group my-2">
                        <label class="col-md-2 form-control-plaintext">Nama</label>
                        <input class="col-md-5 form-control rounded" type="text" name="Nama_Akun" value="<?php echo $usr3['Nama_Akun']; ?>">
                      </div>
                      <div class="input-group my-2">
                        <label class="col-md-2 form-control-plaintext">Username</label>
                        <input class="col-md-5 form-control rounded" type="text" name="Username" value="<?php echo $usr3['Username']; ?>">
                      </div>
                      <div class="input-group my-2">
                        <label class="col-md-2 form-control-plaintext">Password</label>
                        <input class="col-md-5 form-control rounded" type="password" name="Password" value="<?php echo $usr3['Password']; ?>">
                      </div>
                      <div class="input-group my-2">
                        <label class="col-md-2 form-control-plaintext">Status</label>
                        <!--<input class="col-md-5 form-control rounded" type="text" name="Status" value="<?php //echo $usr3['Status']; ?>">-->
                        <select name="Status" class="col-md-5 form-control rounded" value="'<?php echo $usr3['Status'];?>'">
                          <option>Aktif</option>
                          <option>Tidak Aktif</option>
                        </select>
                      </div>
                      <div class="input-group my-3">
                        <label class="col-md-2 form-control-plaintext"></label>
                        <input type="submit" value="Simpan Perubahan" class="btn btn-dark mr-2" name="btn_ubah"/>
                        <!--<input type="submit" value="Simpan Perubahan" class="btn btn-dark"/>-->
                      </div>
                      <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                    </fieldset>
                    </form>
                    <?php
                  }

                }

                if(isset($_GET['aksi'])){
                  switch($_GET['aksi']){
                    case "create":
                      echo"<a href='admin.php'> Home </a>";
                      tambah($connectdb);
                      break;
                    case "read":
                      tampil_data($connectdb);
                      break;
                    case "update":
                      ubah($connectdb);
                      tampil_data($connectdb);
                      break;
                    case "delete":
                			hapus($connectdb);
                			break;
                    default:
                      echo "<h3>Aksi <i>".$_GET['aksi']."</i> Tidak Ada!</h3>";
                      tambah($connectdb);
                      tampil_data($connectdb);
                  }
                } else{

                  tambah($connectdb);
                  tampil_data($connectdb);
                }
              ?>

            </div>
            <hr>

          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="px-4 py-2 bg-white rounded shadow-beranda">
            <b><i class="fas fa-database"></i> Administrator</b><hr class="mt-1 font-weight-bold">
            <?php
                $data4 = mysqli_query($connectdb, "select Username,Nama_Akun,Status from usr_admin");
                $d = mysqli_num_rows($data4);
                $data5 = mysqli_query($connectdb, "select Username,Nama_Akun,Status from usr_admin where Status='Aktif'");
                $d1 = mysqli_num_rows($data5);
              ?>
            <div class="pb-2">
              <p>Hai, <b><?php echo $_SESSION['user'];?></b><br> Halaman ini untuk menambahkan user Administrator & mengubah Akun Administrator Anda.<br>
                <hr>
                Jumlah Admin Aktif = <?php echo $d1;?><br>
                Jumlah User Tidak Aktif = <?php echo $usrak = $d - $d1;?><br>
                Total Admin = <?php echo $d;?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include '../included/footer.php';?>
