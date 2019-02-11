<?php
	//header('Location: hello.php');
	header('Location: http://10.1.10.13:800/hello.php');
	//echo "<script>window.top.location='http://10.1.10.13:800/hello.php'</script>";
	//echo "<script>window.location.href='http://10.1.10.13:800/hello.php'</script>";
	..echo "<META HTTP-EQUIV='Refresh' Content='0; URL=http://10.1.10.13:800/hello.php";
	exit;
?>
