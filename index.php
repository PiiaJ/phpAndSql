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
			
			
			<!-- Miten halutaan toteuttaa kokeen käynnistys? Tuleeko nimi ja id omaan tiedostoon ja sitten tehtävät toiseen tiedostoon vai jätetäänkö kaikki 
			samaan? Jos laitetaan tähän kohtaan oma submit nappi, se voi 1. käynnistää aikalaskurin 2. lähettää nimen ja id:n tietokantaan ja 3. näyttää tehtävät
			(css-tiedoston?) avulla. -->
			
		<input type="submit" value="Start exam!" name="start">
			
			
			<!-- Joko aikalaskuri tai päättymisajan tulostus näkyviin varsinaiselle koesivulle -->
			
			<!-- Esimerkki aikalaskurista (countdown)

			// Set the date we're counting down to, meidän tapauksessa timestamp + 1 tunti
			var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

  			// Get today's date and time
  			var now = new Date().getTime();

  			// Find the distance between now and the count down date
  			var distance = countDownDate - now;

  			// Time calculations for hours, minutes and seconds
  			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  			// Display the result in the element with id="demo"
  			document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  			+ minutes + "m " + seconds + "s ";

  			// If the count down is finished, write some text, meidän tapauksessa käynnistyisi checkResults()-funktio
  			if (distance < 0) {
    				clearInterval(x);
    				document.getElementById("demo").innerHTML = "EXPIRED";
 			}
			}, 1000);

			-->
			
			<!-- Progress bar, jos halutaan laittaa. Value +1 jokaisesta vastauksesta. Tehtäviä yht. 57.
			<label for="file">Your progress:</label>
			<progress id="file" value="0" max="57"> 0 % </progress>
			-->
	</form>
		
		<!-- 
		Ehkä pitäisi olla näille eri toimenpiteille erilliset funktiot, joita kutsutaan checkResults()- ja start()-funktioista.
		Funktio checkResults() on tulosten laskemista varten. Funktion tulee tarkistaa, vastaako kirjoitettu tulos haettua tulosta ja jos ne täsmäävät, annetaan tehtävästä piste.
		Jos tulos on virheellinen, siitä tulee nolla pistettä. HUOM! Väärää vastausta voisi ehkä korostaa vaihtamalla tekstin väriä. Oikeat vastaukset voisi
		mahdollisesti näyttää myös. Aikalaskuri pysähtyy, jos aikaa on vielä jäljellä. Jos aika loppuu, koetta ei voi enää jatkaa, vaan funktio käynnistyy ja pisteet
		lasketaan valmiiden tehtävien mukaan (lopuista 0 pistettä).

		< php
		function checkResults() {
			echo "this function checks results (from database) and counts points";
			$points = 0;
		}
		if(isset($_POST["submit"])) { 
		return checkResults();
		}
		?>

		Funktio start() on kokeen aloittamista varten. Funktio käynnistää aikalaskurin ja tuo kokeen kysymykset näkyviin sekä lähettää nimen + id:n tietokantaan.

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
