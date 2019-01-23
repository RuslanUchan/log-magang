<?php
 
// $koneksi = mysqli_connect("localhost","root","","soactive");

include_once '../lib/db.php';

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 

session_start();

//tangkap data dari form login
$username = $_POST['username'];
$nama = $_POST['nama'];


//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($nama)) {
	//kalau username dan password kosong
	header('location:login.php?error=1');
	 false; 
} else if (empty($username)) {
	//kalau username saja yang kosong
	header('location:login.php?error=2');
	 false; 
} else if (empty($nama)) {
	//kalau password saja yang kosong
	header('location:login.php?error=3');
	 false; 
}

$q = mysqli_query($MySQLiconn,"SELECT * FROM mahasiswa WHERE username='$username' AND nama='$nama'");

if (mysqli_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	$_SESSION['nama'] = $nama;
	$_SESSION['username'] = $username;

	//redirect ke halaman index
	header('location:../view/absensiharian.php');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:login.php?error=4');
}
?>