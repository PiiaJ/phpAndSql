<?php

session_start();

$servername = "127.0.0.1:51188";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "localdb";
$id = $_SESSION['id'];


	$BC1 = $_POST['BC1'];
	$BC2 = $_POST['BC2'];
	$BC3 = $_POST['BC3'];
	$BC4 = $_POST['BC4'];
	$BC5 = $_POST['BC5'];
	$BC6 = $_POST['BC6'];
	$BC7 = $_POST['BC7'];
	$BC8 = $_POST['BC8'];
	$BC9 = $_POST['BC9'];
	$BC10 = $_POST['BC10'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO basiccalc (ID,BC1,BC2,BC3,BC4,BC5,BC6,BC7,BC8,BC9,BC10)
VALUES ($id, $BC1,$BC2,$BC3,$BC4,$BC5,$BC6,$BC7,$BC8,$BC9,$BC10)";
  
  
  

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

		<!-- odottavat tietokantapäivitystä
		$units1 = $_POST['units1'];
		$units2 = $_POST['units2'];
		$units3 = $_POST['units3'];
		$units4 = $_POST['units4'];
		$units5 = $_POST['units5'];
		$units6 = $_POST['units6'];
		$units7 = $_POST['units7'];
		$units8 = $_POST['units8'];
		$units9 = $_POST['units9'];
		$units10 = $_POST['units10'];
		$units11 = $_POST['units11'];
		$units12 = $_POST['units12'];
		$units13 = $_POST['units13'];
		$units14 = $_POST['units14'];
		$units15 = $_POST['units15'];
		$units16 = $_POST['units16'];
		$units17 = $_POST['units17'];
		$units18 = $_POST['units18'];
		$units19 = $_POST['units19'];
		$units20 = $_POST['units20'];

		$per1 = $_POST['per1'];
		$per2 = $_POST['per2'];
		$per3 = $_POST['per3'];
		$per4 = $_POST['per4'];
		$per5 = $_POST['per5'];
		$per6 = $_POST['per6'];
		$per7 = $_POST['per7'];
		$per8 = $_POST['per8'];
		$per9 = $_POST['per9'];
		$per10 = $_POST['per10'];

		$esdn1 = $_POST['esdn1'];
		$esdn2 = $_POST['esdn2'];
		$esdn3 = $_POST['esdn3'];
		$esdn4 = $_POST['esdn4'];
		$esdn5 = $_POST['esdn5'];
		$esdn6 = $_POST['esdn6'];
		$esdn7 = $_POST['esdn7'];
		$esdn8 = $_POST['esdn8'];
		$esdn9 = $_POST['esdn9'];
		$esdn10 = $_POST['esdn10'];

		$roman1 = $_POST['roman1'];
		$roman2 = $_POST['roman2'];
		$roman3 = $_POST['roman3'];
		$roman4 = $_POST['roman4'];
		$roman5 = $_POST['roman5'];
		$roman6 = $_POST['roman6'];
		$roman7 = $_POST['roman7'];
		$roman8 = $_POST['roman8'];
		$roman9 = $_POST['roman9'];
		$roman10 = $_POST['roman10'];

		-->
		
<!-- Odottavat uusien taulujen luomista tietokantaan, joten kommentoitu ulos
  $sql = "INSERT INTO units (ID,units1,units2,units3,units4,units5,units6,units7,units8,units9,units10,units11,units12,units13,units14,units15,units16,units17,units18,units19,units20)
  VALUES ($id, $units1, $units2, $units3, $units4, $units5, $units6, $units7, $units8, $units9, $units10, $units11, $units12, $units13, $units14, $units15, $units16, $units17, $units18, $units19, $units20)";
  
  $sql = "INSERT INTO percentage (ID,per1,per2,per3,per4,per5,per6,per7,per8,per9,per10)
  VALUES ($id, $per1,$per2,$per3,$per4,$per5,$per6,$per7,$per8,$per9,$per10)";

$sql = "INSERT INTO expressions (ID,esdn1,esdn2,esdn3,esdn4,esdn5,esdn6,esdn7,esdn8,esdn9,esdn10)
VALUES ($id, $esdn1, $esdn2, $esdn3, $esdn4, $esdn5, $esdn6, $esdn7, $esdn8, $esdn9, $esdn10)";

$sql = "INSERT INTO roman (ID,roman1,roman2,roman3,roman4,roman5,roman6,roman7,roman8,roman9,roman10)
VALUES ($id, $roman1, $roman2, $roman3, $roman4, $roman5, $roman6, $roman7, $roman8, $roman9, $roman10)";
  -->