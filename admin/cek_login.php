<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../included/penghubung.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($connectdb,"select * from usr_admin where Username='$username' and Password='$password' and Level='Administrator'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$userakun = mysqli_fetch_array($data);
	$_SESSION['user'] = $userakun['Nama_Akun'];
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "admin";
	header("location:beranda.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>
