<?php
$header = "Lasalliana Online Catalog";
require_once("include/db_connection.php"); 
require_once("include/session.php"); 
include("include/header.php");
require_once("include/function.php");
if (isset($_SESSION["start"])) {

require_once("include/function.php");


?>

	<div class="container">

		<div id="main">
			<img src="img/border.png" alt="img/border.png" id="border">
			<a href="reference.php"><img src="img/reference.png" id="reference"></a>
			<a href="photos.php"><img src="img/photos.png" id="photos"></a>
			<a href="antique.php"><img src="img/antique.png" id="antique"></a>
			<a href="archive.php"><img src="img/archieve.png" id="archieve"></a>
			<a href="catalog/fiction_books.php"><img src="img/antiquarian.png" id="antiquarian"></a>
		</div>
		
	</div>	


	<?php 
		}

		elseif (isset($_GET["lasalliana"])) {
			?>
				<center>heello</center>
			<?php
		}

		else {
			require_once("include/function.php");
			redirect_to("index.php");
		}
 include("include/footer.php"); 
	 ?>
		
	