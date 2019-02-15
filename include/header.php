<!DOCTYPE html>
<html>
	<head>
		<title>Online Catalog</title>
	<!-- 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<!-- <link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css"> -->
		<link rel="stylesheet" type="text/css" href="../css/print.css" media="print">
		<!-- <meta http-equiv="refresh" content="1"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script type="text/javascript" src="../js/index.js"></script>
		<?php 
			if (file_exists("js/index.js")) {
				?>
					<script type="text/javascript" src="js/index.js"></script>
				<?php
			}
			else if (file_exists("../js/index.js")) {
				?>
					<script type="text/javascript" src="../js/index.js"></script>
				<?php
			}
			else {
				?>
					<script type="text/javascript" src="../../js/index.js"></script>
				<?php
			}

		 ?>
		<link rel="shortcut icon" href="laurel.png">
		<script type="text/javascript" src="../js/find.js"></script>

		<?php 

		if (file_exists("css/style.css")) {
		?>
			<link rel="stylesheet" type="text/css" href="css/style.css">

			<?php
			}
			elseif (file_exists("../css/style.css")) {
				?>
					<link rel="stylesheet" type="text/css" href="../css/style.css">
				<?php
			}
			else {
				?>
					<link rel="stylesheet" type="text/css" href="../../css/style.css">
				<?php
			}



			if (file_exists("js/find.js")) {
		?>
			<script type="text/javascript" src="js/find.js"></script>
			<script type="text/javascript" src="js/index.js"></script>

			<?php
			}
			elseif (file_exists("../js/find.js")) {
				?>
					<script type="text/javascript" src="../js/index.js"></script>
				<?php
			}
			else {
				?>
					<script type="text/javascript" src="../../js/index.js"></script>
				<?php
			}

			?>
			
	</head>
	<body>
		<div id="container-header">
			<?php 
				if (file_exists("img/header.png")) {
					?>
						<img src="img/header.png" alt="" id="head_tag">
					<?php
				}
				else if (file_exists("../img/header.png")) {
					?>
						<img src="../img/header.png" alt="" id="head_tag">
					<?php
				}
				else {
					?>
						<img src="../../img/header.png" alt="" id="head_tag">
					<?php
				}
			 ?>
			
			
			

			<header>
				
				<?php 
				// $log = isset($_SESSION["start"]) ? $_SESSION["start"] : "LOGIN";
				// $_SESSION["start"] = $uname;
				// 	if ($in == $_SESSION["start"]) {
				// 		$log = "logout";
				// 	}
				// 	else {
				// 		$log = "login";
				// 	}

				if (isset($_SESSION["start"])) {

					$query = "SELECT * FROM admin_tbl";
					$result = mysqli_query($connection, $query);
					$rows = mysqli_fetch_array($result);


					?>	

						
						<div id="user-container">
							<?php 
								if (file_exists("index.php")) {
									?>
										<a href="index.php"><h1 id="h1"> <?php echo $header; ?></h1></a>
									<?php
								}
								elseif (file_exists("../index.php")) {
									?>
										<a href="../index.php"><h1 id="h1"> <?php echo $header; ?></h1></a>
									<?php
								}
								else {
									?>
										<a href="../../index.php"><h1 id="h1"> <?php echo $header; ?></h1></a>
									<?php
								}
							 ?>
							<div id="user">
								<?php 
									if (file_exists("img/user.png")) {
										?>
											<img src="img/user.png" alt="" id="user_img">
										<?php
									}
									else if (file_exists("../img/user.png")) {
										?>
											<img src="../img/user.png" alt="" id="user_img">
										<?php
									}
									else {
										?>
											<img src="../../img/user.png" alt="" id="user_img">
										<?php
									}
								 ?>

								
								
								
								<p id="user_click"><?php echo ucfirst($rows["fname"])  . " " . ucfirst($rows["lname"]) ?></p>
								<div id="user-hover">
									<div id="user-li"></div>
									<ul id="user-ul">
										<li><a href="?admin_setting">Admin Setting</a></li>
										<li><a href="?developers">Developers</a></li>
										<li><a href="?logout">Logout</a></li>
										<?php 
											if (isset($_GET["developers"])) {
												if (file_exists("admin/developers.php")) {
													header("location:admin/developers.php");
												}
												elseif (file_exists("../admin/developers.php")) {
													header("location:../admin/developers.php");
												}
												else {
													header("location:../../admin/developers.php");
												}
											}



											if (isset($_GET["admin_setting"])) {
												if (file_exists("admin/admin_settings.php")) {
													header("location:admin/admin_settings.php");
												}
												elseif (file_exists("../admin/admin_settings.php"))  {
													header("location:../admin/admin_settings.php");
												}
												else {
													header("location:../../admin/admin_settings.php");
												}
											}
										 ?>
									</ul>

								</div>
							</div>
						</div>
					<?php
					
						if (isset($_GET["logout"])) {
							unset($_SESSION["start"]);
							if (file_exists("index.php")) {
								header("location:index.php");
							}
							elseif (file_exists("../index.php")) {
								header("location:../index.php");
							}
							else {
								header("location:../../index.php");
							}
							
						}

						
				}
				else {
					?>
						<a href="#login" onclick="showBox()" class="login">Login</a>
						<h1>Lasalliana Online Catalog </h1>
					<?php
				}


				 ?>
				<!-- <a href="#" onclick="showBox()"><?php echo $log; ?></a> -->
			</header>