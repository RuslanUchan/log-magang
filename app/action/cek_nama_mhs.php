 

<!-- Cek apakah sudah login -->
<?php 
session_start();
if(!isset($_SESSION['nama']) || empty($_SESSION['nama'])){
	header("location:app/view/loginabsen.php");
}
?>