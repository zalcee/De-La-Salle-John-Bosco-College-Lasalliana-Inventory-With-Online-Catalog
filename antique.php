<?php 

    
  $header = "Antique";

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
    <img src="img/antique.png" class="reference-img">
    <div class="category-container">
      <p>1/2</p>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      <ul>
        <li>
		 			<a href="catalog/books_and_references.php">
			 			<img src="img/reference-img/life and work.png">
			 			<h5>Books/<br>References</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/equipments.php">
			 			<img src="img/antique/equipment.png">
			 			<h5>Equipment</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/teaching_aid.php">
			 			<img src="img/reference-img/roc.png">
			 			<h5>Teaching Aid</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/faculty_uniforms.php">
			 			<img src="img/antique/faculty_unniform.png">
			 			<h5>Faculty Uniforms</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/student_uniforms.php">
			 			<img src="img/antique/student-uniform.png">
			 			<h5>Student Uniforms</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/alumni_t-shirt_collections.php">
			 			<img src="img/antique/alumni_tshirt.png">
			 			<h5>Alumni T-shirt Collection</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/fixtures_and_furnitures.php">
			 			<img src="img/antique/fixtures_furniture.png">
			 			<h5>Fixtures/<br>Furnitures</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/gadgets.php">
			 			<img src="img/antique/gadgets.png">
			 			<h5>Gadgets</h5>
			 		</a>
		 		</li>
      </ul>
      
    </div>

    

    <div class="category-container">
      <p>1/2</p>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <ul>
       	 		<li>
		 			<a href="catalog/musical_instrument.php">
			 			<img src="img/antique/musical_instrument.png">
			 			<h5>Musical Instrument</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/recording_album.php">
			 			<img src="img/antique/recorfing_albums.png">
			 			<h5>Recording Album</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/sacramentals.php">
			 			<img src="img/antique/sacramentals.png">
			 			<h5>Sacramentals</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/others.php">
			 			<img src="img/reference-img/lasallian-family.png">
			 			<h5>Others</h5>
			 		</a>
		 		</li>
		 		
      </ul>
      
    </div>
    


    <script type="text/javascript" src="js/slides.js"></script>
   </body>
 </html>


