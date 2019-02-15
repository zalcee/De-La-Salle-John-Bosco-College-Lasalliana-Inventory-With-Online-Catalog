<?php 
	// session_unset($_SESSION["start"]);
	 $header = "References";

	require_once("include/db_connection.php");
	require_once("include/session.php"); 
	include("include/header.php");
	require_once("include/function.php");
	 $_SESSION["h1"] = "References";
 ?>
 <!DOCTYPE html>
 <html>
	 <head>
	 	<title></title>
	 </head>
	 <body>
	 	<img src="img/reference.png" class="reference-img">
	 	<div class="category-container">
	 		<p>1/4</p>
		 	<a class="next" onclick="plusSlides(1)">&#10095;</a>
		 	<ul>
		 		<li>
		 			<a href="catalog/life_and_works_of_st_la_salle.php">
			 			<img src="img/reference-img/life and work.png">
			 			<h5>Life and Works of St. La Salle</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/digital_research.php">
			 			<img src="img/reference-img/digital-research.png">
			 			<h5>Digital Research</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/rights_of_child.php">
			 			<img src="img/reference-img/roc.png">
			 			<h5>Rights of Child</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/for_the_lasallian_family.php">
			 			<img src="img/reference-img/lasallian-family.png">
			 			<h5>For the Lasallian Family</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/publications_for_young_lasallians.php">
			 			<img src="img/reference-img/pyl.png">
			 			<h5>Publications for Young Lasallians</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/the_ongoing_story.php">
			 			<img src="img/reference-img/ongoing.png">
			 			<h5>The Ongoing Story</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/collocquium_on_association.php">
			 			<img src="img/reference-img/life and work.png">
			 			<h5>Collocquium on Association - Eurocelas 2000</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/lasallian_identity.php">
			 			<img src="img/reference-img/lasallian-identity.png">
			 			<h5>Lasallian Identity</h5>
			 		</a>
		 		</li>
		 	</ul>
		 	
	 	</div>

	 	<div class="category-container">
	 		<p>2/3</p>
	 		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	 		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		 	<ul>
		 		<li>
		 			<a href="catalog/lasallian_spirtuality.php">
			 			<img src="img/reference-img/lasallian_spirituality.png">
			 			<h5>Lasallian Spirituality</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/the_row_of_association.php">
			 			<img src="img/reference-img/assoc.png">
			 			<h5>The Vow of Association</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/studies.php">
			 			<img src="img/reference-img/studies.png">
			 			<h5>Studies</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/lasallian_prayers.php">
			 			<img src="img/reference-img/prayer.png">
			 			<h5>Lasallian Prayers</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/lasallian_reflection.php">
			 			<img src="img/reference-img/reflection.png">
			 			<h5>Lasallian Reflection</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/lasallian_vocation.php">
			 			<img src="img/reference-img/lasallian_vocation.png">
			 			<h5>Lasallian Vocation</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/lumen.php">
			 			<img src="img/reference-img/lumen.png">
			 			<h5>Lumen</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/circular.php">
			 			<img src="img/reference-img/circular.png">
			 			<h5>Circular</h5>
			 		</a>
		 		</li>
		 	</ul>

	 	</div>



	 	<div class="category-container">
	 		<p>3/4</p>
	 		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	 		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		 	<ul>
		 		<li>
		 			<a href="catalog/lasallian_formation.php">
			 			<img src="img/reference-img/las-formation.png">
			 			<h5>Lasallian Formation</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/MEL_bulletin.php">
			 			<img src="img/reference-img/mel.png">
			 			<h5>MEL Bulletin</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/lasallian_bulletin_institute_magazine.php">
			 			<img src="img/reference-img/roc.png">
			 			<h5>Lasallian Bulletin Institute Magazine</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/intercom.php">
			 			<img src="img/reference-img/Intercom.png">
			 			<h5>Intercom</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/pastoral_letter.php">
			 			<img src="img/reference-img/PastoralLet.png">
			 			<h5>Pastoral Letter</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/lasallian_saints.php">
			 			<img src="img/reference-img/LassSaints.png">
			 			<h5>Lasallian Saints</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/other_references.php">
			 			<img src="img/reference-img/life and work.png">
			 			<h5>Other References</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/posters.php">
			 			<img src="img/reference-img/Post.png">
			 			<h5>Posters</h5>
			 		</a>
		 		</li>
		 	</ul>

	 	</div>


	 	<div class="category-container">
	 		<p>4/4</p>
	 		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		 	<ul>
		 		<li>
		 			<a href="catalog/stampitas.php">
			 			<img src="img/reference-img/stampidas.png">
			 			<h5>Stampitas</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="yearbook.php">
			 			<img src="img/reference-img/yearbook.png">
			 			<h5>Yearbook</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="manuals.php">
			 			<img src="img/reference-img/Manual.png">
			 			<h5>Manuals</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="souvenirs_and_programs.php">
			 			<img src="img/reference-img/Souv.png">
			 			<h5>Souvenirs and Programs</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="Magazines.php">
			 			<img src="img/reference-img/Magazines.png">
			 			<h5>Magazines</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="multimedia.php">
			 			<img src="img/reference-img/multi.png">
			 			<h5>Multimedia</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="Report.php">
			 			<img src="img/reference-img/Reports.png">
			 			<h5>Reports<br>(Ringbound)</h5>
			 		</a>
			 		<li>
		 			<a href="catalog/others_references.php">
			 			<img src="img/reference-img/lasallian-identity.png">
			 			<h5>Others</h5>
			 		</a>
		 		</li>
		 		</li>
		 		
		 	</ul>

	 	</div>

		


	  <script type="text/javascript" src="js/slides.js"></script>
	 </body>
 </html>

