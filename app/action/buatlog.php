<?php 
	session_start();

	include_once '../lib/db.php';

	if (isset($_POST['submitlog'])) {
		echo var_dump($_POST);
		echo var_dump($_SESSION);

		$log = $MySQLiconn->real_escape_string($_POST['log']);
		$tanggal_log = $MySQLiconn->real_escape_string($date = date("Y-m-d"));
		$logger_id = $MySQLiconn->real_escape_string($_SESSION['magang_id']);

		$query = $MySQLiconn->query("INSERT INTO log VALUES('', '$log', '$tanggal_log', '$logger_id')");
		header("Location: ../view/logharian.php");
	}
 ?>