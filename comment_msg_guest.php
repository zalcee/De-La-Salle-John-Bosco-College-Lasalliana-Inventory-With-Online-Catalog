<?php 
	require_once("include/db_connection.php"); 
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
					<input type="submit" name="submit_del" value="X" style="border:none; background-color: rgb(0,0,0,.0); color: red; position: relative; float: right; right: 30px; cursor: pointer;">
				</form>
				<p><?php echo $row["comment"]; ?></p>
			</li>	
			<?php } ?>