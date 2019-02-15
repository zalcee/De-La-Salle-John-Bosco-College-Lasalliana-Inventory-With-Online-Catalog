<?php 

	
		
	
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	
	if (isset($_SESSION["start"])) {
	include("../include/header.php");

	require_once("../include/function.php");





?>
<div class="search">
	<input type="text" name="search-reference" placeholder="Search.."  id="search-item" onkeyup="find(this.value)">
</div>
<div id="option-container">
	<div id="head">
				
		<h1 style="color:white; ">+</h1>
					
	</div>
			<ul>
				<li>
					<a href="add_new_item.php?category_number=1">Add</a>
				</li>
				<li>
					<a href="../reference.php">Back to Category</a>
				</li>
				<li>
					<a href="../photos.php">Photos</a>
				</li>	
				<li>
					<a href="../antique.php">Antique</a>
				</li>
				<li>
					<a href="../archieves.php">Archieves</a>
				</li>
				<li>
					<a href="../antiquarian.php">Antiquarian</a>
				</li>
				<li>
					<a href="print.php?page=
					<?php if (!isset($_GET["page"])){ $page = ($_GET["page"]=1);} else { $page = $_GET["page"]; } echo $page;?> " target="_blank" id="printThis">print</a>
				</li>
				
			</ul>
</div>

	<div id="ref-container">
		
	</div>
			
	<?php 
		$result_per_page = 5;
		$table_name = "items_tbl";
		$category_type_id = 25;
		$address_link = "stampitas.php";
		list_of_items($result_per_page, $table_name, $category_type_id, $address_link);
	 ?>
			
			
				
</div>	
			
		<?php
	}
	else {
		header("location:../index.php");
	}



	
?>