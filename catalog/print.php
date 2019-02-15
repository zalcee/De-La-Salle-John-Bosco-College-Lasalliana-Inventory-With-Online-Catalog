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

		
		
		if (!isset($_GET["category_type_id"])) {
			$category_type_id = "";
		}
		else {
			$category_type_id = $_GET["category_type_id"];
		}

		if (isset($_GET["category_sub_type_id"])) {
			$category_sub_type_id = $_GET["category_sub_type_id"];
		}
		else {
			$category_sub_type_id = "";
		}

		$_query = "SELECT number_of_pages FROM admin_settings";
		$_result = mysqli_query($connection, $_query);
		$_num_page = mysqli_fetch_array($_result);

		$result_per_page = $_num_page[0];

		if (isset($_GET["category_type_id"])) {
			$query = "SELECT * ";
			$query .= "FROM items_tbl WHERE category_type_id='$category_type_id'";
			$result = mysqli_query($connection, $query);
			$number_of_results = mysqli_num_rows($result);
			$number_of_pages = ceil($number_of_results/$result_per_page);
		}
		else {
			$query = "SELECT * ";
			$query .= "FROM items_tbl WHERE category_sub_type_id='$category_sub_type_id'";
			$result = mysqli_query($connection, $query);
			$number_of_results = mysqli_num_rows($result);
			$number_of_pages = ceil($number_of_results/$result_per_page);
		}

		


		if (!isset($_GET["page"])) {
			$page = ($_GET["page"]=1);
		}
		else {
			$page = $_GET["page"];
		}

		$this_page_per_result = ($page-1)*$result_per_page;
		
		if (isset($_GET["category_type_id"])) {
			$query = "SELECT item_name, item_quantity, author_name FROM items_tbl ";
		$query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		$query .= "WHERE category_type_id='$category_type_id' ";
			$query .= "LIMIT " .$this_page_per_result . ",".$result_per_page;
			$result = mysqli_query($connection, $query);
		}
		else {
			$query = "SELECT * ";
			$query .= "FROM items_tbl ";
			$query .= "WHERE category_sub_type_id='$category_sub_type_id' ";
			$query .= "LIMIT " .$this_page_per_result . ",".$result_per_page;
			$result = mysqli_query($connection, $query);
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
					<th>Author</th>
				</tr>
			
		<?php
		while ($row = mysqli_fetch_array($result)) {
			?>
				<tr>
					<td><p><?php echo $row["item_quantity"]; ?></p></td>
					<td><p><?php echo $row["item_name"]; ?></p></td>
					<td><p><?php echo $row["author_name"]; ?></p></td>
				</tr>

			<?php
		}

		?>
			</table>
		<?php


 ?>


</body>
</html>