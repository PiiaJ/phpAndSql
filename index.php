<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Basic Input</title>
        <link rel="stylesheet" href="../css/styles.css">
	</head>
	<body>
	
		<form action="new.php" method="post">
			Enter your Student ID:<br>
			<input type="text" name="id">
			<br>
			<br>
	  
			Enter your name:<br>
			<input type="text" name="name">
			<br>
			<br>
			
			<h2>Basic Calculations 10 Points</h2><br>
			<ol>
				<li> 98-56+45=<input type="text" name="BC1"></li>
				<li> 376-678+236=<input type="text" name="BC2"></li>
				<li> 6x7-9x5=<input type="text" name="BC3"></li>
				<li> 56x5+23x9-567=<input type="text" name="BC4"></li>
				<li> 5.6x34+21/7=<input type="text" name="BC5"></li>
				<li> 123.45x5.5=<input type="text" name="BC6"></li>
				<li> 3276.45=<input type="text" name="BC7"></li>
				<li> 748.5/1.5=<input type="text" name="BC8"></li>
				<li> 45600/100=<input type="text" name="BC9"></li>
				<li> 8763x100=<input type="text" name="BC10"></li>
			</ol>
			
			<input type="submit" value="Send input!">
			<!-- Kirjoitettu valmiiksi, mutta kommentoitu vielä ulos.
			<br><br>
   			<h2>Units 20 Points</h2><br>
			Change to milligrams<br>
			<ol>
  		 		<li>  925 micrograms =<input type="text" name="units1"></li>
				<li> 200 micrograms<input type="text" name="units2"></li>
				<li> 1386 micrograms=<input type="text" name="units3"></li>
				<li> 500 micrograms=<input type="text" name="units4"></li>
			</ol>
			<br>
			Change to grams<br>
			<ol>
				<li> 7260 mg =<input type="text" name="units5"></li>
				<li> 80 mg =<input type="text" name="units6"></li>
				<li> 135 mg =<input type="text" name="units7"></li>
				<li> 1250 mg =<input type="text" name="units8"></li>
			</ol>
			<br>
			Change to milliliters<br>
			<ol>
				<li> 4.5 l=<input type="text" name="units9"></li>
				<li> 0.9 l=<input type="text" name="units10"></li>
				<li> 8.5 l=<input type="text" name="units11"></li>
				<li> 2.2 l=<input type="text" name="units12"></li>
			</ol>
			<br>
			Change to liters<br>
			<ol>
				<li> 70 ml =<input type="text" name="units13"></li>
				<li> 725 ml =<input type="text" name="units14"></li>
				<li> 1575 ml =<input type="text" name="units15"></li>
				<li> 3300 ml =<input type="text" name="units16"></li>
			</ol>
			<br>
			Change to micrometer<br>
			<ol>
				<li> 128 mm =<input type="text" name="units17"></li>
				<li> 32 mm=<input type="text" name="units18"></li>
				<li> 3.55 mm=<input type="text" name="units19"></li>
				<li> 22.45 mm=<input type="text" name="units20"></li>
			</ol>
			<br><br>
			
			<h2> Percentage 10 Points</h2><br>
			What is
			<ol>
				<li> 10 % of 2500=<input type="text" name="per1"></li>
				<li> 30 % of 4700=<input type="text" name="per2"></li>
				<li> 50 % of 7500=<input type="text" name="per3"></li>
				<li> 80 % of 9200=<input type="text" name="per4"></li>
				<li> 15 % of 1100=<input type="text" name="per5"></li>
				<li> 35 % of 2200=<input type="text" name="per6"></li>
				<li> 42 % of 4800=<input type="text" name="per7"></li>
			</ol>
			<br>
			Find the percentage<br>
			<ol>
				<li> 1500 ml out of 2500 ml =<input type="text" name="per8"></li> 
				<li> 1200 ml out of 4000 ml =<input type="text" name="per9"></li> 
				<li> 650 ml out of 1000 ml =<input type="text" name="per10"></li> 
			</ol>
			<br><br>
			
			<h2>Expressions / Simplify / Division & Multiplication (by 10, 100, 1000) 10 Points</h2><br>
			<ol>
				<li> x+45=35 What is x? x=<input type="text" name="esdn1"></li> 
				<li> x-526=445 What is x? x=<input type="text" name="esdn2"></li> 
				<li> If x=5 then 2x+3-x= <input type="text" name="esdn3"></li> 
			</ol>
			<br>
			Simplify<br>
			<ol>
				<li> 275/400 =<input type="text" name="esdn4"></li> 
				<li> 60/375 =<input type="text" name="esdn5"></li> 
				<li> 125/300 =<input type="text" name="esdn6"></li> 
			</ol>
			<br>
			Division & Multiplication<br>
			<ol>
				<li> 8.25 / 1000=<input type="text" name="esdn7"></li> 
				<li> 6.26 x 100=<input type="text" name="esdn7"></li> 
				<li> 3.87 / 10=<input type="text" name="esdn7"></li> 
				<li> 2.29 / 100=<input type="text" name="esdn7"></li> 
			</ol>
			<br><br>
			
			<h2>Roman Numbers 10 Points</h2><br>
			<ol>
				<li> IX =<input type="text" name="roman1"></li> 
				<li> XXXIX =<input type="text" name="roman2"></li> 
				<li> XXII =<input type="text" name="roman3"></li> 
				<li> XVI =<input type="text" name="roman4"></li> 
				<li> XLIV =<input type="text" name="roman5"></li> 
				<li> 48 =<input type="text" name="roman6"></li> 
				<li> 32 =<input type="text" name="roman7"></li> 
				<li> 20 =<input type="text" name="roman8"></li> 
				<li> 14 =<input type="text" name="roman9"></li> 
				<li> 45 =<input type="text" name="roman10"></li> 
			</ol>
			-->    
		</form>
</body>
</html>
