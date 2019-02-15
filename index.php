<?php 
 include("include/session.php");
 if (isset($_SESSION["start"])) {
  header("location: main.php");
 }
 else {

  include("include/header.php"); 
 require_once("include/db_connection.php"); 
 // require_once("include/login.php"); 
 require_once("include/function.php"); 

 login();  
  if (isset($_POST['submit'])) {	
    $username = $_POST['username'];
  	$password = $_POST['password'];
    $found_admin = attempt_login($username, $password);
  	 
  	if ($found_admin) {
      
      $_SESSION["start"] = time();
      redirect_to("main.php");
  	}
  	else {
  		  
      ?>
        <div id="validate-container">
          <div id="validate-warning">
            <h3>Incorrect password or username! </h3>
            <a href="index.php"><button >Ok</button></a>
          </div>
        </div>

      <?php
  	}
  }



 include("include/footer.php"); 
 }
 ?>


 <script type="text/javascript">
   
var close = document.getElementById("close");
close.onclick = function() {
  document.getElementById("box-container").style.display = "none";
}
 </script>}
