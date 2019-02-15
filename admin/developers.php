<?php 
	$header = "Developers";
	require_once("../include/db_connection.php"); 
	require_once("../include/session.php"); 
	if (isset($_SESSION["start"])) {
	include("../include/header.php");
	require_once("../include/function.php");

?>

	<div id="developer">
		<img src="../img/developers/zalcee.jpg" id="myImg">
		<div id="div-info">
				<label>Facebook: </label><a href="http://facebook.com/zsongodanan" target="_blank">Zalcee Songodanan</a><br>
				<label>Email: </label><a href="gmail.com">zalceesongodanan18@gmail.com</a><br>
				<label>Cellphone number: </label><a href="#09303694006">09303694006</a>
				<center><b><label>Programmer</label></b></center>
		</div>
	</div>
	<div id="developer">
		<img src="../img/developers/anna.jpg" id="myImg1">
		<div id="div-info">
				<label>Facebook: </label><a href="https://www.facebook.com/annaaaaaalizaaaaaa" target="_blank">Annaliza Acevedo</a><br>
				<label>Email: </label><a href="gmail.com">annaacevedo16@gmail.com</a><br>
				<label>Cellphone number: </label><a href="#09064648309">09064648309</a>
				<center><b><label>Project Manager</label></b></center>
		</div>
	</div>
	<div id="developer">
		<div id="div-info">
				<label>Facebook: </label><a href="https://www.facebook.com/andreolvis" target="_blank">Andre Joseph Olvis</a><br>
				<label>Email: </label><a href="gmail.com">olvisandre@gmail.com</a><br>
				<label>Cellphone number: </label><a href="#09099551109">09099551109</a>
				<center><b><label>System Analyst</label></b></center>
		</div>
	</div>
	<div id="developer" style="left: 30.9%;">
		<img src="../img/developers/dominic.jpg" id="myImg3">
		<div id="div-info">
				<label>Facebook: </label><a href="https://www.facebook.com/chino.cruiz" target="_blank">Dominic Cruiz</a><br>
				<label>Email: </label><a href="gmail.com">chinocruizzz@gmail.com</a><br>
				<label>Cellphone number: </label><a href="#09076643619">09076643619</a>
				<center><b><label>Technical Writer</label></b></center>
		</div>
	</div>



	<!-- modal zalcee-->
	<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" src="../img/developers/zalcee.jpg">
  <div id="caption"></div>
</div>

<!-- modal anna -->
	<div id="myModal" class="modal">
	 <span class="close">&times;</span>
	 <img class="modal-content2" id="img02" src="../img/developers/zalcee.jpg">
	 <div id="caption1"></div>
	</div>

<?php
}
else {
	header("location:../index.php");
}

 ?>


