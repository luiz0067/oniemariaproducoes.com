<?php
	$servername		=	"your server";
	$username		=	"user";
	$password	=	"senha";
	$database	=	"database";
	$str_connecta = "mysql:host=$servername;dbname=$database;";
	$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
	$my_Db_Connection=null;
	try { 
	  $my_Db_Connection = new PDO($str_connecta, $username, $password	, $dsn_Options);
	  //echo "Connected successfully";
	} catch (PDOException $error) {
	   //echo 'Connection error: ' . $error->getMessage();
	}
	
	
	if (function_exists('BlockSQLInjection')) {
	 
	} else {
			function BlockSQLInjection($str)
		{
			return str_replace("'","''",$str);
		}
	}

?>
