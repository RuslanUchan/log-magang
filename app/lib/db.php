<?php
     define('_HOST_NAME','');
     define('_DATABASE_NAME','');
     // define('_DATABASE_USER_NAME','');
     define('_DATABASE_USER_NAME','');
     // define('_DATABASE_PASSWORD','');
     define('_DATABASE_PASSWORD','');

     $MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);
	 
	 if($MySQLiconn->connect_errno)
	 {
		 die("ERROR : -> ".$MySQLiconn->connect_error);
	 }
	 
