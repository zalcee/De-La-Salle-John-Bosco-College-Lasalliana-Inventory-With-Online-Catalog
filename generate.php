<?php 	
	
	header("Content-Type: image/png");
	require "vendor/autoload.php";
	// require_once("include/function.php");
	require_once("include/db_connection.php");



	use Endroid\QrCode\ErrorCorrectionLevel;
	use Endroid\QrCode\LabelAlignment;
	use Endroid\QrCode\QrCode;
	use Endroid\QrCode\Response\QrCodeResponse;
	
	$item_number = $_GET["item_number"];
	$query = "SELECT * FROM admin_settings";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);
	$ip = $row["first_octate"].".".$row["second_octate"].".".$row["third_octate"].".".$row["last_octate"];

	$qrcode = new QrCode("http://".$ip."/online_catalog/list.php?item_number=".$item_number);

	echo $qrcode->writeString();
	die();
 ?>


 <a href="" onclick="print()"></a>