<?php 
include("include/header.php");
require_once("include/db_connection.php");
	


	?>

		<input type="text" name="search" id="search">


	<?php
$result_per_page = 2;

$query = "SELECT * ";
$query .= "FROM admin_tbl";
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


$query = "SELECT * ";
$query .= "FROM admin_tbl ";
$query .= "LIMIT " .$this_page_per_result . ",".$result_per_page;
$result = mysqli_query($connection, $query);
?>
	<table id="ks">
		<tr>
			<th>user_id</th>
			<th>username</th>
			<th>password</th>
			<th><?php echo $page."/".$number_of_pages . " Page of ". $number_of_results ." Items"; ?></th>
		</tr>
	
<?php
while ($row = mysqli_fetch_array($result)) {
	?>
		<tr>
			<td><?php echo $row["user_id"]; ?></td>
			<td><?php echo $row["username"]; ?></td>
			<td><?php echo $row["password"]; ?></td>
		</tr>
	<?php
}

?>
	</table>
<?php
if ((1<$_GET["page"])) {
	$hi =  '<a href="tables.php?page='.($_GET["page"]-1).'" style="position:relative; font-size:30px; top:-300px; left:530px; padding:20px; text-decoration:none; ">&#10094</a>';
}
else {
	$hi =  "";
}

if ($number_of_pages>$_GET["page"]) {
	$hello = '<a href="tables.php?page='.($_GET["page"]+1).'" style="position:relative; font-size:30px; top:-300px; left:470px; padding:20px; text-decoration:none; ">&#10095</a>';
}
else {
	$hello = "";
}


echo $hi;
for ($page=$_GET["page"]-2; $page <$_GET["page"] ; $page++) { 
		if ($page>0) {
			echo  '<a href="tables.php?page='.$page.'" style="position:relative; font-size:30px; top:-300px; left:500px; padding:20px; text-decoration:none; ">'.$page.'</a>';
		}
	}

echo '<a href="tables.php?page='.$page.'" style="position:relative; font-size:30px; top:-300px; left:500px; padding:20px; text-decoration:none; color:red; ">'.$page.'</a>';
for ($i=$page+1; $i <= $number_of_pages ; $i++) { 
	echo '<a href="tables.php?page='.$i.'" style="position:relative; font-size:30px; top:-300px; left:500px; padding:20px; text-decoration:none; ">'.$i.'</a>';
	if ($i>$_GET["page"]+1) {
		break;
	}
}

echo $hello;





include("include/footer.php");
 ?>



<script type="text/javascript">
	
	var x = document.getElementById("search");

	 	x.onkeyup = function() {
	 		alert("yeah");
	 	}

</script>