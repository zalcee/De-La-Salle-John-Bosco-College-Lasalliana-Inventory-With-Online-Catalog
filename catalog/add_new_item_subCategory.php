<?php 
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	include("../include/header.php");
	require_once("../include/function.php");
	

	if (isset($_POST["ref_submit"])) {
		$name = $_POST["name"];
		$location = $_POST["location"];
		$category_id = $_GET["category"];
		$image = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
		$desc = $_POST["description"];
		$author = $_POST["author"];
		$qty = $_POST["qty"];
		$category_type = $_GET["category_number"];
		

		





		$query = "INSERT INTO items_tbl( ";
		$query .= "item_name, item_quantity, item_picture, description, location_id,  author, category_id, category_type_id) ";
		$query .= "VALUES('$name', '$qty', '$image', '$desc', '$location', '$author', '$category_id', '$category_type')";
		$query1 = "INSERT INTO references_tbl( ";
		$query1 .= "ref_author, ref_title, category_id) ";
		$query1 .= "VALUES('$author', '$name', '1')";
		$result = mysqli_query($connection, $query);
		$result1 = mysqli_query($connection, $query1);
		if ($result && $result1) {
			redirect_to("add_new_item.php?success");
		}
	}



	if (isset($_GET["category_number"])) {
		# code...
	

	
	?>
	
		<div id="add-reference-container">
			<div id="add-reference">
				<form action="add_new_item.php?category_number=<?php echo $_GET["category_number"].'&category='.$_GET["category"]; ?>" method="post" enctype="multipart/form-data">
					<div class="inputBox-reference">
						<input type="text" name="name" value=""  required= "">
						<label>Name</label>
					</div>

					<div class="inputBox-reference">
						<input type="text" name="author" value="" id="author" required= "">
						<label>Author</label>
					</div>

					<div class="inputBox-reference">
						<input type="number" name="qty" value=""  required= "">
						<label>Quantity</label>
					</div>
					<div class="inputBox-reference" style="margin-top: 10%;  ">
						<select name="location">
							<option value="0">0</option>
							<option value="1">1</option>
						</select>
						<label style="margin-top:30px; left: 0;">Location</label>
					</div>


					<div class="inputBox-reference">
						<input type="file" name="image" style="border:none; margin-left: 20%;">
						<label style="margin-top:10px;  left: 0; font-size: 20px;">Image</label>
					</div>

					
					
					
					
					
					<div class="inputBox-reference">
						<textarea name="description" rows="5" cols="20" style="position:relative; width: 70%; left: 15%;  overflow: hidden; "></textarea>	
						<label style=" position:absolute; float: left; margin-left: 10%; z-index: 1; top: 73%; ">Description</label>
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

			<center>
				<div class="">
					<h3>You successfully added new record</h3>
					<p>Do do want to add new item?</p>
					<a href="">Yes</a><a href="">No</a>
				</div>
			</center>


		<?php
	}

 ?>