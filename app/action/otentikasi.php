<?php 
// mengaktifkan session php
session_start();

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

 
// menghubungkan dengan koneksi
include_once '../lib/db.php';
// $koneksi = mysqli_connect("localhost","root","","soactive");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
	echo "<script>alert('ERROR. DB FAIL');</script>";
}

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

$SQL = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$data = mysqli_query($MySQLiconn, $SQL) or mysqli_error($MySQLiconn);
$row = $data->fetch_array();
$admin = $row['username'];

// Cek apakah user mahasiswa atau admin
if ($username == $admin) {
	$cek = mysqli_num_rows($data);
} else {
	$SQL = "SELECT * FROM mahasiswa WHERE username='$username' AND password='$password'";
	$data = mysqli_query($MySQLiconn, $SQL) or mysqli_error($MySQLiconn);
	$row = $data->fetch_array();
	$cek = mysqli_num_rows($data);
}
 
if($cek > 0) {
	if ($username == $admin) {
		$_SESSION['admin'] = true;
		$_SESSION['magang_id'] = '';
		$_SESSION['username'] = $row['username'];
		$_SESSION['nama'] = $admin;
		$_SESSION['alamat'] = '-';
		$_SESSION['jk'] = '-';
		$_SESSION['tanggal_lahir'] = '-';
		// $_SESSION['pic'] = '-';
		$_SESSION['pic'] = $row['pic'];
		$_SESSION['mulai_magang'] = '-';;
		$_SESSION['telp'] = '-';;
		$_SESSION['email'] = '-';;
	} else {
		$_SESSION['admin'] = false;
		$_SESSION['magang_id'] = $row['magang_id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['alamat'] = $row['alamat'];
		$_SESSION['jk'] = $row['jk'];
		$_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
		$_SESSION['pic'] = $row['pic'];
		$_SESSION['mulai_magang'] = $row['mulai_magang'];
		$_SESSION['telp'] = $row['telp'];
		$_SESSION['email'] = $row['email'];
	}
	 
 	$_SESSION['aktif'] = "login";

//	if (!isset($_GET["utm_source"]) {
//		header("StatusL 200 OK", false, 200);
//	}

	header("location: http://10.1.10.13:800/app/view/absensiharian.php");
//	exit;
//	echo "<script>document.location='http//10.1.10.13:800/app/view/absensiharian.php'</script>";
	
} else{
	header("location:../view/login.php?pesan=gagal");
}
?>
