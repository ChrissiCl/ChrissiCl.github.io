<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Ranking</title>
		<link href="images/quiz_favicon.ico" rel="icon" type="image/x-icon">
		<meta name="author" content="Christina Clemens">
		<link href="styles/style.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet" type="text/css">
	</head>
	<body class="ranking">
		<header>
			<h1>CQuiz</h1>
			<img src="images/cquiz_logo.png" alt="Fragezeichen-Logo" id="logo">
			<input type="checkbox" id="responsive-nav">
			<label for="responsive-nav" class="responsive-nav-label"><span>&#9776;</span></label>
			<?php include('menu.shtml'); ?>
		</header>
		<main class="rankingmain">
		<h2 class="h2ranking"><span>Ranking &#x1F3C6;</span></h2>
		<label for="rankingdropdown">Wähle ein Quiz aus, für das du das Ranking sehen möchtest:</label><br>
		<select id="rankingdropdown">
			<optgroup label="Standardquiz">
				<option value="Quiz_3">Quiz 3</option>
				<option value="Quiz_4">Quiz 4</option>
				<option value="Quiz_5">Quiz 5</option>
				<option value="Quiz_6">Quiz 6</option>
				<option value="Quiz_7">Quiz 7</option>
				<option value="Quiz_8">Quiz 8</option>
			</optgroup>
			<optgroup label="Themenquiz">
				<option value="Quiz_zum_1._Mai">Quiz zum 1. Mai</option>
				<option value="Themenquiz_Friuiher_und_Heute">Themenquiz Früher und Heute</option>
				<option value="Norwegenquiz_zum_17._Mai">Norwegenquiz zum 17. Mai</option>
				<option value="Quiz_zu_Himmelfahrt">Quiz zu Himmelfahrt</option>
				<option value="Quiz_zu_Pfingsten">Quiz zu Pfingsten</option>
				<option value="Sommerquiz">Sommerquiz</option>
				<option value="Filmquiz">Filmquiz</option>
				<option value="Herbstquiz">Herbstquiz</option>
				<option value="Zahlspezial">Zahl Spezial!</option>
			</optgroup>
			<optgroup label="Sonderquiz">
				<option value="Advent">Advent</option>
			</optgroup>
		</select>
		<?php
		$jsonDaten = file_get_contents("scripts/rankingdaten.json");
		$myRanking = json_decode($jsonDaten, True);
		$angefragterQuizname = $_GET["quizname"];
		function quiznummer($name, $liste){
			$nummer = 0;
			foreach($liste as $key=>$val){
				if ($name == $val["quizname"]){
					return $nummer;
				}
				$nummer = $nummer + 1;
			}
			return False;
		}
		function quizvorhanden($name, $liste){
			foreach($liste as $key=>$val){
				if ($name == $val["quizname"]){
					return True;
				}
			}
			return False;
		}
		if (quizvorhanden($angefragterQuizname, $myRanking["ranking"])) {
			$infos = $myRanking["ranking"][quiznummer($angefragterQuizname, $myRanking["ranking"])];
			$user = $infos["user"];
			foreach ($user as $key => $row){
				$name[$key] = $row["name"];
				$punktzahl[$key] = $row["punktzahl"];
			}
			array_multisort($punktzahl, SORT_DESC, $user);
//			$sortierteliste = array();
//			foreach($infos["user"] as $u){
//				$stelle = 0;
//				while($u["punktzahl"] < $sortierteliste[$stelle]["punktzahl"] && $stelle < count($sortierteliste) - 1){
//					$stelle = $stelle + 1;
//				}
//				echo $u["punktzahl"] . " " . var_export($sortierteliste[$stelle], true) . "<br>";
//				array_splice($sortierteliste, $stelle, 0, array($u));
//			}
			echo
			'<h3>';
			echo str_replace(array("_", "iui"), array(" ", "ü"), $infos["quizname"]);
			echo '</h3>
					<table>';
						$platz = 1;
						$platzAnzeigen = true;
						foreach($user as $u){
							echo '<tr>';
							$anzahlgleichepunkte = 2;
							if ($platzAnzeigen == true) {
								if ($u["punktzahl"] === $user[$platz]["punktzahl"]){
									echo '
									<td class="firstcolumn" rowspan=' . $anzahlgleichepunkte . '>';
									$platzAnzeigen = false;
								}
								else {
									echo '<td class="firstcolumn">';
								}
								echo $platz . ". Platz";
								if ($platz == 1){
									echo " &#x1F947;";
								}
								if ($platz == 2){
									echo " &#x1F948;";
								}
								if ($platz == 3){
									echo " &#x1F949;";
								}
								echo '</td>';
								echo '<td>';
								echo $u["name"];
								echo '</td>';
								if ($u["punktzahl"] === $user[$platz]["punktzahl"]){
									echo '<td rowspan=' . $anzahlgleichepunkte . '>';
								}
								else {
									echo '<td>';
								}
								echo $u["punktzahl"] . " Punkte";
								echo '</td>';
							}
							else {
								echo '<td>';
								echo $u["name"];
								echo '</td>';
								$platzAnzeigen = true;
							}							
							echo '</tr>';
							$platz = $platz + 1;
						};
					echo '</table>';
		} else {
			if ($angefragterQuizname == "Advent" && quizvorhanden("Quiz_zum_1._Advent", $myRanking["ranking"])) {
				$infos1 = $myRanking["ranking"][quiznummer("Quiz_zum_1._Advent", $myRanking["ranking"])];
				$infos2 = array();
				$infos3 = array();
				$infos4 = array();
				$user1 = $infos1["user"];
				$user2 = array();
				$user3 = array();
				$user4 = array();
				if (quizvorhanden("Quiz_zum_2._Advent", $myRanking["ranking"])) {
					$infos2 = $myRanking["ranking"][quiznummer("Quiz_zum_2._Advent", $myRanking["ranking"])];
					$user2 = $infos2["user"];
				}
				if (quizvorhanden("Quiz_zum_3._Advent", $myRanking["ranking"])) {
					$infos3 = $myRanking["ranking"][quiznummer("Quiz_zum_3._Advent", $myRanking["ranking"])];
					$user3 = $infos3["user"];
				}
				if (quizvorhanden("Quiz_zum_4._Advent", $myRanking["ranking"])) {
					$infos4 = $myRanking["ranking"][quiznummer("Quiz_zum_4._Advent", $myRanking["ranking"])];
					$user4 = $infos4["user"];
				}
				foreach ($user1 as $key => $row){
					$name[$key] = $row["name"];
					$punktzahl[$key] = $row["punktzahl"];
					foreach ($user2 as $key2 => $row2) {
						if ($row["name"] == $row2["name"]) {
							$punktzahl[$key] = $punktzahl[$key] + $row2["punktzahl"];
						}
					}
					foreach ($user3 as $key3 => $row3) {
						if ($row["name"] == $row3["name"]) {
							$punktzahl[$key] = $punktzahl[$key] + $row3["punktzahl"];
						}
					}
					foreach ($user4 as $key4 => $row4) {
						if ($row["name"] == $row4["name"]) {
							$punktzahl[$key] = $punktzahl[$key] + $row4["punktzahl"];
						}
					}
				}
				array_multisort($punktzahl, SORT_DESC, $name);
				echo
			'<h3>';
			echo "Adventquiz";
			echo '</h3>
					<table>';
						for($i = 0; $i < count($name); $i = $i + 1) {
							echo '<tr>';
							if ($i == 0 || $punktzahl[$i] != $punktzahl[$i - 1]) {
								$anzahlGleichePunkte = 1;
								while($i + $anzahlGleichePunkte < count($punktzahl) && $punktzahl[$i] == $punktzahl[$i + $anzahlGleichePunkte]) {
									$anzahlGleichePunkte = $anzahlGleichePunkte + 1;
								}
								echo '<td class="firstcolumn" rowspan=' . $anzahlGleichePunkte . '>';
								echo ($i + 1) . ". Platz";
								if ($i + 1 == 1){
									 echo " &#x1F947;";
								}
								if ($i + 1 == 2){
									echo " &#x1F948;";
								}
								if ($i + 1 == 3){
									echo " &#x1F949;";
								}
								echo '</td>';
								echo '<td>';
								echo $name[$i];
								echo '</td>';
								echo '<td rowspan=' . $anzahlGleichePunkte . '>';
								echo $punktzahl[$i] . " Punkte";
								echo '</td>';
							} else {
								echo '<td>';
								echo $name[$i];
								echo '</td>';
							}
							echo '</tr>';
						}
					echo '</table>';
			} else {
				echo '<h3>Für dieses Quiz ist noch kein Ranking vorhanden.</h3>';
			}
		}
		// echo var_export($infos["user"][0]["name"], true);
		?>
		</main>
		<footer>
			<p>&copy; 2020 CQuiz</p>
			<p id="kontakt"><a href="kontakt.html" title="Kontakt">Kontakt</a></p>
		</footer>
		<script src="scripts/ranking.js"></script>
	</body>
</html>
