<?php 

	

	function login() {
		?>
			<div id="box-container">
				<div id="box">
					<img src="img/close.png" id="close" onclick="closeBox()" onmouseover="hover(this)" onmouseout="unhover(this)">
					<h2>login</h2>
					
					<form  action="index.php" method="post">
						<div class="inputBox">
							<input type="text" name="username" value=""  required= "">
							<label>Username</label>

						</div>
						<div class="inputBox">
							<input type="password" name="password" required="" id="passwords">
							<label>Password</label>

						</div>
						<input type="checkbox" name="showpass" id="showpassword" onclick="uhu()"> <label for="showpassword">Show password</label>
						<center>
						 <input type="submit" name="submit" value="Submit">
						</center>
					</form>
				</div>
			</div>
		<div id="box-mobile">
			<a href="">La Salliana Android App</a>
		</div>
		
		<?php
	}

	function redirect_to($new_location) {
			header("location:" . $new_location);
			exit;
	}

	

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed!");
		}
	}


	function find_admin_by_username($username) {
		global $connection;

		$safe_username = mysqli_real_escape_string($connection, $username);

		$query = "SELECT * ";
		$query.= "FROM admin_tbl ";
		$query.= "WHERE username = '{$safe_username}' ";
		$query.= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if ($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} 
		else {
			return null;
		}
		
	}



	function password_encrypt($password) {
		$hash_format = "$2y$10$";
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}

	function generate_salt($length) {
		$unique_random_string = md5(uniqid(mt_rand(), true));
		$base64_string = base64_encode($unique_random_string);
		$modified_base64_string = str_replace('+','.', $base64_string);
		$salt = substr($modified_base64_string, 0, $length);
		return $salt;
	}

	function password_check($password, $existing_hash) {
		$hash = crypt($password, $existing_hash);
		if ($hash === $existing_hash) {
			return true;
		}
		else {
			return false;
		}
	}


	function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			if (password_check($password, $admin["password"])) {
				return $admin;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}






	function list_of_items($list_number,$table_name,$category_type_id,$link) {
		global $connection;

		$result_per_page = $list_number;
		$query = "SELECT * ";
		$query .= "FROM ".$table_name." WHERE category_type_id=".$category_type_id."";
		$result = mysqli_query($connection, $query);
		$number_of_results = mysqli_num_rows($result);
		$number_of_pages = ceil($number_of_results/$result_per_page);

		if (!isset($_GET["page"])) {
			$page = ($_GET["page"]=1);
		}
		else {
			$page = $_GET["page"];
		}

		$this_page_per_result = ($page-1)*$result_per_page;


		// $query = "SELECT * ";
		// $query .= "FROM ".$table_name." ";
		// $query .= "WHERE category_type_id=".$category_type_id." ";
		// $query .= "LIMIT " .$this_page_per_result . ",".$result_per_page;
		// $result = mysqli_query($connection, $query);
		// 

		$query = "SELECT item_id, item_picture, accession_number, copyright_name, isbn, item_name, item_quantity, description, author_name, donor_name FROM items_tbl ";
		$query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		$query .= "LEFT JOIN copyright_tbl ON items_tbl.copyright_id = copyright_tbl.copyright_id ";
		$query .= "LEFT JOIN donors_tbl ON items_tbl.donor_id = donors_tbl.donor_id ";
		$query .= "WHERE category_type_id=".$category_type_id." ";
		$query .= "LIMIT " .$this_page_per_result . ",".$result_per_page;
		$result = mysqli_query($connection, $query);

		?>
			<div id="number_of_items">
				<p><?php echo "Items:".$number_of_results." Pages:".$number_of_pages; ?></p>
			</div>

		<?php
			while ($row = mysqli_fetch_array($result)) {
		?>
						
				<div class="ref_container" id="crap"> 
					<div id="item_pic">
						<?php 
							$image =  '<img width="200px" height="200px" src="images/'. $row["item_picture"] .'">';
							if ($row["item_picture"] == "") {
								echo '<img width="200px" height="200px" src="../img/lasalliana_av.png">';
							}
							else {
								echo $image;
							}

						 ?>
						 
						 <!-- <a href="#" style="background-color: rgb(0, 0, 0,0.4); width: 202px; height: 20px; position: absolute; bottom: -1px; left: 0; text-align: center; text-decoration: none; color: white; font-weight: bold; z-index: 1;">upload pic</a> -->
						 
					</div>
					<div class="item-details">
						<?php 
							echo '<p style="font-size:19px;">'.$row["item_name"].'</p>';
							if ($row["author_name"] == "" || $row["author_name"] == " ") {
								$author = "";
							}
							else {
								$author =  '<p><b>Author: </b>'.$row["author_name"].'</p>';
							}
							
							if ($row["donor_name"] == "" || $row["donor_name"] == " ") {
								$donor = "";
							}
							else {
								$donor =  '<p><b>Donor: </b>'.$row["donor_name"].'</p>';
							}
							if ($row["accession_number"] == "" || $row["accession_number"] == 0) {
								$acc = "";
							}
							else {
								$acc = '<p><b>Accession Number: </b>'.$row["accession_number"].'</p>';
							}
							if ($row["copyright_name"] == "" || $row["copyright_name"] == " ") {
								$copyright = "";
							}
							else {
								$copyright = '<p>&copy '.$row["copyright_name"].'</p>';
							}
							if ($row["isbn"] == "" || $row["isbn"] == " " || $row["isbn"] == 0) {
								$isbn = "";
							}
							else {
								$isbn = '<p><b>ISBN: </b>'.$row["isbn"].'</p>';
							}
							echo $copyright;
							echo $isbn;
							echo $author;
							
							echo $acc;
							echo '<p><b>Quantity: </b>'.$row["item_quantity"].'</p>';
							echo $donor;
							if ($row["description"] != "") {
								$des = '<p style="width:500px; height:100px; line-height:15px; position:absolute;  "><b>Description: </b>'.$row["description"].'</p>';
							}
							else {
								$des = "";
							}
							echo $des;

						 ?>
						 <div id="link">
						<a href="update_item.php?item_id=<?php echo $row["item_id"]; ?>" id="open_item" target="_blank">Update</a>
						<!-- </div>
						<div id="link"> -->
						<a href="../generate.php?item_number=<?php echo $row["item_id"]; ?>" id="open_item" target="_blank">Generate QR</a>
						</div>
					</div>
					
								
				</div>

						<?php
					}
	?>

	<div class="pagination" id="pagination">


		<?php



								if ((1<$_GET["page"])) {
			$left_arrow =  '<a href="'.$link.'?page='.($_GET["page"]-1).'" style=" position:relative; font-size:30px; top:135px; margin-top:10px; padding:20px; text-decoration:none;  ">&#10094</a>';
		}
		else {
			$left_arrow =  "";
		}

		if ($number_of_pages>$_GET["page"]) {
			$left_count = '<a href="'.$link.'?page='.($_GET["page"]+1).'" style=" position:relative; font-size:30px; top:135px;  padding:20px; text-decoration:none; ">&#10095</a>';
		}
		else {
			$left_count = "";
		}


		echo $left_arrow;

		for ($page=$_GET["page"]-4; $page <$_GET["page"] ; $page++) { 
				if ($page>0) {
					echo  '<a href="'.$link.'?page='.$page.'" style=" position:relative; font-size:30px; top:135px;  padding:20px; text-decoration:none; ">'.$page.'</a>';
				}
			}


		if ($number_of_results == 0 || $number_of_results == 1) {
			echo "";
		}
		else {
			echo '<a href="'.$link.'?page='.$page.'" style= "position:relative; font-size:30px; top:135px;  padding:20px; text-decoration:none; color:red; ">'.$page.'</a>';
		}
		
		for ($i=$page+1; $i <= $number_of_pages ; $i++) { 
			echo '<a href="'.$link.'?page='.$i.'" style=" position:relative; font-size:30px; top:135px;  padding:20px; text-decoration:none; ">'.$i.'</a>';
			if ($i>$_GET["page"]+4) {
				break;
			}
		}

		echo $left_count;


}	




