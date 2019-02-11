<!-- cek apakah sudah login -->
<?php 
session_start();
if($_SESSION['aktif']!="login"){
	header("location:index.php");
}
?>