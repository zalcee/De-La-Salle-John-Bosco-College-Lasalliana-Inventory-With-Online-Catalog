<?php 
	$header = "Admin Settings";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	include("../include/header.php");
	require_once("../include/function.php");
?>
<div id="admin-setting">
	<ul>
		<li>
			<a href="Settings.php">Setings</a>
		</li>
		<li>
			<a href="change_username_password.php">Change Username/
			Password</a>
		</li>
		<li>
			<a href="comment.php">Comments</a>
		</li>
		<li>
			<a href="db_backup_and_restore.php">Backup and Restore</a>
		</li>
		<!-- <li>
			<a href="">Admin Settings</a>
		</li> -->
	</ul>
</div>