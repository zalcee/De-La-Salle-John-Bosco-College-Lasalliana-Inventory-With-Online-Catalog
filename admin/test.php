<?php 
		require_once("../include/db_connection.php"); 
		require_once("../include/session.php"); 
		require_once("../include/function.php");

		if (isset($_POST["submit"])) {
			$category_type_name = $_POST["category_type_name"];
			$category_sub_type_id = $_POST["category_sub_type_id"];
			$category_id = 5;

			$query = "INSERT INTO category_under_sub_type_tbl( ";
			$query .= "category_under_sub_type_name, category_sub_type_id) ";
			$query .= "VALUES('$category_under_sub_type_name', '$category_sub_type_id')";
			$result = mysqli_query($connection, $query);
			if ($result) {
				echo "added succesfully";
			}
		}


?>
<center style="position: relative; top: 5vw; ">
	<form action="test.php" method="post">
		<label>category_under_sub_type_name: </label><input type="text" name="category_under_sub_type_name" style="width: 300px; top: 5vw; padding: 5px; " id="text"><input type="text" name="category_sub_type_id" style="width: 60px; top: 5vw; padding: 5px; margin: 10px;" id="text"><br><br>
		<!-- <label>category id: </label><input type="text" name="category_id" style="width: 100px; top: 5vw; padding: 5px; margin: 10px;"><br> -->
		<!-- <button onclick="paste()">Paste</button> -->
		<input type="submit" name="submit" value="submit">

	</form>
</center>


<!-- <script type="text/javascript">
	
	function paste() {
		var g = window.clipboardData.getData("text");
		document.getElementById("text").value = g;
		// alert("sdfds");
	}
</script> -->