<?php 
	$header = "Yearbook";
	$_SESSION["start"] = "References";
	if ($_SESSION["start"] == "References") {
		
	

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
		 			<a href="catalog/subCategory/hied.php">
			 			<img src="img/reference-img/HiEd.png">
			 			<h5>Hied</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/technical_high_school.php">
			 			<img src="img/reference-img/TechHS.png">
			 			<h5>Technical High School</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/supervised_school.php">
			 			<img src="img/reference-img/Supervised.png">
			 			<h5>Supervised School</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/other_lasalle_schools.php">
			 			<img src="img/reference-img/otherlas.png">
			 			<h5>Other La Salle Schools</h5>
			 		</a>
		 		</li>
		 	</ul>
		 	
	 	</div>


		


	  <script type="text/javascript" src="js/slides.js"></script>
	 </body>
 </html>

<?php 

	}
 ?>