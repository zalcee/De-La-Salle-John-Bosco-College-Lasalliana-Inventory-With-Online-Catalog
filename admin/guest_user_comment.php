<?php 
	$header = "";

	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	include("../include/header.php");
	require_once("../include/function.php");

	if (isset($_POST["submit_msg"])) {
		$msg = $_POST["admin_msg"];
		$sender = "Guest";
		if ($sender == "") {
			$sender = "Anonymous";
		}

		$query = "INSERT INTO comment_tbl( ";
		$query .= "sender, comment) ";
		$query .= "VALUES( ";
		$query .= "'$sender', '$msg')";
		$result = mysqli_query($connection, $query);
	}
?>

<div id="comment-container">
	<div  id="comment-header">
		<p>Comments</p>
	</div>
	<div id="sender-comment">
		<ul id="comment-msg">
			<?php 

				$query = "SELECT * ";
				$query .= "FROM comment_tbl ";
				$query .= "ORDER BY comment_id DESC";
				$result = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_array($result)) {
				if ($row["sender"] == "admin") {
					$admin = "admin";
				}
				else {
					$admin = "";
				}
				
			 ?>
			<li class="<?php echo $admin; ?>">
				<form action="comment.php" method="post">
					<input type="text" name="comment_id" value="<?php echo $row["comment_id"] ?>" style="display: none;">
					
				</form>	
				<p><?php echo $row["comment"]; ?></p>
			</li>	
			<?php } ?>
		</ul>	
	</div>

</div>
<div id="admin-comment">
	<form action="guest_user_comment.php" method="post">
		<!-- <label style="" yle="font-weight: bold;">Username: </label><input type="text" name="sender" style="position: relative; width: 250px; border-radius: 10px; height: 30px; margin: 3px 0 10px 0 ;"> -->
		<textarea name="admin_msg"></textarea>
		<input type="submit" name="submit_msg" value="Send" >
	</form>
</div>



