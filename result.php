<?php

session_start();

$servername = "127.0.0.1:49426";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "localdb";
$id = $_SESSION['id'];


    $BC1 = !empty($_POST['BC1']) ? $_POST['BC1'] : "NULL";
	$BC2 = !empty($_POST['BC2']) ? $_POST['BC2'] : "NULL";
	$BC3 = !empty($_POST['BC3']) ? $_POST['BC3'] : "NULL";
	$BC4 = !empty($_POST['BC4']) ? $_POST['BC4'] : "NULL";
	$BC5 = !empty($_POST['BC5']) ? $_POST['BC5'] : "NULL";
	$BC6 = !empty($_POST['BC6']) ? $_POST['BC6'] : "NULL";
	$BC7 = !empty($_POST['BC7']) ? $_POST['BC7'] : "NULL";
	$BC8 = !empty($_POST['BC8']) ? $_POST['BC8'] : "NULL";
	$BC9 = !empty($_POST['BC9']) ? $_POST['BC9'] : "NULL";
	$BC10 = !empty($_POST['BC10']) ? $_POST['BC10'] : "NULL";

    $units1 = !empty($_POST['units1']) ? $_POST['units1'] : "NULL";
	$units2 = !empty($_POST['units2']) ? $_POST['units2'] : "NULL";
	$units3 = !empty($_POST['units3']) ? $_POST['units3'] : "NULL";
	$units4 = !empty($_POST['units4']) ? $_POST['units4'] : "NULL";
	$units5 = !empty($_POST['units5']) ? $_POST['units5'] : "NULL";
	$units6 = !empty($_POST['units6']) ? $_POST['units6'] : "NULL";
	$units7 = !empty($_POST['units7']) ? $_POST['units7'] : "NULL";
	$units8 = !empty($_POST['units8']) ? $_POST['units8'] : "NULL";
	$units9 = !empty($_POST['units9']) ? $_POST['units9'] : "NULL";
	$units10 = !empty($_POST['units10']) ? $_POST['units10'] : "NULL";
	$units11 = !empty($_POST['units11']) ? $_POST['units11'] : "NULL";
	$units12 = !empty($_POST['units12']) ? $_POST['units12'] : "NULL";
	$units13 = !empty($_POST['units13']) ? $_POST['units13'] : "NULL";
	$units14 = !empty($_POST['units14']) ? $_POST['units14'] : "NULL";
	$units15 = !empty($_POST['units15']) ? $_POST['units15'] : "NULL";
	$units16 = !empty($_POST['units16']) ? $_POST['units16'] : "NULL";
	$units17 = !empty($_POST['units17']) ? $_POST['units17'] : "NULL";
	$units18 = !empty($_POST['units18']) ? $_POST['units18'] : "NULL";
	$units19 = !empty($_POST['units19']) ? $_POST['units19'] : "NULL";
	$units20 = !empty($_POST['units20']) ? $_POST['units20'] : "NULL";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$idCheck = "SELECT * FROM basiccalc WHERE ID = $id"; 

$rs = mysqli_query($conn,$idCheck);

if ($data = mysqli_fetch_array($rs, MYSQLI_NUM)) {
    echo "You have already done this exam!";
	$sql = "SELECT * FROM grades WHERE ID = $id";
	 if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo " Your result was:";
			while($row = mysqli_fetch_array($result)){
					echo " " . $row['exam'] . "/100.";
        }

        // Free result set
        mysqli_free_result($result);
		mysqli_close($conn);
	
		} else{
			echo "No records matching your query were found.";
		}
	}
}
else
	
{
	$totalPoints = 0;
	$bcPoints = 0;
	$unitsPoints = 0;
	$i=1;
	
	// basiccalc
	while ($i<=10){
		
		//create some variables that we are able to loop
		$value = '$BC' . $i . 'res';
		$column = '$BC' . $i;
		$presult = 'BC' . $i . 'res';
		$query = "SELECT * FROM results";
		
		$result = mysqli_query ($conn, $query);
		
		if ( mysqli_num_rows ($result) > 0){
			while($data = mysqli_fetch_array($result)){
				echo "Correct answer: ";
				echo $data["$presult"];
				
				if (intval($data["$presult"]) == ${'BC'. $i}) {
					$totalPoints++;
					$bcPoints++;
					echo " Your answer: ";
					echo ${'BC'. $i};
					echo " true";
				}	else {
					echo "Your answer: ";
					echo ${'BC'. $i};
					echo " false";
				}
				echo "<br>";
			}
		}else{
			echo "No Records Found!";
		}
	$i+=1;	
	}
	echo "Basic Calculations points: ".$bcPoints."/10 <br>";


	// units
	while ($i<=20){
		
		//create some variables that we are able to loop
		$value = '$units' . $i . 'res';
		$column = '$units' . $i;
		$presult = 'units' . $i . 'res';
		$query = "SELECT * FROM results";
		
		$result = mysqli_query ($conn, $query);
		
		if ( mysqli_num_rows ($result) > 0){
			while($data = mysqli_fetch_array($result)){
				echo "Correct answer: ";
				echo $data["$presult"];
				if ($i > 8 && $i < 13 || $i > 16 && $i < 21) {
					if (intval($data["$presult"]) == ${'units'. $i}) {
						$totalPoints++;
						$unitsPoints++;
						echo " Your answer: ";
						echo ${'units'. $i};
						echo " true";
					} else {
						echo "Your answer: ";
						echo ${'units'. $i};
						echo " false";
					}
				} else {
					if (floatval($data["$presult"]) == ${'units'. $i}) {
						$totalPoints++;
						$bcPoints++;
						echo " Your answer: ";
						echo ${'units'. $i};
						echo " true";
					}	else {
						echo " Your answer: ";
						echo ${'units'. $i};
						echo " false";
					}
				}
				echo "<br>";
			}
		} else {
			echo "No Records Found!";
		}
	$i += 1;	
	}
	echo "Your Units points: ".$unitsPoints."/20 <br>";
	$sql = "INSERT INTO grades (ID,exam)
	VALUES ($id, $totalPoints)";
   echo "Your total points: " .$totalPoints. "<br>";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
			} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}
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