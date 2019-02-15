<?php 
$header = "Update";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	include("../include/header.php");
	require_once("../include/function.php");

	
	


	if (isset($_POST["submit"])) {
		$item_id = $_GET["item_id"];
		$name = $_POST["name"];
		// $image = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
		$desc = $_POST["description"];
		$author = $_POST["author"];
		$donor = $_POST["donor"];
		$qty = $_POST["qty"];
		$accession_number = $_POST["accession_number"];
		$name = $_POST["name"];
		$category_id = $_GET["category"];
		$category_type = $_GET["category_number"];
		$category_sub_type_id = $_GET["sub_category"];
		// Upload image
		$image = $_FILES["image"]["name"];
		$tmp_image = $_FILES["image"]["tmp_name"];
		$fileExt = 	explode('.', $image);
		$fileActualExt = strtolower(end($fileExt));
		$fileNameNew = uniqid('', true).".".$fileActualExt;
		$target = "images/".$fileNameNew;

		// delete current image
		if ($image != "") {
			$query = "SELECT item_picture FROM ";
			$query .= "items_tbl WHERE item_id='$item_id'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$del_img = $row["item_picture"];
			$loc_img = "images/".$del_img;
			unlink($loc_img);
		}
		else {
			$query = "SELECT * FROM ";
			$query .= "items_tbl WHERE item_id='$item_id'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$image1 = $row["item_picture"];
			$fileNameNew = $image1;
			
			
		}

		if ($desc == "") {
			$query = "SELECT * FROM ";
			$query .= "items_tbl WHERE item_id='$item_id'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$desc = $row["description"];
		}


		// if ($donor == "") {
		// 	$query = "DELETE donor_id, donor_name ";
		// 	$query .= "FROM items_tbl ";
		// 	$query .= "LEFT JOIN donors_tbl ON items_tbl.donor_id = donors_tbl.donor_id ";
		// 	$query .= "WHERE item_id='$item_id'";
		// 	$result .= mysqli_query($connection, $query);
		// 	if ($result) {
		// 		
		// 	}
		// }
		

					// $query = "UPDATE items_tbl ";
					// $query .= "SET item_name='$name', item_quantity='$qty', item_picture='$fileNameNew', ";
					// $query .= "description='$desc', donor_id='$donor_id', author_id='$author_id', ";
					// $query .= "category_type_id='$category_type', category_id='$category_id', category_sub_type_id='$category_sub_type_id' ";
					// $query .= "WHERE item_id='$item_id'";
					// $result = mysqli_query($connection, $query);

		$query = "UPDATE ";
		$query .= "item_id, item_name, item_quantity, accession_number, item_picture, ";
		$query .= "description, donor_id, donor_name, author_id, author_name ";
		$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number' ";
		$query .= "item_picture='$fileNameNew', description='$desc' ";
		$query .= "FROM items_tbl ";
		$query .= "LEFT JOIN donors_tbl ON items_tbl.donor_id = donors_tbl.donor_id ";
		$query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		$query .= "WHERE item_id='$item_id'";
		$result = mysqli_query($connection, $query);
				

		if ($result) {
			move_uploaded_file($tmp_image, $target);
			redirect_to("update_item.php1?success");
		}
		else {
			echo '<h1>Fuck!!!!!</h1>';
		}

}

		
		
	

	if (isset($_GET["item_id"])) {

		// get item 
	$id = $_GET["item_id"];
	$query ="SELECT * FROM items_tbl ";
	$query .= "WHERE item_id='$id'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);

	// get from author
	$author_id = $row["author_id"];
	$query1 ="SELECT * FROM author_tbl ";
	$query1.= "WHERE author_id='$author_id'";
	$result1 = mysqli_query($connection, $query1);
	$row1 = mysqli_fetch_array($result1);


		?>
			<div id="add-reference-container">
			<div id="add-reference">
				<form action="update_item1.php?category_number=<?php echo $row["category_type_id"]; ?>&category=<?php echo $row["category_id"]; ?>&sub_category=<?php echo $row["category_sub_type_id"]; ?>&item_id=<?php echo $_GET["item_id"]; ?>" method="post" enctype="multipart/form-data">
					<!-- <input type="text" name="id_" value="<?php echo $_GET["item_id"]; ?>" style="display:none;"> -->
					<div class="inputBox-reference">
						<input type="text" name="name" value="<?php echo $row["item_name"]; ?>"  required= "">
						<label>Name</label>
					</div>
					<div class="inputBox-reference" >
						<input type="text" id="author" name="author" value="<?php echo $row1["author_name"]; ?>"  required= "">
						<label>Author</label>
					</div>

					<div class="inputBox-reference">
						<input type="number" name="qty" value="" id="quantity"  required= "">
						<label>Quantity</label>
					</div>
					<div class="inputBox-reference">
						<input type="number" name="accession_number" value="" id="accession"  required= "">
						<label>Accession Number</label>
					</div>
					<div class="inputBox-reference">
						<input type="text" name="donor" value=""  required= "" id="donor">
						<label>Donor</label>
					</div>
					<div class="inputBox-reference">
						<input type="date" name="date_donated" value=""  >
						<!-- <label>Donor</label> -->
					</div>


					<div class="inputBox-reference">
						<input type="file" name="image" value="images/<?php echo $row["item_picture"] ?>" style="border:none; margin-left: 20%;">
						<label style="margin-top:10px;  left: 0; font-size: 20px;">Image</label>
					</div>

					<div class="inputBox-reference">
						<textarea name="description" rows="5" cols="20" style="position:relative; width: 70%; left: 15%;  overflow: hidden; "></textarea>	
						<label style=" position:absolute; float: left; margin-left: 10%; z-index: 1; top: 73%; ">Description</label>
					</div>
					
					
					<center>
						 <input type="submit" name="submit" value="Submit" id="add_item">
						</center>
				</form>
			</div>
		</div>
		<?php
	}

	if (isset($_GET["success"])) {
		?>

		<center>
			<div style=" position: relative; a{text-decoration: none;}">
				<h3>Item update successfully</h3>
				<!-- <p>Add New?</p> -->
				
			</div>
		</center>


		<?php
	}

	if (isset($_GET["failed"])) {
		?>

		<center>
			<div style=" position: relative; a{text-decoration: none;}">
				<h3>Oops! update unsuccessful!!</h3>
				<!-- <p>Add New?</p> -->
				
			</div>
		</center>


		<?php
	}
 ?>

  <script type="text/javascript">
 	
 	// remove attribute for donor
	var add_item = document.getElementById("add_item");
	add_item.onclick = function() {
		document.getElementById("donor").removeAttribute("required");
		document.getElementById("author").removeAttribute("required");
		document.getElementById("quantity").removeAttribute("required");
		document.getElementById("accession").removeAttribute("required");
	}

	// validation add item
	var quantity =  document.getElementById("quantity");
	quantity.onkeyup = function() {
		if (quantity.value == "") {
			
			quantity.value = "";
		}
	}




 </script>