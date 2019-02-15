<?php 
	$header = "circular";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	if (isset($_SESSION["start"])) {
	include("../include/header.php");
	require_once("../include/function.php");

	$_query = "SELECT number_of_pages FROM admin_settings";
	$_result = mysqli_query($connection, $_query);
	$_num_page = mysqli_fetch_array($_result);


	$result_per_page = $_num_page[0];
	$table_name = "items_tbl";
	$category_type_id = 16;
	$address_link = "circular.php";
	$category_number = 1;
?>
<div class="search">
	<select id="slct">
		<option value="item_name">Item</option>
		<option value="author_name">Author</option>
		<option value="donor_name">Donor</option>
		<option value="isbn">ISBN</option>
		<option value="copyright_name">Copyright</option>
	</select><br>
	<input type="text" name="search-reference" placeholder="Search.."  id="search-item" onkeyup="find(this.value)">
</div>
<div id="option-container">
	<div id="head">		
		<h1 style="color:white; ">+</h1>				
	</div>
			<ul>
				<li>
					<a href="add_new_item.php?category_number=<?php echo $category_type_id; ?>&category=<?php echo $category_number; ?>&sub_category=">Add</a>
				</li>
				<li>
					<a href="../reference.php">Back to Category</a>
				</li>
				
				<li>
					<a href="print.php?page=
					<?php if (!isset($_GET["page"])){ $page = ($_GET["page"]=1);} else { $page = $_GET["page"]; } echo $page;?>&category_type_id=1 " target="_blank" id="printThis">print</a>
				</li>
				<li>
					<a href="print2.php?category_type_id=1" target="_blank">print all</a>
				</li>
				
			</ul>
	</div>

	<div id="ref-container">
		
	</div>
			
	<?php 
		
		list_of_items($result_per_page, $table_name, $category_type_id, $address_link);
	 ?>
			
			
				
</div>	
			
		<?php
	}
	else {
		header("location:../index.php");
	}



	
?>