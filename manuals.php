<?php 
	$header = "Manuals";
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
	 		<p>1/2</p>
	 		<!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a> -->
	 		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		 	
		 	<ul>
		 		<li>
		 			<a href="catalog/subCategory/faculty.php">
			 			<img src="img/reference-img/faculty.png">
			 			<h5>Faculty</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/procedures_handbook.php">
			 			<img src="img/reference-img/prodcedure.png">
			 			<h5>Procedures Handbook</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/DLSJBC_DLSU_operational_manuals.php">
			 			<img src="img/reference-img/Operat.png">
			 			<h5>DLSJBC/DLSU Operational Manuals</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/ILRC.php">
			 			<img src="img/reference-img/ILRC.png">
			 			<h5>ILRC</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/PLS_operational_manual.php">
			 			<img src="img/reference-img/lasallian-family.png">
			 			<h5>PLS Operational Manual</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/PLS_guest_handbook.php">
			 			<img src="img/reference-img/plsoperation.png">
			 			<h5>PLS Guest Handbook</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/subCategory/contacts_and_information.php">
			 			<img src="img/reference-img/contact.png">
			 			<h5>Contacts and Information</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="student_handbook.php">
			 			<img src="img/reference-img/studentman.png">
			 			<h5>Student Handbook</h5>
			 		</a>
		 		</li>
		 	</ul>
		 	
	 	</div>


	 	<div class="category-container">
	 		<p>2/2</p>
	 		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	 		<!-- <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
		 	
		 	<ul>
		 		<li>
		 			<a href="catalog/subCategory/BST_manual.php">
			 			<img src="img/reference-img/btsmanual.png">
			 			<h5>BST Manual</h5>
			 		</a>
		 		</li>
		 		
		 		
		 		
		 	</ul>
		 	
	 	</div>


		


	  <script type="text/javascript" src="js/slides.js"></script>
	 </body>
 </html>

