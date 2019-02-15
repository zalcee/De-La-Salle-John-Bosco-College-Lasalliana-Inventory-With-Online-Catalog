<?php 
  $username = "";
  if (isset($_POST['submit'])) {	
    $uname = $_POST['username'];
  	$pass = $_POST['password'];
  	$query = mysqli_query($connection, "SELECT * FROM admin_tbl WHERE uname='$uname' AND pass='$pass'");
  	$rows = mysqli_num_rows($query);
  	if ($rows == 1) {
      $_SESSION['admin_name'] = $uname;
  		header("location: main.php");
  	}
  	else {      
  	}
  }
?>

