<?php 
	$header = "SHOW";
		require_once("../include/db_connection.php"); 
		require_once("../include/session.php"); 
		// require_once("../include/function.php");
		include("../include/header.php");

		$query = "SELECT * FROM category_sub_type_tbl  ORDER BY category_sub_type_name ASC";
		$result	= mysqli_query($connection, $query);
		
	
?>

<table id="table">
	<tr>
		<!-- <th>category_type_id</th> -->
		<th>category_type_name</th>
		<!-- <th>category id</th> -->
	</tr>
	<?php while ($row = mysqli_fetch_array($result)) { ?>

	<tr style="border:1px solid black">
		<td><?php echo $row["category_sub_type_id"]; ?></td>
		<td><?php echo str_replace(" ", "_", $row["category_sub_type_name"]); ?></td>
		<td><?php echo $row["category_type_id"]; ?></td>
	</tr>




<?php


		}

?>
</table>


<script type="text/javascript">
	var table = document.getElementById("table"),rIndex;
	for (var i = 0; table.rows.length; i++) {
	table.rows[i].onclick =  function() {
		// rIndex = this.rowIndex;
		// console.log(this.cells[1].innerHTML);
		var row = this.cells[1];
		// rowz.select();
		var range = document.createRange();
		range.selectNode(row);
		window.getSelection().addRange(range);
		document.execCommand('copy');
		
		if (document.execCommand("copy")) {
			alert("Copied " + rowz);
			}
		}
	}


</script>