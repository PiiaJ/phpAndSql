<?php
// connection data

session_start();

$servername = "127.0.0.1:49426";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "localdb";
$id = $_SESSION['id'];

	// variables to send in database, if input is empty, send null
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

	$per1 = !empty($_POST['per1']) ? $_POST['per1'] : "NULL";
	$per2 = !empty($_POST['per2']) ? $_POST['per2'] : "NULL";
	$per3 = !empty($_POST['per3']) ? $_POST['per3'] : "NULL";
	$per4 = !empty($_POST['per4']) ? $_POST['per4'] : "NULL";
	$per5 = !empty($_POST['per5']) ? $_POST['per5'] : "NULL";
	$per6 = !empty($_POST['per6']) ? $_POST['per6'] : "NULL";
	$per7 = !empty($_POST['per7']) ? $_POST['per7'] : "NULL";
	$per8 = !empty($_POST['per8']) ? $_POST['per8'] : "NULL";
	$per9 = !empty($_POST['per9']) ? $_POST['per9'] : "NULL";
	$per10 = !empty($_POST['per10']) ? $_POST['per10'] : "NULL";

	$esdn1 = !empty($_POST['esdn1']) ? $_POST['esdn1'] : "NULL";
	$esdn2 = !empty($_POST['esdn2']) ? $_POST['esdn2'] : "NULL";
	$esdn3 = !empty($_POST['esdn3']) ? $_POST['esdn3'] : "NULL";
	$esdn4 = !empty($_POST['esdn4']) ? $_POST['esdn4'] : "NULL";
	$esdn5 = !empty($_POST['esdn5']) ? $_POST['esdn5'] : "NULL";
	$esdn6 = !empty($_POST['esdn6']) ? $_POST['esdn6'] : "NULL";
	$esdn7 = !empty($_POST['esdn7']) ? $_POST['esdn7'] : "NULL";
	$esdn8 = !empty($_POST['esdn8']) ? $_POST['esdn8'] : "NULL";
	$esdn9 = !empty($_POST['esdn9']) ? $_POST['esdn9'] : "NULL";
	$esdn10 = !empty($_POST['esdn10']) ? $_POST['esdn10'] : "NULL";

	$roman1 = !empty($_POST['roman1']) ? $_POST['roman1'] : "NULL";
	$roman2 = !empty($_POST['roman2']) ? $_POST['roman2'] : "NULL";
	$roman3 = !empty($_POST['roman3']) ? $_POST['roman3'] : "NULL";
	$roman4 = !empty($_POST['roman4']) ? $_POST['roman4'] : "NULL";
	$roman5 = !empty($_POST['roman5']) ? $_POST['roman5'] : "NULL";
	$roman6 = !empty($_POST['roman6']) ? $_POST['roman6'] : "NULL";
	$roman7 = !empty($_POST['roman7']) ? $_POST['roman7'] : "NULL";
	$roman8 = !empty($_POST['roman8']) ? $_POST['roman8'] : "NULL";
	$roman9 = !empty($_POST['roman9']) ? $_POST['roman9'] : "NULL";
	$roman10 = !empty($_POST['roman10']) ? $_POST['roman10'] : "NULL";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// variables for checking if person is allowed to do the exam
$idCheck = "SELECT * FROM basiccalc WHERE ID = $id"; 

$rs = mysqli_query($conn,$idCheck);

