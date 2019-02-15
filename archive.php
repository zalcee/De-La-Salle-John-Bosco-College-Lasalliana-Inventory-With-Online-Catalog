<?php 
	
	$header = "Archives";

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
	 	<img src="img/archieve.png" class="reference-img">
	 	<div class="category-container">
	 		<p>1/5</p>
		 	<a class="next" onclick="plusSlides(1)">&#10095;</a>
		 	<ul>
		 		<li>
		 			<a href="catalog/LASSO.php">
			 			<img src="img/reference-img/Laaso.png">
			 			<h5>LASSO</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/CITECH.php">
			 			<img src="img/archives/citech.png">
			 			<h5>CITECH</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/FINANCE_OFFICE.php">
			 			<img src="img/archives/finance_office.png">
			 			<h5>FINANCE OFFICE</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_MISSION_DEVELOPMENT_&_LINKAGES(Lasallian_Mission_Office).php">
			 			<img src="img/archives/lasallian_mission-_office.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR MISSION DEVELOPMENT & LINKAGES(Lasallian Mission Office)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/ALUMNI_OFFICE.php">
			 			<img src="img/archives/alumni_office.png">
			 			<h5>ALUMNI OFFICE</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_MISSION_DEVELOPMENT_&_LINKAGES(Advocacy_&_Social_Action_Program).php">
			 			<img src="img/archives/advocacy.png">
			 			<h5 style="font-size: 10px;">VICE-CHANCELLOR MISSION DEVELOPMENT & LINKAGES(Advocacy & Social Action Program)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ADMINISTRATIVE_AFFAIRS_&_SERVICES(Registrar's_Office).php">
			 			<img src="img/archives/Registrar.png">
			 			<h5 style="font-size: 10px;">VICE-CHANCELLOR ADMINISTRATIVE AFFAIRS & SERVICES(Registrar's Office)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_MISSION_DEVELOPMENT_&_LINKAGES(Lasalliana_Resource_Center).php">
			 			<img src="img/archives/lasalliana_resource.png">
			 			<h5 style="font-size: 10px;">VICE-CHANCELLOR MISSION DEVELOPMENT & LINKAGES(Lasalliana Resource Center)</h5>
			 		</a>
		 		</li>
		 	</ul>
		 	
	 	</div>

	 	<div class="category-container">
	 		<p>2/5</p>
	 		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	 		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		 	<ul>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_MISSION_DEVELOPMENT_&_LINKAGES(community_Extension_Services).php">
			 			<img src="img/archives/community.png">
			 			<h5 style="font-size: 10px;">VICE-CHANCELLOR MISSION DEVELOPMENT & LINKAGES(community Extension Services)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_MISSION_DEVELOPMENT_&_LINKAGES(scholarship).php">
			 			<img src="img/archives/scholarship.png">
			 			<h5 style="font-size: 11px;">VICE-CHANCELLOR MISSION DEVELOPMENT & LINKAGES<br>(scholarship)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_MISSION_DEVELOPMENT_&_LINKAGES(Campus_Minister).php">
			 			<img src="img/archives/minister.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR MISSION DEVELOPMENT & LINKAGES<br>(Campus Minister)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_MISSION_DEVELOPMENT_&_LINKAGES(External_Affairs).php">
			 			<img src="img/reference-img/lasallian-family.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR MISSION DEVELOPMENT & LINKAGES<br>(External Affairs)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_MISSION_DEVELOPMENT_&_LINKAGES.php">
			 			<img src="img/reference-img/pyl.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR MISSION DEVELOPMENT & LINKAGES</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ADMINISTRATIVE_AFFAIRS_&_SERVICES(Human_Resource_Development_Office).php">
			 			<img src="img/archives/administrativ_affairs.png">
			 			<h5 style="font-size: 10px;">VICE-CHANCELLOR ADMINISTRATIVE AFFAIRS & SERVICES<br>(Human Resource Development Office)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ADMINISTRATIVE_AFFAIRS_&_SERVICES(Health_Services).php">
			 			<img src="img/archives/human_resource.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR ADMINISTRATIVE AFFAIRS & SERVICES<br>(Health Services)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ADMINISTRATIVE_AFFAIRS_&_SERVICES.php">
			 			<img src="img/reference-img/lasallian-identity.png">
			 			<h5 style="font-size:12px;">VICE-CHANCELLOR ADMINISTRATIVE AFFAIRS & SERVICES</h5>
			 		</a>
		 		</li>
		 	</ul>

	 	</div>

	 	<!-- page 3 -->

	 	<div class="category-container">
	 		<p>3/5</p>
	 		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	 		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		 	<ul>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ADMINISTRATIVE_AFFAIRS_&_SERVICES(General_Maintenance_Services).php">
			 			<img src="img/archives/General_maintenance.png">
			 			<h5 style="font-size: 10.45px;">VICE-CHANCELLOR ADMINISTRATIVE AFFAIRS & SERVICES<br>(General Maintenance Services)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMIC_&_RESEARCH(COLLEGE_OF_TEACHER_EDUCATION).php">
			 			<img src="img/archives/college_teacher_education.png"><br>
			 			<h5 style="font-size: 11px;">VICE-CHANCELLOR ACADEMIC & RESEARCH(COLLEGE OF TEACHER EDUCATION)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH(BED-LOWER_LEVEL_LIBRARY).php">
			 			<img src="img/archives/bed_lower_level_library.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR ACADEMICS & RESEARCH<br>(BED-LOWER LEVEL LIBRARY)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH(College_of_Business).php">
			 			<img src="img/archives/college_of_business.png">
			 			<h5 style="font-size: 12.3px;">VICE-CHANCELLOR ACADEMICS & RESEARCH<br>(College of Business)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH(Manpower_Skills_&_training_Program).php">
			 			<img src="img/archives/manpower_skills_training.png">
			 			<h5 style="font-size: 10px;">VICE-CHANCELLOR ACADEMICS & RESEARCH(Manpower Skills & training Program</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH(college_of_Tourism_&_HRM).php">
			 			<img src="img/archives/college_of_tourism.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR ACADEMICS & RESEARCH(college of Tourism & HRM)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH(BED-UPPER_Level_Library).php">
			 			<img src="img/archives/bed_upper_level_library.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR ACADEMICS & RESEARCH(BED-UPPER Level Library)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH(BED-LOWER_Level_Guidance_Office).php">
			 			<img src="img/archives/guidance.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR ACADEMICS & RESEARCH(BED-LOWER Level Guidance Office)	</h5>
			 		</a>
		 		</li>
		 	</ul>

	 	</div>


	 	<!-- page 4 -->

	 	<div class="category-container">
	 		<p>4/5</p>
	 		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	 		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		 	<ul>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH(BED-LOWER_Level).php">
			 			<img src="img/reference-img/life and work.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR ACADEMICS & RESEARCH<br>(BED-LOWER Level)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH(BED-UPPER_LEVEL).php">
			 			<img src="img/reference-img/digital-research.png"><br>
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR ACADEMICS & RESEARCH<br>(BED-UPPER LEVEL)</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/VICE-CHANCELLOR_ACADEMICS_&_RESEARCH.php">
			 			<img src="img/reference-img/roc.png">
			 			<h5 style="font-size: 12px;">VICE-CHANCELLOR ACADEMICS & RESEARCH</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/PRESIDENT.php">
			 			<img src="img/archives/President.png">
			 			<h5>PRESIDENT</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/DE_LA_SALLE_JOHN_BOSCO_COLLEGE.php">
			 			<img src="img/reference-img/pyl.png">
			 			<h5 >DE LA SALLE JOHN BOSCO COLLEGE</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/BOARD_OF_TRUSTEES.php">
			 			<img src="img/archives/board_of_trustees.png">
			 			<h5 >BOARD OF TRUSTEES</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/DE_LA_SALLE_PHILIPPINES.php">
			 			<img src="img/archives/Delasallephilippines.png">
			 			<h5 style="font-size: 12px;">DE LA SALLE PHILIPPINES</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/THE_DISTRICT_MISSION_LEAD.php">
			 			<img src="img/archives/district_mission.png">
			 			<h5 style="font-size: 12px;">THE DISTRICT MISSION LEAD</h5>
			 		</a>
		 		</li>
		 	</ul>

	 	</div>	

	 	<!-- page 5 -->

	 	<div class="category-container">
	 		<p>5/5</p>
	 		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	 		<!-- <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
		 	<ul>
		 		<li>
		 			<a href="catalog/THE_MISSION_ACCORDING_TO_REGION.php">
			 			<img src="img/archives/mission-according-to-region.png">
			 			<h5>THE MISSION ACCORDING TO REGION</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/THE_FOUNDER_&_INSTITUTE.php">
			 			<img src="img/archives/lasalliana_resource.png"><br>
			 			<h5 ">THE FOUNDER & INSTITUTE</h5>
			 		</a>
		 		</li>
		 		<li>
		 			<a href="catalog/other_archive.php">
			 			<img src="img/reference-img/lasallian-identity.png"><br>
			 			<h5 ">Others</h5>
			 		</a>
		 		</li>
		 	
		 	</ul>

	 	</div>	

		


	  <script type="text/javascript" src="js/slides.js"></script>
	 </body>
 </html>

