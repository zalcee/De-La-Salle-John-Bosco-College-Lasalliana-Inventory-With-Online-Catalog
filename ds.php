<?php 
	include("include/header.php");
	require_once("include/db_connection.php");
	require_once("include/function.php");

	$bin = 'C:\xampp\mysql\bin';
	exec("cd '$bin'");
	exec("mysqldump -u root --password= onlinecatalog_db > backup.sql");
	?>
	