// if person's student id is already in database, the exam has been done and can't be done another time
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
} else {

	// variable for counting points
	$totalPoints = 0;
	$bcPoints = 0;
	$unitsPoints = 0;
	$perPoints = 0;
	$esdnPoints = 0;
	$romanPoints = 0;
	$i=1;


	echo '<br><span style="color:#000080;font-weight:bold;font-size:25px";>Exam results</span><br>';
	echo '<br><span style="color:#000080;font-weight:bold";>Correct answer /  Your answer </span><br>';

	// sends student id into database table
	$sql = "INSERT INTO basiccalc (ID) VALUES ($id)";

	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
	}
	echo '<br><span style="color:#000080;font-weight:bold";> Basic Calculations:  </span><br><br>';

	// basiccalc
	while ($i<=10){
		
		//create some variables that we are able to loop
		$presult = 'BC' . $i . 'res';
		$query = "SELECT * FROM results";
		$result = mysqli_query ($conn, $query);
		
		if ( mysqli_num_rows ($result) > 0){
			while($data = mysqli_fetch_array($result)){
				// this is the correct answer
				echo '<span style="font-weight:bold";>'.$data["$presult"].'  /  </span>';
				// result given is printed on screen and if answer is correct, points are added
				if (intval($data["$presult"]) == ${'BC'. $i}) {
					$totalPoints++;
					$bcPoints++;
					echo '<span style="color:#0f0;">'.${'BC'. $i}.'</span>';
				}	else {
					echo '<span style="color:#f00;">'.${'BC'. $i}.'</span>';
				}
				echo "<br>";

				// add data to database
				$sql = "UPDATE basiccalc  SET BC$i = ${'BC'.$i} WHERE ID = $id";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
				}
			}
		}else{
			echo "No Records Found!";
		}
		// add +1 to index
		$i+=1;	
	}
	// print how many points did user get from this part
	echo '<br><span style="color:#000080";> Basic Calculations points: '.$bcPoints.'/10 </span><br><br>';

	// reset index to 1
	$i=1;

	$sql = "INSERT INTO units (ID) VALUES ($id)";

	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
	}

	echo '<br><span style="color:#000080;font-weight:bold";> Units:  </span><br><br>';

	// units
	while ($i<=20){
		
		//create some variables that we are able to use in loop

		$presult = 'units' . $i . 'res';
		$query = "SELECT * FROM results";
		$result = mysqli_query ($conn, $query);
		
		if ( mysqli_num_rows ($result) > 0){
			while($data = mysqli_fetch_array($result)){
				echo '<span style="font-weight:bold";>'.$data["$presult"].'  /  </span>';
				// if answers are integer type
				if ($i > 8 && $i < 13 || $i > 16 && $i < 21) {
					if (intval($data["$presult"]) == ${'units'. $i}) {
						$totalPoints++;
						$unitsPoints++;
						echo '<span style="color:#0f0;">'.${'units'. $i}.'</span>';
					} else {
						echo '<span style="color:#f00;">'.${'units'. $i}.'</span>';
					}
				} else {
					// if answers are float type
					if (floatval($data["$presult"]) == ${'units'. $i}) {
						$totalPoints++;
						$unitsPoints++;
						echo '<span style="color:#0f0;">'.${'units'. $i}.'</span>';
					}	else {
						echo '<span style="color:#f00;">'.${'units'. $i}.'</span>';
					}
				}
				echo "<br>";
				$sql = "UPDATE units  SET unit$i = ${'units'.$i} WHERE ID = $id";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
				}
			}
		} else {
			echo "No Records Found!";
		}
	$i += 1;	
	}

	echo '<br><span style="color:#000080";> Units points: '.$unitsPoints.'/20  </span><br><br>';

	// reset i
	$i = 1;

	$sql = "INSERT INTO percentage (ID) VALUES ($id)";

	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
	}

	echo '<br><span style="color:#000080;font-weight:bold";> Percentages:  </span><br><br>';

	// percentages

	while ($i<=10){
		$presult = 'per' . $i . 'res';
		$query = "SELECT * FROM results";
		$result = mysqli_query ($conn, $query);

		if ( mysqli_num_rows ($result) > 0){
			while($data = mysqli_fetch_array($result)){
				echo '<span style="font-weight:bold";>'.$data["$presult"].'  /  </span>';
		
				if (intval($data["$presult"]) == ${'per'. $i}) {
					$totalPoints++;
					$perPoints++;
					echo '<span style="color:#0f0;">'.${'per'. $i}.'</span>';
				}	else {
					echo '<span style="color:#f00;">'.${'per'. $i}.'</span>';
				}
				echo "<br>";
				$sql = "UPDATE percentage SET per$i = ${'per'.$i} WHERE ID = $id";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
				}
			}
		}else{
			echo "No Records Found!";
		}
		$i+=1;	
		}
		echo '<br><span style="color:#000080";> Percentage points: '.$perPoints.'/10   </span><br><br>';

 		// reset i
 		$i=1;

 		$sql = "INSERT INTO expressions (ID) VALUES ($id)";

		if (!mysqli_query($conn, $sql)) {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
		}

		echo '<br><span style="color:#000080;font-weight:bold";> Expressions, Simplify, Division & Multiplication:  </span><br><br>';

	// expressions, simplify, division & multiplication
 	while ($i<=10){
		
		//create some variables that we are able to loop
		$presult = 'esdm' . $i . 'res';
		$query = "SELECT * FROM results";
		$result = mysqli_query ($conn, $query);
				
		if ( mysqli_num_rows ($result) > 0){
			while($data = mysqli_fetch_array($result)){
				echo '<span style="font-weight:bold";>'.$data["$presult"].'  /  </span>';
					// data is integer type
					if($i > 0 && $i < 4){	
						if (intval($data["$presult"]) == ${'esdn'. $i}) {
							$sql = "UPDATE expressions SET esdn$i = ${'esdn'.$i} WHERE ID = $id";
							if (!mysqli_query($conn, $sql)) {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
							}
							$totalPoints++;
							$esdnPoints++;
							echo '<span style="color:#0f0;">'.${'esdn'. $i}.'</span>';
						} else {
							echo '<span style="color:#f00;">'.${'esdn'. $i}.'</span>';
						}
					}
					// data is string type
					if($i > 3 && $i < 7){
						// trim string
						$stringTrim	= trim(${'esdn'. $i});
						if (strval($data["$presult"]) == $stringTrim) {
							$sql = "UPDATE expressions SET esdn$i = '$stringTrim' WHERE ID = $id";
							if (!mysqli_query($conn, $sql)) {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
							}
							$totalPoints++;
							$esdnPoints++;
							echo '<span style="color:#0f0;">'.${'esdn'. $i}.'</span>';
						} else {
							echo '<span style="color:#f00;">'.${'esdn'. $i}.'</span>';
						}
					}
					// data is float type
					if($i > 6 && $i <= 10){	
						if (floatval($data["$presult"]) == ${'esdn'. $i}) {
							$sql = "UPDATE expressions SET esdn$i = ${'esdn'.$i} WHERE ID = $id";
							if (!mysqli_query($conn, $sql)) {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
							}
							$totalPoints++;
							$esdnPoints++;
							echo '<span style="color:#0f0;">'.${'esdn'. $i}.'</span>';
						} else {
							echo '<span style="color:#f00;">'.${'esdn'. $i}.'</span>';
						}
					}
					echo "<br>";
				}
			}else {
				echo "No Records Found!";
			}
			$i+=1;	
		}
		echo '<br><span style="color:#000080";> Expressions, Simplify etc. points: '.$esdnPoints.'/10 </span><br><br>';

		$i = 1;

		$sql = "INSERT INTO roman (ID) VALUES ($id)";

		if (!mysqli_query($conn, $sql)) {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
		}

		echo '<br><span style="color:#000080;font-weight:bold";> Roman Numbers:  </span><br><br>';

	// roman numbers
	while ($i<=10){
		
		//create some variables that we are able to use in loop

			$presult = 'rom' . $i . 'res';
			$query = "SELECT * FROM results";
			$result = mysqli_query ($conn, $query);
	
			if ( mysqli_num_rows ($result) > 0){
				while($data = mysqli_fetch_array($result)){
					echo '<span style="font-weight:bold";>'.$data["$presult"].'  /  </span>';			
					if ($i > 0 && $i < 6) {
						if (intval($data["$presult"]) == ${'roman'.$i}) {
							$totalPoints++;
							$romanPoints++;
							echo '<span style="color:#0f0;">'.${'roman'. $i}.'</span>';
						} else {
							echo '<span style="color:#f00;">'.${'roman'. $i}.'</span>';
						}
					} else {
						$stringTrim=trim(${'roman'.$i});
						if (strval($data["$presult"]) == strtoupper($stringTrim)){
							$totalPoints++;
							$romanPoints++;
							echo '<span style="color:#0f0;">'.${'roman'. $i}.'</span>';
						}	else {
							echo '<span style="color:#f00;">'.${'roman'. $i}.'</span>';
						}
					}
					echo "<br>";
				}
			} else {
				echo "No Records Found!";
			}
			$i += 1;	
		} 
		echo '<br><span style="color:#000080";> Expressions, Simplify etc. points: '.$romanPoints.'/10 </span><br><br>';


 		$sql = "INSERT INTO grades (ID,exam) VALUES ($id, $totalPoints)";
			echo '<br><span style="color:#000080;font-weight:bold;font-size:25";> Your total points: ' . $totalPoints . ' </span><br><br>';

		if (!mysqli_query($conn, $sql)) {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
		}
		mysqli_close($conn);

	}

?>
