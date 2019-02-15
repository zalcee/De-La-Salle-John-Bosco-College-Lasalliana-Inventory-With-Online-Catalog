<style type="text/css">
	p {
		/*margin: 0;*/
	}
</style>
<?php
	$header = "";
	require_once("include/db_connection.php"); 
	require_once("include/session.php"); 
	require_once("include/function.php");
	include("include/header.php");

	$item_id = $_GET["item_number"];

	// $query = "SELECT * FROM items_tbl ";
	// $query .= "WHERE item_id=".$item_id."";
	// $result = mysqli_query($connection, $query);


		// $query = "SELECT item_id, item_picture, item_name, item_quantity, description, author_name, donor_name, category_id, category_type_id, category_sub_type_id FROM items_tbl ";
		// $query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		// $query .= "LEFT JOIN donors_tbl ON items_tbl.donor_id = donors_tbl.donor_id ";
		// $query .= "WHERE item_id=".$item_id."";
		// $result = mysqli_query($connection, $query);
		// $row

		$query = "SELECT item_id, item_picture, item_name, item_quantity, description, author_name, donor_name, category_id FROM items_tbl ";
		$query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		$query .= "LEFT JOIN donors_tbl ON items_tbl.donor_id = donors_tbl.donor_id ";
		$query .= "WHERE item_id=".$item_id."";
		$result = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_array($result)) {
		
		$image =  '<center><img width="200px" height="200px" src="catalog/images/'.$row["item_picture"].'" id="item_pic"></center>';
							if ($row["item_picture"] == "") {
								echo '<center><img width="200px" height="200px" src="img/lasalliana_av.png" id="item_pic_no"></center>';
							}
							else {
								echo $image;
							}

		echo "<center><p><b>Title: </b><br>".$row["item_name"]."</p></center>";	
		echo "<center><p><b>Quantity: <br></b>".$row["item_quantity"]."</p></center>";
		if ($row["description"] == "") {
			$des ="";
		}
		else {
			$des = "<center><p><b>Description: <br></b>".$row["description"]."</p></center>";
		}
		
		if ($row["author_name"] == "") {
			$author = "";
		}
		else {
			$author = "<center><p><b>Author: <br></b>".$row["author_name"]."</p></center>";
		}
		if ($row["donor_name"] == "") {
			$donor = "";
		}
		else {
			$donor = "<center><p><b>Donor: <br></b>".$row["donor_name"]."</p></center>";
		}
		$category_ = array("", "Antique", "Reference", "Antiquarian", "Archives", "Photos" );

		if ($row["category_id"] == "") {
		$category = "<center><b>location</	b><p>".$category_[$row["category_id"]]."</p></center>";
		}
		else {
			if ($row["category_id"] != "") {
				$category = "<center><b>location</b><p>".$category_[$row["category_id"]]."</p></center>";
			}
			else {
				$category = "<center><p><b>location&nbsp</b>".$category_[$row["category_id"]]."</p></center>";
			}
		}
		echo $des;
		echo $author;
		echo $donor;
		echo "<center><a href=admin/guest_user_comment.php style=text-decoration:none; text-align:center; float:center;  >Feedback</a></center>";
		echo "<br>";
		echo $category;


	}



?>

