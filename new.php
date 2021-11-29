<?php

session_start();

$servername = "127.0.0.1:49426";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "localdb";
$id = $_POST['id'];
$name = $_POST['name'];
$_SESSION['id'] = $id;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO laskuri (ID,Name)
VALUES ($id, '$name')";
  
$idCheck = "SELECT * FROM laskuri WHERE ID = $id"; 

$rs = mysqli_query($conn,$idCheck);

// Check if the person has already made this exam or if new user should be added to database.
if ($data = mysqli_fetch_array($rs, MYSQLI_NUM)) {
    echo "You have already done this exam!";
	mysqli_close($conn);
	header("Location: https://2001277.azurewebsites.net/mathtest/result.php"); 
	exit();
} else {
	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn). "<br>" ;
	}

echo "<br><br>";

mysqli_close($conn);
}

if(!isset($_SESSION['active_count'])){
    $_SESSION['active_count'] = 3600;
    $_SESSION['time_started'] = time();
}

$now = time();

$final_remain_time = $now - $_SESSION['time_started'];
$remainingSeconds = abs($_SESSION['active_count'] - $final_remain_time);
$remainingMinutes = round($remainingSeconds/60);

if($remainingSeconds < 1){
   echo "Your time is up!";

}


?>
		
	<html>	
		<head>
		        <link rel="stylesheet" href="./styles.css">
		</head>
		<body>
		<form id="form2" action="result.php" method="post">
		
			<h4> Welcome <?php echo $_POST["name"]; ?>, <?php echo $_POST["id"]; ?>! Your exam has started.</h4>
			
			
			<?php
			// show starting and finishing time
			$endTime = time() + (60 * 60);
			echo 'Starting time:  '.date('H:i:s', time());
			echo "<br>";
			echo 'Your time will finish:  '.date('H:i:s', $endTime);
			?>
			
			<br><br>
			
			<!-- Progress bar, shows how exam progresses. For every answer given progress +1, if answer is set as empty, progress -1.  Total of tasks 57.-->
			<label for="progression">Your progress:</label>
			<progress id="progression" value="0" max="57"></progress>
			
			<br><br>
			Notice that you need to use point(.) as decimal separator.
		
			<h2>Basic Calculations 10 Points</h2>
			<ol>
				<li> 98 - 56 + 45 = <input type="number" name="BC1" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 376 - 678 + 236 = <input type="number" name="BC2" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 6 x 7 - 9 x 5 = <input type="number" name="BC3" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 56 x 5 + 23 x 9 - 567 = <input type="number" name="BC4" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 5.6 x 34 + 21 / 7 = <input type="number" name="BC5" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 123.45 x 5.5 = <input type="number" name="BC6" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 3276.45 / 8 = <input type="number" name="BC7" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 748.5 / 1.5 = <input type="number" name="BC8" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 45600 / 100 = <input type="number" name="BC9" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 8763 x 100 = <input type="number" name="BC10" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
			</ol>
			
   			<h2>Units 20 Points</h2>
			Change to milligrams<br>                                        
			<ol>
  		 		<li>  925 micrograms = <input type=number step=any name="units1" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> mg</li>
				<li> 200 micrograms = <input type=number step=any name="units2" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> mg</li>
				<li> 1386 micrograms = <input type=number step=any name="units3" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> mg</li>
				<li> 500 micrograms = <input type=number step=any name="units4" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> mg</li>
			</ol>

			Change to grams<br> 
			<ol>
				<li> 7260 mg = <input type=number step=any name="units5"  onclick="hasText(this.value)" onchange="makeProgress(this.value)"> g</li>
				<li> 80 mg = <input type=number step=any name="units6" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> g</li>
				<li> 135 mg = <input type=number step=any name="units7" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> g</li>
				<li> 1250 mg = <input type=number step=any name="units8" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> g</li>
			</ol>
		
			Change to milliliters<br>
			<ol>
				<li> 4.5 l = <input type=number step=any name="units9" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> ml</li>
				<li> 0.9 l = <input type=number step=any name="units10" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> ml</li>
				<li> 8.5 l = <input type=number step=anyname="units11" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> ml</li>
				<li> 2.2 l = <input type=number step=anyname="units12" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> ml</li>
			</ol>
		
			Change to liters<br>
			<ol>
				<li> 70 ml = <input type=number step=any name="units13" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> l</li>
				<li> 725 ml = <input type=number step=any name="units14" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> l</li>
				<li> 1575 ml = <input type=number step=any name="units15" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> l</li>
				<li> 3300 ml = <input type=number step=any name="units16" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> l</li>
			</ol>

			Change to micrometer<br>
			<ol>
				<li> 128 mm = <input type=number step=any name="units17" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> micrometers</li>
				<li> 32 mm = <input type=number step=any name="units18" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> micrometers</li>
				<li> 3.55 mm = <input type=number step=any name="units19" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> micrometers</li>
				<li> 22.45 mm = <input type=number step=any name="units20" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> micrometers</li>
			</ol>
						
			<h2> Percentage 10 Points</h2>
			What is
			<ol>
				<li> 10 % of 2500 = <input type="number" name="per1" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 30 % of 4700 = <input type="number" name="per2" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 50 % of 7500 = <input type="number" name="per3" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 80 % of 9200 = <input type="number" name="per4" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 15 % of 1100 = <input type="number" name="per5" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 35 % of 2200 = <input type="number" name="per6" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
				<li> 42 % of 4800 = <input type="number" name="per7" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li>
			</ol>
		
			Find the percentage<br>
			<ol>
				<li> 1500 ml out of 2500 ml = <input type="number" name="per8" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> %</li> 
				<li> 1200 ml out of 4000 ml = <input type="number" name="per9" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> %</li> 
				<li> 650 ml out of 1000 ml = <input type="number" name="per10" onclick="hasText(this.value)" onchange="makeProgress(this.value)"> %</li> 
			</ol>

			<h2>Expressions / Simplify / Division & Multiplication (by 10, 100, 1000) 10 Points</h2>
			<ol>
				<li> x + 45 = 35 What is x? x = <input type=number step=any name="esdn1" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> x - 526 = 445 What is x? x = <input type=number step=any name="esdn2" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> If x = 5 then 2x + 3 - x = <input type=number step=any name="esdn3" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
			</ol>

			Simplify<br>
			<ol>
				<li> 275/400 = <input type="text" name="esdn4" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 60/375 = <input type="text" name="esdn5" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 125/300 = <input type="text" name="esdn6" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
			</ol>
	
			Division & Multiplication<br>
			<ol>
				<li> 8.25 / 1000 = <input type=number step=any name="esdn7" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 6.26 x 100 = <input type=number step=any name="esdn8" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 3.87 x 10 = <input type=number step=any name="esdn9" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 2.29 / 100 = <input type=number step=any name="esdn10" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
			</ol>

			<h2>Roman Numbers 10 Points</h2>
			<ol>
				<li> IX = <input type="number" name="roman1" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> XXXIX = <input type="number" name="roman2" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> XXII = <input type="number" name="roman3" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> XVI = <input type="number" name="roman4" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> XLIV = <input type="number" name="roman5" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 48 = <input type="text" name="roman6" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 32 = <input type="text" name="roman7" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 20 = <input type="text" name="roman8" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 14 = <input type="text" name="roman9" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
				<li> 45 = <input type="text" name="roman10" onclick="hasText(this.value)" onchange="makeProgress(this.value)"></li> 
			</ol>
			
			<input type="submit" value="Finish exam!" name="submit">
		</form>
		</body>
		
		<script>
		// function to find out if input box has any data inside it 
		let hasValue = false;
		var eType = element.getAttribute('type');
		function hasText(value) {
			if (value === "" ) {
				hasValue = false;
			} else if (value !== "" && !isNaN(value) && eType===number) {
				hasValue = true;
			} else if (value !== "" && eType===text) {
				hasValue = true;
			} 
		}

		// function to change progress in progress bar
		function makeProgress(value) {
			if (hasValue == false) {
				if (value !== "") {
				document.getElementById("progression").value += 1; 
				}
			} else if (hasValue == true) {
				if (value === "") {
				document.getElementById("progression").value -= 1;
				}
			} 
		}
		

		</script>
		</html>
		