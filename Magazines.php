<?php 
	$header = "Magazines";
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
		 			<a href="catalog/subCategory/DLSP_LEAD.php">
			 			<img src="img/reference-img/dslp.png">
			 			<h5>DLSP/LEAD</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/de_la_lasalle_today.php">
			 			<img src="img/reference-img/today.png">
			 			<h5>De La Salle Today</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/newspaper.php">
			 			<img src="img/reference-img/newspaper.png">
			 			<h5>Newspaper</h5>
			 		</a>
		 		</li>		 		
		 	</ul>
	 	</div>


		


	  <script type="text/javascript" src="js/slides.js"></script>
	 </body>
 </html>
