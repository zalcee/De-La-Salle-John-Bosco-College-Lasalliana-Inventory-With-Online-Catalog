<?php 
	$header = "Multimedia";
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
		 			<a href="catalog/subCategory/digital_photos.php">
			 			<img src="img/reference-img/digphoto.png">
			 			<h5>Digital Photos</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/Lasalliana_video.php">
			 			<img src="img/reference-img/LasallianVideo.png">
			 			<h5>Lasalliana Video</h5>
			 		</a>
		 		</li>	 		
		 	</ul>
	 	</div>


		


	  <script type="text/javascript" src="js/slides.js"></script>
	 </body>
 </html>
