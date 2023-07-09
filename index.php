<!DOCTYPE HTML>
<!--
	Miniport by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>PIS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="logo.jpg" />
	</head>
	<body class="is-preload">

		<!-- Nav -->
			<nav id="nav">
				<ul class="container">
					<li><a href="#top">Top</a></li>
					<li><a href="#work">Databáze</a></li>
				</ul>
			</nav>

		<!-- Home -->
			<article id="top" class="wrapper style1">
				<div class="container">
					<div class="row">
						<div class="col-4 col-5-large col-12-medium">
							<span class="image fit"><img src="fotka.png" alt="" /></span>
						</div>
						<div class="col-8 col-7-large col-12-medium">
							<header>
								<h1>PIS Základy informačních a <br><br> komunikačních technologií.</h1>
							</header>
							<p>Tato stránka vznikla na základě zadání projektu. Cílem bylo vytvořit stránku která by měla vypisovat výsledky zkoušek z databáze. Následně vybrat nejlepší, nejhorší známu a spočítat průměr . Tuto stránku vytvořil Michal Český student VUT v Brně.</p>
						</div>
					</div>
				</div>
			</article>


		<!-- Portfolio -->
			<article id="work" class="wrapper style3">
				<div class="container">
					<header>
						<h2>Databáze studijních průměrů</h2>
						<p>Zde se zobrazuje výpis z databáze.</p>
					</header>
					<div class="obsah">

					<?php
					
					// pripojeni k DB serveru a uložení relace do proměnné
					$spojeni = mysqli_connect("localhost", "2307899ecz", "", "studijniprumer");
					if (!$spojeni) die("Nepodařilo se připojit k DB serveru: " . mysqli_connect_error());
					
					// vytvoření dotazu: Výpis celé tabulky
					$dotaz = "SELECT * FROM `studijní průměr`";
					

					
					// mysqli_query odešle dotaz na DB server, vráti dvojrozměrné pole dat
					$data = mysqli_query($spojeni, $dotaz);
					
					
					echo "<p>Výpis studijních průměrů:</p>";
					echo "<p><table class='stdprum'>";
					echo "<tr>
							<th>Předmět</th> <th>Datum</th> <th>Známk</th>
						  </tr>";
					
					// pole dat vyčteme po jednom řádku pomocí cyklu while
					while ($radek = mysqli_fetch_array($data, MYSQLI_ASSOC)){
						echo "<tr>";
						echo "<td>".$radek['predmet']."</td>";
						echo "<td>".$radek['datum']."</td>";
						echo "<td>".$radek['znamka']."</td>";
						echo "<tr>";
						echo "</tr>";
					}
					
					echo "</table></p>";
					
					echo "<p><table class='nejlepsi'>";
					
					foreach($spojeni->query('SELECT MIN(znamka)FROM `studijní průměr`') as $row) {
					echo "<tr>"; 
					echo "<td>Nejlepší známka: ". $row['MIN(znamka)'] . "</td>";
					echo "</tr>";
					}

					echo("</table>");


					echo "<p><table class='nejhorsi'>";

					foreach($spojeni->query('SELECT MAX(znamka)FROM `studijní průměr`') as $row) {
					echo "<tr>"; 
					echo "<td>Nejhorší známka: ". $row['MAX(znamka)'] . "</td>";
					echo "</tr>";
					}

					echo("</table>");

					echo "<p><table class='prumer'>";

					foreach($spojeni->query('SELECT AVG(znamka)FROM `studijní průměr`') as $row) {
					echo "<tr>"; 
					echo "<td>Průměr známek: ". $row['AVG(znamka)'] . "</td>";
					echo "</tr>";
					}

					echo("</table>");


					// ukončíme spojení s DB serverem
					mysqli_close($spojeni);

					
					
				?>
			

					</div>
					<footer>
						<a href="vysledky.html" class="button large scrolly">Přidat výsledek</a>
					</footer>
				</div>
			</article>

		<!-- Contact -->
			<article id="contact" class="wrapper style4">
				<div class="container medium">
					
						<div class="col-12">
							<hr />
							<h3>Najdete mě na ...</h3>
							<ul class="social">
								<li><a href="https://twitter.com/MichalCesky" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="https://www.facebook.com/cesky.michal/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="https://www.instagram.com/michal_cesky/" class="icon brands fa-instagram"><span class="lable">Instagram</span></a></li>
								<!--
								<li><a href="#" class="icon solid fa-rss"><span>RSS</span></a></li>
								<li><a href="#" class="icon brands fa-instagram"><span>Instagram</span></a></li>
								<li><a href="#" class="icon brands fa-foursquare"><span>Foursquare</span></a></li>
								<li><a href="#" class="icon brands fa-skype"><span>Skype</span></a></li>
								<li><a href="#" class="icon brands fa-soundcloud"><span>Soundcloud</span></a></li>
								<li><a href="#" class="icon brands fa-youtube"><span>YouTube</span></a></li>
								<li><a href="#" class="icon brands fa-blogger"><span>Blogger</span></a></li>
								<li><a href="#" class="icon brands fa-flickr"><span>Flickr</span></a></li>
								<li><a href="#" class="icon brands fa-vimeo"><span>Vimeo</span></a></li>
								-->
							</ul>
							<hr />
						</div>
					</div>
					<footer>
						<ul id="copyright">
							<li>&copy; Michal Český. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>
				
			</article>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>