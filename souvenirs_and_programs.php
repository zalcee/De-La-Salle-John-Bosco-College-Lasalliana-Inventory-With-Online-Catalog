<?php 
	$header = "Souvenirs and Programs";
	require_once("include/db_connection.php");
	require_once("include/session.php"); 
	include("include/header.php");
	require_once("include/function.php");
	
 ?>
 <!DOCTYPE html>
 <html>
	 <head>
	 	<title></title>
	 </head>
	 <body>
	 	<img src="img/reference.png" class="reference-img">

	 	<div class="category-container">
	 		<p>1/1</p>
		 	<ul>
		 		<li>
		 			<a href="catalog/subCategory/in-house.php">
			 			<img src="img/reference-img/inhouse.png">
			 			<h5>In-House</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/provincialate.php">
			 			<img src="img/reference-img/dslp.png">
			 			<h5>DLSP/<br>Provincialate</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/lassa.php">
			 			<img src="img/reference-img/Lassa.png">
			 			<h5>LASSA</h5>
			 		</a>
		 		</li>		 		
		 	</ul>
	 	</div>


		


	  <script type="text/javascript" src="js/slides.js"></script>
	 </body>
 </html>
