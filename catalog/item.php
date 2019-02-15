<?php 
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	// if (isset($_SESSION["start"])) {
	include("../include/header.php");
	require_once("../include/function.php");


	$item_id = $_GET["id"];
	$query = "SELECT * FROM items_tbl ";
	$query .= "WHERE item_id=".$item_id."";
	$result = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_array($result)) {
		?>	
		

			
			<div class="more-details">
				<div class="item_detail">
				<?php 
					
					echo '<center><img width="200px" height="200px" src="data:image;base64,'.$row["item_picture"].'" ></center>';
					echo '<b><p>Item id: '.$row["item_id"].'</p></b>';
					echo '<b><p>'.$row["item_name"].'</p></b>';
					echo '<p>'.$row["author"].'</p>';
					echo '<p><b>Quantity:</b> '.$row["item_quantity"].'</p>';
					echo '<p>'.ucfirst($row["description"]).'</p>';
				 ?>
			</div>
			</div>
			<button onclick="print()" class="print" >print</button>
			<a href="update_item.php?item_id=<?php echo $_GET["id"]; ?>"><button class="print" >update</button></a>
		<?php
	}

	// }
	// else {
	// 	header("location:../index.php");
	// }
?>