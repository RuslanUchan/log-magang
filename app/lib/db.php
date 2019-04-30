<?php
     define('_HOST_NAME','http://35.229.197.245:800/');
     define('_DATABASE_NAME','absensi_magang');
     // define('_DATABASE_USER_NAME','magang');
     define('_DATABASE_USER_NAME','root');
     // define('_DATABASE_PASSWORD','m4g4ng');
     define('_DATABASE_PASSWORD','qwery123');

     $MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);
	 
	 if($MySQLiconn->connect_errno)
	 {
		 die("ERROR : -> ".$MySQLiconn->connect_error);
	 }
	 
