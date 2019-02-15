<?php
require_once("../include/db_connection.php"); 
	require_once("../include/session.php");
	require_once("../include/function.php");

	if (isset($_POST["submit"])) {
		$filename = $_POST["filename"];
		$myfile = fopen("backup_db/".$filename.".php", "w") or die("Unable to open file!");
		// $line = readfile("line.txt");
		// $za = fwrite($myfile, $line);




		fclose($myfile);
	}
		// echo "Create file succesfully";


?>
<center style="position: relative; top:200px;">
	<form action="create.php" method="post">
		<input type="text" name="filename" style="height: 40px; width: 350px;" id="create">
		<input type="submit" name="submit" value="submit" style="height: 40px;">
	</form>

</center>



<script type="text/javascript">
	
	var x = document.getElementById("create");
	// x.replace("","_");


	x.onkeyup = function() {
		var y = x.value;
		var z = y.split(" ").join("_");
		x.value = z;
	}

	

</script>