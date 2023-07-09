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

		<?php
		//  $nula = 0;
		  $predmet = $_POST['predmet'];
		  $datum = $_POST['datum'];
		  $znamka = $_POST['znamka'];
  
			$spojeni = mysqli_connect("localhost", "2307899ecz", "", "studijniprumer");
			if (!$spojeni) die("Nepodařilo se připojit k DB serveru: " . mysqli_connect_error());

			else {
			  echo "Spojení s databází proběhlo úspěšně.<br />";
			  $spojeni->query("INSERT INTO `studijní průměr`(id, predmet, datum, znamka) VALUES (0, '$predmet', '$datum', '$znamka')");
		
 
			}
  
			?>
			&nbsp;&nbsp;&nbsp;&nbsp;

	 <article id="work" class="wrapper style3">
		<div class="container">
					<header>
						<h2>Data byla vložena.</h2>
					</header>
			<footer>
						<a href="index.php" class="button large scrolly">Návrat do menu. </a>
			</footer>
		</div>
	</article>

	</body>
</html>