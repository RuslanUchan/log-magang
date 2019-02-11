<?php
     define('_HOST_NAME','localhost');
     define('_DATABASE_NAME','absensi_magang');
     define('_DATABASE_USER_NAME','magang');
     define('_DATABASE_PASSWORD','m4g4ng');
	
     $MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);
	 
	 if($MySQLiconn->connect_errno)
	 {
		 die("ERROR : -> ".$MySQLiconn->connect_error);
	 }
	 
