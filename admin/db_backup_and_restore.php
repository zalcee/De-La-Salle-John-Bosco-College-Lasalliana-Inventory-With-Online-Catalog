
 <style type="text/css">
 	input[type="submit"] {
 		
 		z-index: 1;
 		position: absolute;
 	}
 	input[type="submit"]:hover {
 		box-shadow: 5px 5px 10px rgb(0,0,0,.4);
 	}

 	input[type="file"] {
 		width: auto;
 		z-index: 1;
 		position: relative;
 	}

 </style>


<?php 
	$header = "Backup and Restore";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	require_once("../include/function.php");
	require_once("../include/header.php");


	if (isset($_POST["backup_db"])) {
		$src = '..\catalog\images';
		$date_time = "backup-".date("m-d-Y-his");
		$loc = trim('D:\ ');
		$backup_dir = $loc.$date_time;
		$bin = 'C:\xampp\mysql\bin';
		exec("cd '$bin'");
		
		exec("mkdir ".$loc."".$date_time."");
		exec("attrib +h ".$loc."".$date_time."");
		exec("xcopy /E ".$src." ".$loc."".$date_time."");
		exec("mysqldump -u root --password= onlinecatalog_db > ".$loc."".$date_time."".trim('\ ')."".$date_time.".sql.zip");
		
		// copy("../catalog/images", $loc);
		?>
			<script type="text/javascript">
				alert("<?php echo "".$date_time.".sql"; ?>");
			</script>
		<?php
		
		
		
	}

	if (isset($_POST["restore"])) {

		if (mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS onlinecatalog_db"))
    {
        echo "Database created";
    }
    else
    {
        echo "Error creating database: " . mysql_error();
    }


		$name = $_FILES["restore_sql"]["name"];
		redirect_to("restore.php?name=".$name);
		// $connection->query("SET_FOREIGN_KEY_CHECKS=0");
		// exec("mysqldump -u root --password= zzzz < C:\Users\zalcee\Desktop\zal.sql");
		// header("location:restore.php");
		// $dir = dirname(__FILE__);
		// $restore = $_FILES["restore_sql"]["name"];
		// echo $_FILES["restore_sql"]["name"];
		// $bin = 'C:\xampp\mysql\bin';
		// exec("cd '$bin'");
		// $path = 'D:\backup-10-10-2018-064702\ ';
		// exec("mysqldump -u root --password= zzzz < ".$path."".$restore." ");
		// echo $restore;
		// var_dump($_FILES["restore_sql"]);
		// realpath($_FILES["restore_sql"]["name"]);
		// echo pathinfo(path)($restore);
		// print_r($_FILES["restore_sql"]);
		// $path = trim("D:\ ");
		// $restore = $_FILES["restore_sql"]["name"];
		// $directory = explode(".", $restore);
		// exec("cd ".$path.$directory[0]);
		// exec("command");
		// $y = rtrim($restore, ".sql.zip");
		// echo "<h1 style=position:absolute; left:5vw;>".$x[0]."</h1>";
		// print_r($x);

	}

 ?>

 <div style="margin: 10% auto auto 45%; z-index: 999;">
 	<form action="db_backup_and_restore.php" method="post" enctype="multipart/form-data">
 		<input type="submit" name="backup_db" value="Backup Database" style="height: 4vw; font-weight: bold; border-radius: 10px;  ">
 	</form>
 	<form action="db_backup_and_restore.php" method="post" enctype="multipart/form-data">
 		
 		<input type="file" name="restore_sql" style="margin: 10% auto auto 5%;"><br>
 		<input type="submit" name="restore" value="Restore" style="height: 4vw; font-weight: bold; border-radius: 10px; margin-top: 10px;">
 	</form>
 </div>




<?php 

	if (isset($_GET["success"])) {
		?>
			<script type="text/javascript">
				alert("success");
			</script>
		<?php
	}

 ?>