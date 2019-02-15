<?php 
	$header = "";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php");
	include("../include/header.php");
	require_once("../include/function.php");

	
?>
<div class="search">
	<input type="text" name="search-reference" placeholder="Search.."  id="search-item" onkeyup="find(this.value)">
</div>


	<div id="ref-container">
		
	</div>
			

