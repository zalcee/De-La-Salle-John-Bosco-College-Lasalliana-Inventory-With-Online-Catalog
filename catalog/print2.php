<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/print.css" media="print">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>


<?php 
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php");
	require_once("../include/function.php");

	

	if (isset($_GET["category_type_id"])) {
		$category_type_id = $_GET["category_type_id"];
	}
	else {
		$category_type_id = "";
	}

	if (isset($_GET["category_sub_type_id"])) {
		$category_sub_type_id = $_GET["category_sub_type_id"];
	}
	else {
		$category_sub_type_id = "";
	}
	if (isset($_GET["category_type_id"])) {
		$query = "SELECT item_name, item_quantity, author_name, accession_number FROM items_tbl ";
		$query .= "LEFT JOIN copyright_tbl ON items_tbl.copyright_id = copyright_tbl.copyright_id ";
		$query .= "LEFT JOIN donors_tbl ON items_tbl.donor_id = donors_tbl.donor_id ";
		$query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		$query .= "WHERE category_type_id='$category_type_id'";
		$result = mysqli_query($connection, $query);
		$accession = mysqli_fetch_array($result);

	}
	else {
		$query = "SELECT item_name, item_quantity, author_name, accession_number FROM items_tbl ";
		$query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		$query .= "WHERE category_sub_type_id='$category_sub_type_id'";
		$result = mysqli_query($connection, $query);
		$accession = mysqli_fetch_array($result);
	}
	?>
	<!-- <button onclick="print()" style="position:fixed; top:150px; left: 50px;">Print</button> -->
	<img src="../img/print.png" class="print" style="position:fixed; top:150px; left: 50px;  cursor: pointer; width="80px" height="80x;"  onclick="print()"  >
	<center>
		<h3 style="margin-bottom: -40px;">Life and works of saint La Salle</h3>
	</center>
	<table id="print">
		<tr>
			<th>Quantity</th>
			<th>Title</th>
			<?php if ($accession["accession_number"] == "" || $accession["accession_number"] == 0) {
				$third = "Author";
			}
			else {
				$third = "Accession Number";
			}

			?>
			<th><?php echo $third; ?></th>
		</tr>


	<?php
	if ($accession["accession_number"] == "" || $accession["accession_number"] == 0) {
		while ($row = mysqli_fetch_array($result)) {
		
			?>
			<tr>
				<td><p><?php echo $row["item_quantity"]; ?></p></td>
				<td><p><?php echo $row["item_name"]; ?></p></td>
				<td><p><?php echo $row["author_name"]; ?></p></td>
			</tr>
		<?php		
		}
	}
	else {
		while ($row = mysqli_fetch_array($result)) {
		
			?>
			<tr>
				<td><p><?php echo $row["item_quantity"]; ?></p></td>
				<td><p><?php echo $row["item_name"]; ?></p></td>
				<td><p><?php echo $row["accession_number"]; ?></p></td>
			</tr>
		<?php		
		}
	}
	?>
	</table>
	<?php

 ?>


</body>
</html>