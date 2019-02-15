<?php 
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	


	require_once("../include/function.php");



		$find = $_GET["find"];	
		$search = $_GET["search"];			
		$query = "SELECT item_id, item_picture, item_name, copyright_name, item_quantity, accession_number, isbn, description, author_name, donor_name FROM items_tbl ";
		$query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		$query .= "LEFT JOIN copyright_tbl ON items_tbl.copyright_id = copyright_tbl.copyright_id ";

		$query .= "LEFT JOIN donors_tbl ON items_tbl.donor_id = donors_tbl.donor_id ";
		$query .= "WHERE concat($search) LIKE '%$find%'";
		// $query .= "";
		$result = mysqli_query($connection, $query);
		// $row = mysqli_fetch_array($result);

		
		

		while ($row = mysqli_fetch_array($result)) {
			?>
				<div class="ref_container"> 
					<div>
						<?php 
							$image =  '<img width="200px" height="200px" src="images/'. $row["item_picture"] .'" id="item_pic">';
							if ($row["item_picture"] == "") {
								echo '<img width="200px" height="200px" src="../img/lasalliana_av.png" id="item_pic_no">';
							}
							else {
								echo $image;
							}

						 ?>
					</div>
					<div class="item-details">
						<?php 
							echo '<p style="font-size:19px;">'.$row["item_name"].'</p>';
							if ($row["author_name"] == "") {
								$author = "";
							}
							else {
								$author = '<p><b>Author: </b>'.$row["author_name"].'</p>';
							}
							if ($row["donor_name"] == "" || $row["donor_name"] == " ") {
								$donor = "";
							}
							else {
								$donor =  '<p><b>Donor: </b>'.$row["donor_name"].'</p>';
							}
							if ($row["isbn"] == null) {
								$isbn = "";
							}
							else {
								$isbn = '<p><b>ISBN: </b>'.$row["isbn"].'</p>';
							}
							if ($row["copyright_name"] == "" || $row["copyright_name"] == " " || $row["copyright_name"] == null) {
								$copyright = "";
							}
							else {
								$copyright = '<p>&copy '.$row["copyright_name"].'</p>';
							}
							echo $copyright;

							echo $isbn;
							echo $author;
							echo '<p><b>Quantity: </b>'.$row["item_quantity"].'</p>';
							echo $donor;
							if ($row["description"] == "") {
								$desc = "";
							}
							else {
								$desc = '<p style="width:480px; height:100px; line-height:15px;  "><b>Description: </b>'.$row["description"].'</p>';
							}
							echo $desc;

						 ?>
						 <div id="link">
						<a href="update_item.php?item_id=<?php echo $row["item_id"]; ?>" id="open_item" target="_blank">Update</a>
						<!-- </div>
						<div id="link"> -->
						<a href="../generate.php?item_number=<?php echo $row["item_id"]; ?>" id="open_item" target="_blank">Generate qr</a>
						</div>
					</div>
								
				</div>


				<?php
			
						}

?>