function list_of_items_sub_category($list_number,$table_name,$category_type_id,$link) {
		global $connection;

		$result_per_page = $list_number;
		$query = "SELECT * ";
		$query .= "FROM ".$table_name." WHERE category_sub_type_id=".$category_type_id."";
		$result = mysqli_query($connection, $query);
		$number_of_results = mysqli_num_rows($result);
		$number_of_pages = ceil($number_of_results/$result_per_page);

		if (!isset($_GET["page"])) {
			$page = ($_GET["page"]=1);
		}
		else {
			$page = $_GET["page"];
		}

		$this_page_per_result = ($page-1)*$result_per_page;


		// $query = "SELECT * ";
		// $query .= "FROM ".$table_name." ";
		// $query .= "WHERE category_sub_type_id=".$category_type_id." ";
		// $query .= "LIMIT " .$this_page_per_result . ",".$result_per_page;
		// $result = mysqli_query($connection, $query);

		// 
		$query = "SELECT item_id, item_picture, item_name, item_quantity, copyright_name, isbn, description, author_name, donor_name FROM items_tbl ";
		$query .= "LEFT JOIN author_tbl ON items_tbl.author_id = author_tbl.author_id ";
		$query .= "LEFT JOIN copyright_tbl ON items_tbl.copyright_id = copyright_tbl.copyright_id ";
		$query .= "LEFT JOIN donors_tbl ON items_tbl.donor_id = donors_tbl.donor_id ";
		$query .= "WHERE category_sub_type_id=".$category_type_id." ";
		$query .= "LIMIT " .$this_page_per_result . ",".$result_per_page;
		$result = mysqli_query($connection, $query);
		

		?>
			<!-- <div id="number_of_page">
				<form action="<?php echo $link."?page=".$go_page; ?>" method="get">
					<b><p style="position: relative; bottom: 250px; left: 350px;"><input type="text" style="width: 10px; font-size: 15px; font-weight: bold;" name="" value=""><?php echo "/".$number_of_pages; ?></p></b>	
				</form>
			</div> -->
			<div id="number_of_items">
				<p><?php echo "Items:".$number_of_results." Pages:".$number_of_pages; ?></p>
			</div>

		<?php
			while ($row = mysqli_fetch_array($result)) {
		?>
						
				<div class="ref_container" id="crap"> 
					<div id="item_pic">
						<?php 
							$image =  '<img width="200px" height="200px" src="../images/'. $row["item_picture"] .'">';
							if ($row["item_picture"] == "") {
								echo '<img width="200px" height="200px" src="../../img/lasalliana_av.png">';
							}
							else {
								echo $image;
							}

							if ($row["copyright_name"] == "" || $row["copyright_name"] == null || $row["copyright_name"] == " ") {
								$copyright = "";
							}
							else {
								$copyright = '<p>&copy '.$row["copyright_name"].'</p>';
							}


						 ?>
						 
						 <!-- <a href="#" style="background-color: rgb(0, 0, 0,0.4); width: 202px; height: 20px; position: absolute; bottom: -1px; left: 0; text-align: center; text-decoration: none; color: white; font-weight: bold; z-index: 1;">upload pic</a> -->
						 
					</div>
					<div class="item-details">
						<?php 

							echo '<p style="font-size:19px;">'.$row["item_name"].'</p>';
							if ($row["author_name"] == " " || $row["author_name"] == 0 || $row["author_name"] == "") {
								$author = "";
							}
							else {
								$author = '<p><b>Author: </b>'.$row["author_name"].'</p>';
							}
							
							echo $copyright;

							if ($row["isbn"] == "" || $row["isbn"] == null || $row["isbn"] == " " || $row["isbn"] == 0) {
								$isbn = "";
							}
							else {
								$isbn = '<p><b>ISBN: </b>'.$row["isbn"].'</p>';
							}
							echo $isbn;
							echo $author;
						

							if ($row["donor_name"] != "") {
								$donor =  '<p><b>Donor: </b>'.$row["donor_name"].'</p>';
							}
							else {
								$donor =  "";
							}

							echo '<p><b>Quantity: </b>'.$row["item_quantity"].'</p>';
							echo $donor;
							if ($row["description"] == " " || $row["description"] == "") {
								$des = "";
							}
							else {
								$des = '<p style="width:500px; height:100px; line-height:15px;  "><b>Description: </b>'.$row["description"].'</p>';
							}
							
							echo $des;

						 ?>
						 <div id="link">
						<a href="../update_item.php?item_id=<?php echo $row["item_id"]; ?>" id="open_item" target="_blank">Update</a>
						<!-- </div>
						<div id="link"> -->
						<a href="../../generate.php?item_number=<?php echo $row["item_id"]; ?>" id="open_item" target="_blank">Generate qr</a>
						</div>
					</div>
					
								
				</div>

						<?php
					}
	?>

	<div class="pagination" id="pagination">


		<?php



								if ((1<$_GET["page"])) {
			$left_arrow =  '<a href="'.$link.'?page='.($_GET["page"]-1).'" style=" position:relative; font-size:30px; top:135px; margin-top:10px; padding:20px; text-decoration:none;  ">&#10094</a>';
		}
		else {
			$left_arrow =  "";
		}

		if ($number_of_pages>$_GET["page"]) {
			$left_count = '<a href="'.$link.'?page='.($_GET["page"]+1).'" style=" position:relative; font-size:30px; top:135px;  padding:20px; text-decoration:none; ">&#10095</a>';
		}
		else {
			$left_count = "";
		}


		echo $left_arrow;

		for ($page=$_GET["page"]-4; $page <$_GET["page"] ; $page++) { 
				if ($page>0) {
					echo  '<a href="'.$link.'?page='.$page.'" style=" position:relative; font-size:30px; top:135px;  padding:20px; text-decoration:none; ">'.$page.'</a>';
				}
			}


		if ($number_of_results == 0 || $number_of_results == 1) {
			echo "";
		}
		else {
			echo '<a href="'.$link.'?page='.$page.'" style= "position:relative; font-size:30px; top:135px;  padding:20px; text-decoration:none; color:red; ">'.$page.'</a>';
		}
		
		for ($i=$page+1; $i <= $number_of_pages ; $i++) { 
			echo '<a href="'.$link.'?page='.$i.'" style=" position:relative; font-size:30px; top:135px;  padding:20px; text-decoration:none; ">'.$i.'</a>';
			if ($i>$_GET["page"]+4) {
				break;
			}
		}

		echo $left_count;


}	






// function compress($source, $destination, $quality) {
// 	$info = getimagesize($source);
// 	if ($info['mime' == 'image/jpeg']) {
// 		$image = imagecreatefromjpeg($source);
// 	}
// 	elseif ($info['mime' == 'image/gif']) {
// 		$image = imagecreatefromgif($source);
// 	}
// 	elseif ($info['mime' == 'image/png']) {
// 		$image = imagecreatefrompng($source);
// 	}
// 	imagejpeg($image,$destination, $quality);
// 	return $destination;
// }




	// add item function 
	




?>


