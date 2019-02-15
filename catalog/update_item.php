<?php 
$header = "Update";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	include("../include/header.php");
	require_once("../include/function.php");

	
	


	if (isset($_POST["submit"])) {
		$item_id = 	$_GET["item_id"];
		// $name = $_POST["name"];
		// $image = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
		$desc = $_POST["description"];
		$author = $_POST["author"];
		$donor = $_POST["donor"];
		$copyright = $_POST["copyright"];
		$isbn = $_POST["isbn"];
		// $qty = $_POST["qty"];
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
		$accession_number = $_POST["accession_number"];

		// delete current image
		if ($image == "") {

			$query = "SELECT item_picture FROM ";
			$query .= "items_tbl WHERE item_id='$item_id'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$del_img = $row["item_picture"];
			if ($del_img == "") {
				$fileNameNew = "";
			}
			else {
				$loc_img = "images/".$del_img;
				unlink($loc_img);
				$fileNameNew = "";

				
			}
			

		}
		else {
			$image = $_FILES["image"]["name"];
		$tmp_image = $_FILES["image"]["tmp_name"];
		$fileExt = 	explode('.', $image);
		$fileActualExt = strtolower(end($fileExt));
		$fileNameNew = uniqid('', true).".".$fileActualExt;
		$target = "images/".$fileNameNew;
		$allowed = array("jpg", "jpeg", "png", "gif", "");

		if (!in_array($fileActualExt, $allowed)) {
		
			redirect_to("update.php?error=Invalid file extension");
			}	

		if ($fileActualExt == "") {
			$fileNameNew = "";
		}
			
			
		}

		if ($_POST["qty"] != 0) {
			$qty = $_POST["qty"];	
		}
		else {
			$query = "SELECT * FROM ";
			$query .= "items_tbl WHERE item_id='$item_id'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$qty = $row["item_quantity"];
		}


		if ($accession_number != 0 || $accession_number != "") {
			$accession_number = $_POST["accession_number"];
		}
		else {
			$query = "SELECT * FROM ";
			$query .= "items_tbl WHERE item_id='$item_id'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$accession_number = $row["accession_number"];
		}


		if ($isbn == " ") {
			$isbn = null;
		}


		// if ($desc == "") {
		// 	$query = "SELECT * FROM ";
		// 	$query .= "items_tbl WHERE item_id='$item_id'";
		// 	$result = mysqli_query($connection, $query);
		// 	$row = mysqli_fetch_array($result);
		// 	$desc = $row["description"];
		// }
		// else {
		// 	$desc;
		// }


		// Check copyright
		if ($copyright) {		
			
			$copyright_check = "SELECT * FROM copyright_tbl WHERE copyright_name='$copyright'";
			$copyright_result = mysqli_query($connection, $copyright_check);
			if (mysqli_num_rows($copyright_result) > 0) {
				$id = mysqli_fetch_array($copyright_result);
				$copyright_id = $id["copyright_id"];
			}
			else {
				if ($copyright == " ") {
					$copyright = null;
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
		}
		else {
			$copyright_id = "";
		}



		// Check author
		
			if ($author) {
			

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
		


		// Check if donor is existing
		if ($donor) {


			$donor_check = "SELECT * FROM donors_tbl WHERE donor_name='$donor'";
			$donor_check_result = mysqli_query($connection, $donor_check);
			if (mysqli_num_rows($donor_check_result) > 0) {
				$id_ = mysqli_fetch_array($donor_check_result);
				$donor_id = $id_["donor_id"];
				?>
					<script type="text/javascript">
						alert("<?php echo $donor_id; ?>");
					</script>
				<?php
			}
			else {
				redirect_to("hell");
				
				$donor_query = "INSERT INTO donors_tbl( ";
				$donor_query .= "donor_name) ";
				$donor_query .= "VALUES('$donor')";
				$donor_result = mysqli_query($connection, $donor_query);
				if ($donor_result) {
					$donor_check = "SELECT * FROM donors_tbl WHERE donor_tbl='$donor'";
					$donor_check_result = mysqli_query($connection, $donor_check);
					$row = mysqli_fetch_array($donor_check_result);
					$donorr_id = $row["donor_id"];
				
				}

			}

			

		}
		else {
			$donor_id = "";
		}
		

		if ($category_sub_type_id == 0) {

			if ($donor == "") {
				if ($author == "") {
					if ($copyright == "") {
						$query = "UPDATE items_tbl ";
					$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', isbn='$isbn', ";
					$query .= "description='$desc' ";
					$query .= "WHERE item_id='$item_id'";
					$result = mysqli_query($connection, $query);
					
					}
					else {
						$query = "UPDATE items_tbl ";
					$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', copyright_id='$copyright_id', isbn='$isbn', ";
					$query .= "description='$desc', ";
					$query .= "WHERE item_id='$item_id'";
					$result = mysqli_query($connection, $query);
					}
					
				}
				else {
					if ($copyright == "") {
						$query = "UPDATE items_tbl ";
					$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', isbn='$isbn',  ";
					$query .= "description='$desc', author_id='$author_id' ";
					$query .= "WHERE item_id='$item_id'";
					$result = mysqli_query($connection, $query);
					}
					else {
						$query = "UPDATE items_tbl ";
					$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', copyright_id='$copyright_id', isbn='$isbn',  ";
					$query .= "description='$desc', author_id='$author_id' ";
					$query .= "WHERE item_id='$item_id'";
					$result = mysqli_query($connection, $query);
					}
				}
			}
			else {
				if ($author == "") {
					if ($copyright == "") {
						$query = "UPDATE items_tbl ";
					$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', isbn='$isbn',  ";
					$query .= "description='$desc', donor_id='$donor_id' ";
					$query .= "WHERE item_id='$item_id'";
					$result = mysqli_query($connection, $query);
					$result = mysqli_query($connection, $query);
					}
					else {
						$query = "UPDATE items_tbl ";
					$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', ";
					$query .= "description='$desc', donor_id='$donor_id', copyright_id='$copyright_id', isbn='$isbn'  ";
					$query .= "WHERE item_id='$item_id'";
					$result = mysqli_query($connection, $query);
					}
				}
				else {
					if ($copyright == "") {
						$query = "UPDATE items_tbl ";
					$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', isbn='$isbn' ";
					$query .= "description='$desc', donor_id='$donor_id', author_id='$author_id', ";
					$query .= "WHERE item_id='$item_id'";
					$result = mysqli_query($connection, $query);
					}
					else {
						$query = "UPDATE items_tbl ";
					$query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', copyright_id='$copyright_id', isbn='$isbn' ";
					$query .= "description='$desc', donor_id='$donor_id', author_id='$author_id', ";
					$query .= "WHERE item_id='$item_id'";
					$result = mysqli_query($connection, $query);
					}
				}
			}
		}
		else {
			if ($donor == "") {
				if ($author == "") {
					if ($copyright == "") {
						// $query = "UPDATE items_tbl ";
						// $query .= "SET item_name='$name', item_quantity='$qty', accession_number='$accession_number', item_picture='$fileNameNew', isbn='$isbn', ";
						// $query .= "description='$desc', ";
						// $query .= "category_type_id='$category_type', category_id='$category_id', $category_sub_type_id='$category_sub_type_id' ";
						// $query .= "WHERE item_id='$item_id'";
						// $result = mysqli_query($connection, $query);
						$query = "UPDATE items_tbl SET ";
						$query .= "item_name='$name', item_picture='$fileNameNew', isbn='$isbn', item_quantity='$qty', ";
						$query .= "accession_number='$accession_number' ";
						$query .= "WHERE item_id='$item_id'";
						$result = mysqli_query($connection, $query);
					}
					else {
						$query = "UPDATE items_tbl SET ";
						$query .= "item_name='$name', item_picture='$fileNameNew', copyright_id='$copyright_id', isbn='$isbn', item_quantity='$qty', ";
						$query .= "accession_number='$accession_number ";
						$query .= "WHERE item_id='$item_id'";
						$result = mysqli_query($connection, $query);
					}
				}
				else {
					if ($copyright == "") {
						$query = "UPDATE items_tbl SET ";
						$query .= "item_name='$name', item_picture='$fileNameNew', isbn='$isbn', item_quantity='$qty', author_id='$author_id', ";
						$query .= "accession_number='$accession_number' ";
						$query .= "WHERE item_id='$item_id'";
						$result = mysqli_query($connection, $query);
					}
					else {
						$query = "UPDATE items_tbl SET ";
						$query .= "item_name='$name', item_picture='$fileNameNew', copyright_id='$copyright_id', isbn='$isbn', item_quantity='$qty', author_id='$author_id', ";
						$query .= "accession_number='$accession_number' ";
						$query .= "WHERE item_id='$item_id'";
						$result = mysqli_query($connection, $query);
					}
				}
			}
			else {
				if ($author == "") {
					if ($copyright == "") {
						$query = "UPDATE items_tbl SET ";
						$query .= "item_name='$name', item_picture='$fileNameNew', isbn='$isbn', item_quantity='$qty', donor_id='$donor_id', ";
						$query .= "accession_number='$accession_number' ";
						$query .= "WHERE item_id='$item_id'";
						$result = mysqli_query($connection, $query);
					}
					else {
						$query = "UPDATE items_tbl SET ";
						$query .= "item_name='$name', item_picture='$fileNameNew', copyright_id='$copyright_id', isbn='$isbn', item_quantity='$qty', donor_id='$donor_id', ";
						$query .= "accession_number='$accession_number' ";
						$query .= "WHERE item_id='$item_id'";
						$result = mysqli_query($connection, $query);
					}
				}

				else {
					if ($copyright == "") {
						$query = "UPDATE items_tbl SET ";
						$query .= "item_name='$name', item_picture='$fileNameNew', isbn='$isbn', item_quantity='$qty', donor_id='$donor_id', author_id='$author_id' ";
						$query .= "accession_number='$accession_number' ";
						$query .= "WHERE item_id='$item_id'";
						$result = mysqli_query($connection, $query);
					}
					else {
						$query = "UPDATE items_tbl SET ";
						$query .= "item_name='$name', item_picture='$fileNameNew', copyright_id='$copyright_id', isbn='$isbn', item_quantity='$qty', donor_id='$donor_id', author_id='$author_id' ";
						$query .= "accession_number='$accession_number' ";
						$query .= "WHERE item_id='$item_id'";
						$result = mysqli_query($connection, $query);
					}
				}
			}
		}

		if ($result) {
			move_uploaded_file($tmp_image, $target);
			redirect_to("update_item.php?success");
		}

		
}

		

		// if ($result) {
		// 	move_uploaded_file($tmp_image, $target);
		// 	redirect_to("update_item.php?success");
		// }
		
	

	if (isset($_GET["item_id"])) {

		// get item 
	$id = $_GET["item_id"];
	$query ="SELECT * FROM items_tbl ";
	$query .= "WHERE item_id='$id'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);

	// get from author
	// $author_id = $row["author_id"];
	// $query1 ="SELECT * FROM author_tbl ";
	// $query1.= "WHERE author_id='$author_id'";
	// $result1 = mysqli_query($connection, $query1);
	// $row1 = mysqli_fetch_array($result1);


		?>
			<div id="add-reference-container">
			<div id="add-reference">
				<form action="update_item.php?category_number=<?php echo $row["category_type_id"]; ?>&category=<?php echo $row["category_id"]; ?>&sub_category=<?php echo $row["category_sub_type_id"]; ?>&item_id=<?php echo $_GET["item_id"]; ?>" method="post" enctype="multipart/form-data">
					<!-- <input type="text" name="id_" value="<?php echo $_GET["item_id"]; ?>" style="display:none;"> -->
					<div class="inputBox-reference">
						<input type="text" name="name" value="<?php echo $row["item_name"]; ?>"  required= "">
						<label>Name</label>
					</div>
					<div class="inputBox-reference" >
						<input type="text" id="author" name="author" value=""  required= "">
						<label>Author</label>
					</div>

					<div class="inputBox-reference">
						<input type="number" name="qty" value="" id="quantity"  required= "" onkeydown='return (event.which >= 48 && event.which <= 57) 
   || (event.which == 8) || (event.which == 46) || (event.which == 37) || (event.which == 39) || (event.which == 9) || (event.which == 32)'>
						<label>Quantity</label>
					</div>
					<div class="inputBox-reference">
						<input type="number" name="accession_number" value="" id="accession"  required= "" onkeydown='return (event.which >= 48 && event.which <= 57) 
   || (event.which == 8) || (event.which == 46) || (event.which == 37) || (event.which == 39) || (event.which == 9) || (event.which == 32)'>
						<label>Accession Number</label>
					</div>
					<div class="inputBox-reference">
						<input type="text" name="donor" value=""  required= "" id="donor" >
						<label>Donor</label>
					</div>

					<div class="inputBox-reference">
						<input type="text" name="copyright" value="" required="" id="copyright" >
						<label>Copyright</label>
					</div>

					<div class="inputBox-reference">
						<input type="number" name="isbn" value="" required="" id="isbn" onkeydown='return (event.which >= 48 && event.which <= 57) 
   || (event.which == 8) || (event.which == 46) || (event.which == 37) || (event.which == 39) || (event.which == 9) || (event.which == 32)'>
						<label>ISBN</label>
					</div>


					<div class="inputBox-reference">
						<input type="file" name="image" value="images/<?php echo $row["item_picture"] ?>" style="border:none; margin-left: 20%;">
						<label style="margin-top:10px;  left: 0; font-size: 20px;">Image</label>
					</div>

					<div class="inputBox-reference">
						<textarea name="description" rows="5" cols="20" style="position:relative; width: 70%; left: 15%;  overflow: hidden; "></textarea>	
						<label style=" position:absolute; float: left; margin-left: 10%; z-index: 1; top: 80%; ">Description</label>
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
		document.getElementById("isbn").removeAttribute("required");
		document.getElementById("copyright").removeAttribute("required");
	}

	// validation add item
	var quantity =  document.getElementById("quantity");
	quantity.onkeyup = function() {
		if (quantity.value == "") {
			
			quantity.value = "";
		}
	}




 </script>