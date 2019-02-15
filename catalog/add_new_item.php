	<?php 
	$header = "Add new Item";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	include("../include/header.php");
	require_once("../include/function.php");

	if (isset($_POST["ref_submit"])) {
		$name = $_POST["name"];
		if (isset($name)) {
			
			$item_check = "SELECT * FROM items_tbl WHERE item_name='$name'";
			$item_result = mysqli_query($connection, $item_check);
			if (mysqli_num_rows($item_result) > 0) {
				redirect_to("add_new_item.php?existing&error= Item already exist");
			} 
		}

		
		
		// $image = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
		$desc = $_POST["description"];
		$author = $_POST["author"];
		$copyright = $_POST["copyright"];
		$qty = $_POST["qty"];
		$accession_number = $_POST["accession_number"];
		$category_id = $_GET["category"];
		$category_type = $_GET["category_number"];
		$category_sub_type_id = $_GET["sub_category"];
		$isbn = $_POST["isbn"];
		// Upload image
		
		
		$image = $_FILES["image"]["name"];
		$tmp_image = $_FILES["image"]["tmp_name"];
		$fileExt = 	explode('.', $image);
		$fileActualExt = strtolower(end($fileExt));
		$fileNameNew = uniqid('', true).".".$fileActualExt;
		$target = "images/".$fileNameNew;
		$allowed = array("jpg", "jpeg", "png", "gif", "");

		if (!in_array($fileActualExt, $allowed)) {
		
			redirect_to("add_new_item.php?existing&error=Invalid file extension");
			}	

		if ($fileActualExt == "") {
			$fileNameNew = "";
		}

		// Check copyright
		if (isset($copyright)) {
		
			$copyright_check = "SELECT * FROM copyright_tbl WHERE copyright_name='$copyright'";
			$copyright_result = mysqli_query($connection, $copyright_check);
			if (mysqli_num_rows($copyright_result) > 0) {
				$id = mysqli_fetch_array($copyright_result);
				$copyright_id = $id["copyright_id"];
			}
			else {
				$copyright_query = "INSERT INTO copyright_tbl( ";
				$copyright_query .= "copyright_name) ";
				$copyright_query .= "VALUES('$copyright')";
				$copyright_result = mysqli_query($connection, $copyright_query);
				if ($copyright_result) {
					$copyright_check = "SELECT * FROM copyright_tbl WHERE copyright_name='$copyright'";
					$copyright_result2 = mysqli_query($connection, $copyright_check);
					$id_ = mysqli_fetch_array($copyright_result2);
					$copyright_id = $id_["copyright_id"];
				}	
			}
		}
		else {
			$copyright_id = "";
		}
		



		if ($isbn == "") {
			$isbn = null;
		}
		
		
		// check if donor is existing
		if (isset($_POST["donor"])) {
			$donor = $_POST["donor"];
			$donor_check = "SELECT * FROM donors_tbl WHERE donor_name='$donor'";
			$donor_result = mysqli_query($connection, $donor_check);
			if (mysqli_num_rows($donor_result) > 0) {
				$id = mysqli_fetch_array($donor_result);
				$donor_id = $id["donor_id"];
			} 
			else {

				$donor_query = "INSERT INTO donors_tbl( ";
				$donor_query .= "donor_name) ";
				$donor_query .= "VALUES('$donor')";
				$donor_result = mysqli_query($connection, $donor_query);
				if ($donor_result) {
					$donor_check = "SELECT * FROM donors_tbl WHERE donor_name='$donor'";
					$donor_result = mysqli_query($connection, $donor_check);
					$id = mysqli_fetch_array($donor_result);
					$donor_id = $id["donor_id"];
				}
			}
		}
		else {
			$donor_id = "";
		}

		// Check author if existing

		if (isset($author)) {
			$author_check = "SELECT * FROM author_tbl WHERE author_name='$author'";
			$author_check_result = mysqli_query($connection, $author_check);
			if (mysqli_num_rows($author_check_result) > 0) {
				$id_ = mysqli_fetch_array($author_check_result);
				$author_id = $id_["author_id"];
			}
			else {
				$author_query = "INSERT INTO author_tbl( ";
				$author_query .= "author_name) ";
				$author_query .= "VALUES('$author')";
				$author_result = mysqli_query($connection, $author_query);
				if ($author_result) {
					$author_check = "SELECT * FROM author_tbl WHERE author_name='$author'";
					$author_check_result = mysqli_query($connection, $author_check);
					$row = mysqli_fetch_array($author_check_result);
					$author_id = $row["author_id"];
				}

			}
		}
		else {
			$author_id = "";
		}


		if ($category_sub_type_id == 0) {
			// header("location:'$donor_id$author_id'.php");
			if ($_POST["donor"] == "") {
				if ($author == "") {
					$query = "INSERT INTO items_tbl( ";
					$query .= "item_name, item_quantity, accession_number, item_picture, description, category_id, category_type_id, copyright_id, isbn) ";
					$query .= "VALUES('$name', '$qty', '$accession_number', '$fileNameNew', '$desc', '$category_id', '$category_type', '$copyright_id', '$isbn')";
					$result = mysqli_query($connection, $query);
					move_uploaded_file($tmp_image, $target);
				}
				else {
					$query = "INSERT INTO items_tbl( ";
					$query .= "item_name, item_quantity, accession_number, item_picture, description, author_id, category_id, category_type_id, copyright_id, isbn) ";
					$query .= "VALUES('$name', '$qty', '$accession_number', '$fileNameNew', '$desc', '$author_id', '$category_id', '$category_type', '$copyright_id', '$isbn')";
					$result = mysqli_query($connection, $query);
					
					move_uploaded_file($tmp_image, $target);
				}
				
			} 
			else {
				if ($author = "") {
					$query = "INSERT INTO items_tbl( ";
					$query .= "item_name, item_quantity, accession_number, item_picture, description, donor_id, category_id, category_type_id, category_sub_type_id, copyright_id, isbn) ";
					$query .= "VALUES('$name', '$qty', '$accession_number', '$fileNameNew', '$desc', '$donor_id', '$category_id', '$category_type', '$category_sub_type_id', '$copyright_id', '$isbn')";
					
					$result = mysqli_query($connection, $query);
					move_uploaded_file($tmp_image, $target);
				}	
				else {
					$query = "INSERT INTO items_tbl( ";
					$query .= "item_name, item_quantity, accession_number, item_picture, description, donor_id, author_id, category_id, category_type_id, copyright_id, isbn) ";
					$query .= "VALUES('$name', '$qty', '$accession_number', '$fileNameNew', '$desc', '$donor_id', '$author_id', '$category_id', '$category_type', $copyright_id, '$isbn')";					
					$result = mysqli_query($connection, $query);
					move_uploaded_file($tmp_image, $target);
				}
			}
			
		}


		else {

			if ($_POST["donor"] == "") {
				if ($author == "") {
					$query = "INSERT INTO items_tbl( ";
					$query .= "item_name, item_quantity, accession_number, item_picture, description, category_type_id, category_sub_type_id, copyright_id, isbn) ";
					$query .= "VALUES('$name', '$qty', '$accession_number', '$fileNameNew', '$desc', '$category_type', '$category_sub_type_id', '$copyright_id', '$isbn')";
					$result = mysqli_query($connection, $query);
					move_uploaded_file($tmp_image, $target);
				}
				else {
					$query = "INSERT INTO items_tbl( ";
					$query .= "item_name, item_quantity, accession_number, item_picture, description, author_id, category_type_id, category_sub_type_id, copyright_id, isbn) ";
					$query .= "VALUES('$name', '$qty', '$accession_number', '$fileNameNew', '$desc', '$author_id', '$category_type', '$category_sub_type_id', '$copyright_id', '$isbn')";
					$result = mysqli_query($connection, $query);
					move_uploaded_file($tmp_image, $target);
				}
				
			} 
			else {
				if ($author == "") {
					$query = "INSERT INTO items_tbl( ";
					$query .= "item_name, item_quantity, accession_number, item_picture, description, donor_id, category_type_id, category_sub_type_id, copyright_id, isbn) ";
					$query .= "VALUES('$name', '$qty', '$accession_number', '$fileNameNew', '$desc', '$donor_id', '$category_type', '$category_sub_type_id', '$copyright_id', '$isbn')";
					$result = mysqli_query($connection, $query);
					
					move_uploaded_file($tmp_image, $target);
				}
				else {
					$query = "INSERT INTO items_tbl( ";
					$query .= "item_name, item_quantity, accession_number, item_picture, description, donor_id, author_id, category_type_id, category_sub_type_id, copyright_id, isbn) ";
					$query .= "VALUES('$name', '$qty', '$accession_number', '$fileNameNew', '$desc', '$donor_id', '$author_id', '$category_type', '$category_sub_type_id', '$copyright_id', '$isbn')";
					$result = mysqli_query($connection, $query);
					
					move_uploaded_file($tmp_image, $target);
				}
			}	

		}

		




		if ($result) {
			// redirect_to("add_new_item.php?success");
			?>
				<script type="text/javascript">
					alert("Successfully added");
				</script>


			<?php

			
		}
	
}


	if (isset($_GET["category_number"])) {
		
	

	
	?>	
			
	
		<div id="add-reference-container">
			<div id="add-reference">
				<form action="add_new_item.php?category_number=<?php echo $_GET["category_number"].'&category='.$_GET["category"].'&sub_category='.$_GET["sub_category"]; ?>" method="post" enctype="multipart/form-data">
					<div class="inputBox-reference">
						<input type="text" name="name" value=""  required= "">
						<label>Name</label>
					</div>

					<div class="inputBox-reference">
						<input type="text" name="author" value="" id="author" required= "">
						<label>Author</label>
					</div>

					<div class="inputBox-reference">
						<input type="number" name="qty" value=""  required= "" id="quantity" onkeydown='return (event.which >= 48 && event.which <= 57) 
   || (event.which == 8) || (event.which == 46) || (event.which == 37) || (event.which == 39) || (event.which == 9)'>
						<label>Quantity</label>
					</div>
					<div class="inputBox-reference">
						<input type="number" name="accession_number" value="" id="accession"  required= "" onkeydown='return (event.which >= 48 && event.which <= 57) 
   || (event.which == 8) || (event.which == 46) || (event.which == 37) || (event.which == 39) || (event.which == 9)'>
						<label>Accession Number</label>
					</div>

					<div class="inputBox-reference">
						<input type="text" name="donor" value=""  required= "" id="donor">
						<label>Donor</label>
					</div>
					<div class="inputBox-reference">
						<input type="text" name="copyright" value="" required="" id="copyright" >
						<label>Copyright</label>
					</div>

					<div class="inputBox-reference">
						<input type="number" name="isbn" value="" required="" id="isbn" onkeydown='return (event.which >= 48 && event.which <= 57) 
   || (event.which == 8) || (event.which == 46) || (event.which == 37) || (event.which == 39) || (event.which == 9)'>
						<label>ISBN</label>
					</div>

					<div class="inputBox-reference">
						<input type="file" name="image" style="border:none; margin-left: 20%;">
						<label style="margin-top:10px;  left: 0; font-size: 20px;">Image</label>
					</div>

					
					
					
					
					
					<div class="inputBox-reference">
						<textarea name="description" rows="5" cols="20" style="position:relative; width: 70%; left: 15%;  overflow: hidden; "></textarea>	
						<label style=" position:absolute; float: left; margin-left: 10%; z-index: 1; top: 80%; ">Description</label>
					</div>
					
					
					<center>
						 <input type="submit" name="ref_submit" value="Submit" id="add_item">
						</center>
				</form>
			</div>
		</div>
	

<?php 
	}
	if (isset($_GET["success"])) {
		?>

			<!-- <center>
				<div style=" position: relative; a{text-decoration: none;}">
					<h3>Item Successfully added</h3> -->
					<!-- <p>Add New?</p>
					
				</div>
			</center> -->
			
		<?php
	}


	if (isset($_GET["existing"])) {
		?>

			<center>
				<div style=" position: relative; a{text-decoration: none;}">
					<h3><?php echo $_GET["error"]."!!"; ?></h3>
					<!-- <p>Add New?</p> -->
					<!-- <a href="../main.php" style="text-decoration: none;">Exit</a> -->
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
		document.getElementById("copyright").removeAttribute("required");
		document.getElementById("isbn").removeAttribute("required");
	}

	// validation add item
	var quantity =  document.getElementById("quantity");
	quantity.onkeyup = function() {
		if (quantity.value == "") {
			
			quantity.value = "";
		}
	}




 </script>