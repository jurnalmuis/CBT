<?php
$connectdb = mysqli_connect("172.20.0.2","root","YuuCh4n","db_cbt");
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>
