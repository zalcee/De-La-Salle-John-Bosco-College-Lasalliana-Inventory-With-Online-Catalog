<?php 
$header = "Admin Settings";
require_once("../include/db_connection.php"); 
require_once("../include/session.php"); 
include("../include/header.php");
require_once("../include/function.php"); 

if (isset($_GET["success"])) {
	?>
		<script type="text/javascript">
			alert("Success");
		</script>
	<?php
}

if (isset($_POST["submit"])) {
	$uname = $_POST["username"];
	$pass = password_encrypt($_POST["password"]);
	$fname = strtolower($_POST["fname"]);
	$lname = strtolower($_POST["lname"]);
	$id = 0;

	$query = "UPDATE admin_tbl SET";
	$query .= " username='{$uname}',";
	$query .= "password='{$pass}',";
	$query .= "fname='{$fname}',";
	$query .="lname='{$lname}'" ;
	$query .= "WHERE user_id='{$id}'";
	$result = mysqli_query($connection, $query);

	if ($result) {
		header("location:change_username_password.php?success");
	}
	else {

	}

}


if (isset($_POST['submit'])) {
	# code...
}
if (isset($_SESSION["start"])) {

require_once("../include/function.php");

$query = "SELECT * FROM admin_tbl";
$result = mysqli_query($connection, $query);
$rows = mysqli_fetch_array($result);

?>
	
<div id="edit-container">
	<div id="admin-settings">
		<form  action="change_username_password.php" method="post">
			<div class="inputBox">
				<input type="text" name="username" required="cv" value="<?php echo $rows["username"]; ?>">
				<label >Username</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password" required="dsfds" value="">
				<label >Password</label>
			</div>
			<div class="inputBox">
				<input type="text" name="fname" required="dsfds" value="<?php echo $rows["fname"]; ?>">
				<label >First Name</label>
			</div>
			<div class="inputBox">
				<input type="text" name="lname" required="dsfds" value="<?php echo $rows["lname"]; ?>">
				<label >Last Name</label>
			</div>
			<center>
				<input type="submit" name="submit" value="Submit">
			</center>
		</form>
	</div>
</div>

<?php
}		
 include("../include/footer.php"); 

?>