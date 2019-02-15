<?php 
	$header = "Comments";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	include("../include/header.php");
	require_once("../include/function.php");
	$admin = "";
	if (isset($_POST["this_del"])) {
		$comment_id = $_POST["comment_id"];

		$query = "DELETE FROM comment_tbl ";
		$query .= "WHERE comment_id='$comment_id'";
		$result = mysqli_query($connection, $query);
	}

	if (isset($_POST["submit_msg"])) {
		$msg = $_POST["admin_msg"];
		$sender = $_POST["sender"];

		$query = "INSERT INTO comment_tbl( ";
		$query .= "sender, comment) ";
		$query .= "VALUES( ";
		$query .= "'$sender', '$msg')";
		$result = mysqli_query($connection, $query);
		if ($result) {
			
		}
		else {

		}
	}


	

	
?>

<div id="comment-container">
	<div  id="comment-header">
		<p>Comments</p>
	</div>
	<div id="sender-comment">
		<ul id="comment-msg">
			
		</ul>

	</div>

</div>
<div id="admin-comment">
	<form action="comment.php" method="post">
		<input type="text" name="sender" value="admin" style="display: none;">
		<textarea name="admin_msg"></textarea>
		<input type="submit" name="submit_msg" value="Send" >
	</form>
</div>



