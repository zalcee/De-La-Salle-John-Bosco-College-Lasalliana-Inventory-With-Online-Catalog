<?php 
	$header = "Setup IP Address";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	include("../include/header.php");
	require_once("../include/function.php");
	$alert = "";
	if (isset($_POST["submit"])) {
		$first_octate = $_POST["first_octate"];
		$second_octate = $_POST["second_octate"];
		$third_octate = $_POST["third_octate"];
		$last_octate = $_POST["forth_octate"];
		$id = 1;

		$query = "UPDATE admin_settings ";
		$query .= "SET first_octate='$first_octate', second_octate='$second_octate', third_octate='$third_octate', last_octate='$last_octate' ";
		$query .= "WHERE id='$id'";
		$result = mysqli_query($connection, $query);
		if ($result) {
			$alert = "Your new ip for qr code is ".$first_octate.".".$second_octate.".".$third_octate.".".$last_octate;
		}
		else {
			$alert = "Something wrong!!";
		}
	}


	if (isset($_POST["submit_page"])) {
		$page = $_POST["page"];
		$id = 1;

		$query = "UPDATE admin_settings ";
		$query .= "SET number_of_pages='$page' ";
		$query .= "WHERE id='$id'";
		$result = mysqli_query($connection, $query);
		if ($result) {
			$alert = "Update Successfully";
		}
		else {
			$alert = "Something wrong!!";
		}
	}
?>
<center>
	<h3 style="top:40px; position: relative;"><?php echo $alert; ?></h3>
</center>
<div id="set_ip_container">
	<h3>IP Adress</h3>
	<form action="Settings.php" method="post">
		<input type="text" name="first_octate" maxlength="3" size="2" placeholder="192"><input type="text" name="second_octate" maxlength="3" size="2" placeholder="168"><input type="text" name="third_octate" maxlength="3" size="2" placeholder="1"><input type="text" name="forth_octate" maxlength="3" size="2" placeholder="1"><input type="submit" name="submit" value="Set IP">
	</form>
</div>

<div id="set_ip_container">
	<h3>Number Of Items per Page</h3>
	<form action="Settings.php" method="post">
		<input type="text" name="page" maxlength="3" size="2" placeholder="10"><input type="submit" name="submit_page" value="Set" style="height: 42px">
	</form>
</div>