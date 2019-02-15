<?php 

    
  $header = "Photos";

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
    <img src="img/photos.png" class="reference-img">
    <div class="category-container">
      <p>1/1</p>
      
      <ul>
        <li>
          <a href="catalog/lasallian_saints_photos.php">
            <img src="img/reference-img/LassSaints.png">
            <h5>Lasallian Saints</h5>
          </a>
        </li>
        <li>
          <a href="catalog/alumni_graduates.php">
            <img src="img/photos/alumni.png">
            <h5>Alumni Graduates</h5>
          </a>
        </li>
        <li>
          <a href="catalog/administrator_photos.php">
            <img src="img/photos/administrator.png">
            <h5>Administrator</h5>
          </a>
        </li>
        <li>
          <a href="catalog/other_photos.php">
            <img src="img/reference-img/lasallian-identity.png">
            <h5>Others</h5>
          </a>
        </li>
       
      </ul>
      
    </div>

    

    


    <script type="text/javascript" src="js/slides.js"></script>
   </body>
 </html>


