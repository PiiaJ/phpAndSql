<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Math exam</title>
        <link rel="stylesheet" href="./styles.css">
	</head>
	<body>

		<p style="font-weight:bold">This is your math exam. Please fill in your student id and your name to begin. <br> 
		You have 1 hour to finish. Time starts when you click Start exam. </p>
	
		<form id="form1" action="new.php" method="post">
			Enter your Student ID:<br>
			<input type="text" name="id">
			<br>
			<br>
	  
			Enter your name:<br>
			<input type="text" name="name" style="width:200px;">
			<br>
			<br>
			
		
		<input type="submit" value="Start exam" name="start">
			
	</form>
		
</body>
</html>