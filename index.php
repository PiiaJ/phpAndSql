<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Math exam</title>
        <link rel="stylesheet" href="./styles.css">
	</head>
	<body>
		<!-- Math test < php echo date("F j Y"); ?> -->
		Time limit: 60 minutes
	
		<form id="form1" action="new.php" method="post">
			Enter your Student ID:<br>
			<input type="text" name="id">
			<br>
			<br>
	  
			Enter your name:<br>
			<input type="text" name="name">
			<br>
			<br>
			
			
			<!-- Miten halutaan toteuttaa kokeen k‰ynnistys? Tuleeko nimi ja id omaan tiedostoon ja sitten teht‰v‰t toiseen tiedostoon vai j‰tet‰‰nkˆ kaikki 
			samaan? Jos laitetaan t‰h‰n kohtaan oma submit nappi, se voi 1. k‰ynnist‰‰ aikalaskurin 2. l‰hett‰‰ nimen ja id:n tietokantaan ja 3. n‰ytt‰‰ teht‰v‰t
			(css-tiedoston?) avulla. -->
			
		<input type="submit" value="Start exam!" name="start">
			
	</form>
		
		<!-- 
		Ehk‰ pit‰isi olla n‰ille eri toimenpiteille erilliset funktiot, joita kutsutaan checkResults()- ja start()-funktioista.
		Funktio checkResults() on tulosten laskemista varten. Funktion tulee tarkistaa, vastaako kirjoitettu tulos haettua tulosta ja jos ne t‰sm‰‰v‰t, annetaan teht‰v‰st‰ piste.
		Jos tulos on virheellinen, siit‰ tulee nolla pistett‰. HUOM! V‰‰r‰‰ vastausta voisi ehk‰ korostaa vaihtamalla tekstin v‰ri‰. Oikeat vastaukset voisi
		mahdollisesti n‰ytt‰‰ myˆs. Aikalaskuri pys‰htyy, jos aikaa on viel‰ j‰ljell‰. Jos aika loppuu, koetta ei voi en‰‰ jatkaa, vaan funktio k‰ynnistyy ja pisteet
		lasketaan valmiiden teht‰vien mukaan (lopuista 0 pistett‰).
		< php
		function checkResults() {
			echo "this function checks results (from database) and counts points";
			$points = 0;
		}
		if(isset($_POST["submit"])) { 
		return checkResults();
		}
		?>
		Funktio start() on kokeen aloittamista varten. Funktio k‰ynnist‰‰ aikalaskurin ja tuo kokeen kysymykset n‰kyviin sek‰ l‰hett‰‰ nimen + id:n tietokantaan.
		< php
		function start() {
			echo "this function starts countdown and shows the questions. Name and id are added to database";
		}
		if(isset($_POST["start"])) { 
		return start();
		}
		?>
		-->
		
</body>
</html>