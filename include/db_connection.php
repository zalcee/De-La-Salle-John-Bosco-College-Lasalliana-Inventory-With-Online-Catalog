<?php 
//create database connection
  // $dbhost = "localhost";
  // $dbuser = "root";
  // $dbpass = "";
  // $dbname = "widget_corps_db";
	define("DB_SERVER","localhost");
	define("DB_USER","root");
	define("DB_PASS","");
	define("DB_NAME","onlinecatalog_db");

  $connection = mysqli_connect (DB_SERVER,DB_USER,DB_PASS,DB_NAME);
 	if(mysqli_connect_errno()) {
 		die("Database connection failed." . mysqli_connect_error(). "(" . mysqli_connect_errno() . ")"
 		);
 	}
 ?>