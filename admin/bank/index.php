<?php include '../../admin/header.php' ;?>
<div class="main mb-5">
  <h5 class="text-center mt-3"><i class="fas fa-question"></i> Bank Soal</h5>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9 my-3">
        <div class="px-4 py-2 bg-white rounded shadow-beranda">
          <b><a href='/CBT/admin/soal.php' class='text-dark'><i class="fas fa-chevron-circle-left"></i> Kembali Ke Bank Soal</a> </b><hr class="mt-1">
          <div class="table-responsive-sm">
            <?php
              include "../../included/soalconnect.php";
              //Create Data
              function tambah($soalconnect){
                $pilihdb = $_GET['banksoal'];
                if (isset($_POST['btn_simpan'])){
                  $bgsoal = $_POST['bgsoal'];
                  $idsoal = $_POST['idsoal'];
                  $soal = $_POST['soal'];
                  $a = $_POST['a'];
                  $b = $_POST['b'];
                  $c = $_POST['c'];
                  $d = $_POST['d'];
                  $jawaban = $_POST['jawaban'];
                  if(!empty($soal) && !empty($a) && !empty($b) && !empty($c) && !empty($d) && !empty($jawaban)){
                    $sql = "INSERT into $bgsoal (idsoal,soal,a,b,c,d,jawaban) VALUES('$idsoal','$soal','$a','$b','$c','$d','$jawaban')";
                    //$sql = "INSERT INTO usr_admin (IDAMIN, Username, Password, Nama_Akun, Status) VALUES(".$id.",'".$nm_tanaman."','".$hasil."','".$lama."','".$tgl_panen."')";
                    $simpan = mysqli_query($soalconnect, $sql);
                    if($simpan && isset($_GET['aksi'])){
                      if($_GET['aksi'] == 'create'){
                        $alamat = "aksi=create&banksoal=".$pilihdb."";
                        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=/CBT/admin/bank/index.php?".$alamat."'>";
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
                      <input type="text" name="bgsoal" value="<?php echo $_GET['banksoal'] ;?>" hidden>
                    <input type="text" name="idsoal" value="<?php
                    $query2 = "SELECT max(idsoal) as maxKode FROM $pilihdb";
                    $hasil1 = mysqli_query($soalconnect,$query2);
                    $data1 = mysqli_fetch_array($hasil1);
                    $admcode = $data1['maxKode'];
                    $noUrut = (int) substr($admcode, 3, 3);
                    $noUrut++;
                    $char1 = "IDS";
                    $admcode = $char1 . sprintf("%03s", $noUrut);
                    echo $admcode;
                    ?>" hidden>
                    <div class="input-group my-1">
                      <label class="col-md-12 text-center font-weight-bold"><i class="fas fa-plus-circle"></i> Tambah Soal</label>
                    </div>
                    <div class="input-group my-1">
                      <label class="col-md-2">Soal No. <b><?php echo $noUrut;?></b></label>
                      <textarea class="col-md-8" rows="3" name="soal" style="padding:2px;"></textarea>
                    </div>
                    <div class="input-group mt-1">
                      <label class="col-md-2">A</label>
                      <input style="padding:2px; height:25px;" class="col-md-3" type="text" name="a">
                      <label class="col-md-2">C</label>
                      <input style="padding:2px; height:25px;" class="col-md-3" type="text" name="c">
                    </div>
                    <div class="input-group">
                      <label class="col-md-2">B</label>
                      <input style="padding:2px; height:25px;" class="col-md-3" type="text" name="b">
                      <label class="col-md-2">D</label>
                      <input style="padding:2px; height:25px;" class="col-md-3" type="text" name="d">
                    </div>
                    <div class="input-group">
                      <label class="col-md-2">Jawaban</label>
                      <input style="padding:2px; height:25px;" class="col-md-5" type="text" name="jawaban">
                    </div>
                    <div class="input-group mt-1">
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
                function hapus($soalconnect){
                if(isset($_GET['idsoal']) && isset($_GET['aksi'])){
                  $id = $_GET['idsoal'];
                  $sql_hapus = "Update usr_admin SET Status='Tidak Aktif' WHERE IDADMIN='$id'";
                  $hapus = mysqli_query($soalconnect, $sql_hapus);
                  if(isset($_GET['IDADMIN'])){
                    $alamat = "aksi=create&banksoal=".$pilihdb."";
                    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=/CBT/admin/bank/index.php?".$alamat."'>";
                    exit;
                  }
                }

              }
                // --- Tutup Fungsi Hapus
              function tampil_data($soalconnect){
                $pilihtb = $_GET['banksoal'];
                $no = 1;
                $sql = "select * from $pilihtb";
                $query = mysqli_query($soalconnect,$sql);
                echo "<fieldset>";
                echo "<table class='table table-sm table-bordered'>
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Soal</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>";
                while($data = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    <td><?php echo $lol = $no++;?></td>
                    <td><?php echo $data['soal'];?></td>
                    <td><?php echo $data['a'];?></td>
                    <td><?php echo $data['b'];?></td>
                    <td><?php echo $data['c'];?></td>
                    <td><?php echo $data['d'];?></td>
                    <td><?php echo $data['jawaban'];?></td>
                    <td>
                      <a href="index.php?aksi=update&banksoal=<?php echo $pilihtb;?>&idsoal=<?php echo $data['idsoal'];?>&no=<?php echo $lol;?>" class="bg-warning text-dark rounded" style="padding:5px; text-decoration:none;"><i class="fas fa-edit"></i> Edit</a>
                      <a href="index.php?aksi=update&banksoal=<?php echo $pilihtb;?>&idsoal=<?php echo $data['idsoal'];?>" class="bg-danger text-light rounded" style="padding:5px; text-decoration:none;"><i class="fas fa-trash-alt"></i> Nonaktif</a>
                    </td>
                  </tr>
                  <?php
                }
                echo "</table>";
                echo "</fieldset>";
              }
              function ubah($soalconnect){
                $pilihtb = $_GET['banksoal'];
                //ubah data
                if(isset($_POST['btn_ubah'])){
                  $idsoal = $_POST['idsoal'];
                  $soal = $_POST['soal'];
                  $a = $_POST['a'];
                  $b = $_POST['b'];
                  $c = $_POST['c'];
                  $d = $_POST['d'];
                  $jawaban = $_POST['jawaban'];
                  if(!empty($soal) && !empty($a) && !empty($b) && !empty($c) && !empty($d) && !empty($jawaban)){
                    $query1="UPDATE $pilihtb SET soal='$soal',a='$a',b='$b',c='$b',d='$d',jawaban='$jawaban' where idsoal='$idsoal'";
                    //$perubahan = "Username='".$useradd."',Password='".$passadd."',Nama_Akun='".$namaadd."',Status='".$statusadd."'";
                    //$sql_update = "UPDATE usr_admin SET ".$perubahan." WHERE IDADMIN=$id";
                    $update = mysqli_query($soalconnect,$query1);
                    if($update && isset($_GET['aksi'])){
                      if($_GET['aksi'] == 'update'){
                        $alamat = "aksi=create&banksoal=".$pilihtb."";
                        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=/CBT/admin/bank/index.php?".$alamat."'>";
                        exit;
                      }
                    }
                  }else{
                    $pesan= "Data Belum Lengkap";
                  }
                }
                // tampilan ubah
                if(isset($_GET['idsoal'])){
                  $idadm = $_GET['idsoal'];
                  $data3 = mysqli_query($soalconnect,"select * from $pilihtb where idsoal='$idadm'");
                  $usr3 = mysqli_fetch_array($data3);
                  ?>
                  <form action="" method="post">
                    <fieldset>
                    <input type="text" name="idsoal" value="<?php echo $usr3['idsoal']; ?>" hidden>
                    <div class="input-group my-1">
                      <label class="col-md-12 text-center font-weight-bold"><i class="fas fa-edit"></i> Edit Soal</label>
                    </div>
                    <div class="input-group my-1">
                      <label class="col-md-2">Soal No. <b><?php echo $_GET['no'];?></b></label>
                      <textarea class="col-md-8" rows="3" name="soal" style="padding:2px;" ><?php echo $usr3['soal'] ;?></textarea>
                    </div>
                    <div class="input-group mt-1">
                      <label class="col-md-2">A</label>
                      <input style="padding:2px; height:25px;" class="col-md-3" type="text" name="a" value="<?php echo $usr3['a']; ?>">
                      <label class="col-md-2">C</label>
                      <input style="padding:2px; height:25px;" class="col-md-3" type="text" name="c" value="<?php echo $usr3['c']; ?>">
                    </div>
                    <div class="input-group">
                      <label class="col-md-2">B</label>
                      <input style="padding:2px; height:25px;" class="col-md-3" type="text" name="b" value="<?php echo $usr3['b']; ?>">
                      <label class="col-md-2">D</label>
                      <input style="padding:2px; height:25px;" class="col-md-3" type="text" name="d" value="<?php echo $usr3['d']; ?>">
                    </div>
                    <div class="input-group">
                      <label class="col-md-2">Jawaban</label>
                      <input style="padding:2px; height:25px;" class="col-md-5" type="text" name="jawaban" value="<?php echo $usr3['jawaban']; ?>">
                    </div>
                    <div class="input-group mt-1">
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
                    //echo"<a href='admin.php'> Home </a>";
                    tambah($soalconnect);
                    tampil_data($soalconnect);
                    break;
                  case "read":
                    tampil_data($soalconnect);
                    break;
                  case "update":
                    ubah($soalconnect);
                    tampil_data($soalconnect);
                    break;
                  case "delete":
                    hapus($soalconnect);
                    break;
                  default:
                    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=/CBT/admin/soal.php'>";
                    exit;
                    //echo "<h3>Aksi <i>".$_GET['aksi']."</i> Tidak Ada!</h3>";
                    //echo "<a href='/CBT/admin/soal.php' class='btn btn-dark mr-2'>Kembali Bank Soal</a>";
                    //tambah($soalconnect);
                    //tampil_data($soalconnect);
                }
              } else{
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=/CBT/admin/soal.php'>";
                exit;
                //tambah($soalconnect);
                //tampil_data($soalconnect);
              }
            ?>

          </div>
        </div>
      </div>
      <div class="col-md-3 my-3">
        <div class="px-4 py-2 bg-white rounded shadow-beranda">
          <b><i class="fas fa-database"></i> Administrator</b><hr class="mt-1 font-weight-bold">
          <?php
          $pilihdb = $_GET['banksoal'];
          $data4 = mysqli_query($soalconnect, "select * from $pilihdb");
          $d = mysqli_num_rows($data4);
          ?>
          <div class="pb-2">
              <p>Hai, <b><?php echo $_SESSION['user'];?></b><br> Halaman ini untuk menambahkan soal dan mengubah soal.<br>
              <hr>
              Kode Bank Soal = <?php echo $_GET['banksoal'];?><br>
              Jumlah Soal = <?php echo $d;?><br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../../included/footer.php' ;?>
