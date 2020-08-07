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
			</optgroup>
			<optgroup label="Themenquiz">
				<option value="Quiz_zum_1._Mai">Quiz zum 1. Mai</option>
				<option value="Themenquiz_Friuiher_und_Heute">Themenquiz Früher und Heute</option>
				<option value="Norwegenquiz_zum_17._Mai">Norwegenquiz zum 17. Mai</option>
				<option value="Quiz_zu_Himmelfahrt">Quiz zu Himmelfahrt</option>
				<option value="Quiz_zu_Pfingsten">Quiz zu Pfingsten</option>
				<option value="Sommerquiz">Sommerquiz</option>
				<option value="Filmquiz">Filmquiz</option>
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
						
						// <tr>
							// <td class="firstcolumn" rowspan="2">1. Platz &#x1F947;</td>
							// <td>';
							// echo $infos["user"][0]["name"];
							// echo '</td>
							// <td rowspan="2">';
							// echo $infos["user"][0]["punktzahl"] . " Punkte";
							// echo'</td>
						// </tr>
						// <tr>
							// <td>';
							// echo $infos["user"][1]["name"];
							// echo '</td>
						// </tr>
						// <tr>
							// <td class="firstcolumn">2. Platz &#x1F948;</td>
							// <td>';
							// echo $infos["user"][2]["name"];
							// echo '</td>
							// <td>';
							// echo $infos["user"][2]["punktzahl"] . " Punkte";
							// echo '</td>
						// </tr>					
						// <tr>
							// <td class="firstcolumn">3. Platz &#x1F949;</td>
							// <td>';
							// echo $infos["user"][3]["name"];
							// echo '</td>
							// <td>';
							// echo $infos["user"][3]["punktzahl"] . " Punkte";
							// echo '</td>
						// </tr>
						// <tr>
							// <td class="firstcolumn">4. Platz</td>
							// <td>';
							// echo $infos["user"][4]["name"];
							// echo '</td>
							// <td>';
							// echo $infos["user"][4]["punktzahl"] . " Punkte";
							// echo '</td>
						// </tr>
						// <tr>
							// <td class="firstcolumn">5. Platz</td>
							// <td>';
							// echo $infos["user"][5]["name"];
							// echo '</td>
							// <td>';
							// echo $infos["user"][5]["punktzahl"] . " Punkte";
							// echo '</td>
						// </tr>
					echo '</table>';
		} else {
			echo '<h3>Für dieses Quiz ist noch kein Ranking vorhanden.</h3>';
		}
		// echo var_export($infos["user"][0]["name"], true);
		?>
		<!-- <section class="tablesection"> -->
			<!-- <section class="table"> -->
			<!-- <h3>Quiz 3</h3> -->
				<!-- <table> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn" rowspan="2">1. Platz &#x1F947;</td> -->
						<!-- <td>Julian</td> -->
						<!-- <td rowspan="2">39 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td>Andrea</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">2. Platz &#x1F948;</td> -->
						<!-- <td>Conny, Fabian</td> -->
						<!-- <td>38 Punkte</td> -->
					<!-- </tr>					 -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">3. Platz &#x1F949;</td> -->
						<!-- <td>Jan</td> -->
						<!-- <td>32 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">4. Platz</td> -->
						<!-- <td>Iris</td> -->
						<!-- <td>30 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">5. Platz</td> -->
						<!-- <td>Cathi</td> -->
						<!-- <td>21 Punkte</td> -->
					<!-- </tr> -->
				<!-- </table> -->
			<!-- </section> -->
			<!-- <section class="table"> -->
			<!-- <h3>Quiz zum 1. Mai</h3>			 -->
				<!-- <table> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">1. Platz &#x1F947;</td> -->
						<!-- <td>Iris, Bernd, Nico</td> -->
						<!-- <td>51 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">2. Platz &#x1F948;</td> -->
						<!-- <td>Conny, Fabian</td> -->
						<!-- <td>44 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">3. Platz &#x1F949;</td> -->
						<!-- <td>Christopher</td> -->
						<!-- <td>39 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn" rowspan="2">4. Platz</td> -->
						<!-- <td>Cathi</td> -->
						<!-- <td rowspan="2">38 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td>Andrea</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">5. Platz</td> -->
						<!-- <td>Jan</td> -->
						<!-- <td>36 Punkte</td> -->
					<!-- </tr> -->
				<!-- </table> -->
			<!-- </section> -->
		<!-- </section> -->
		<!-- <section class="tablesection"> -->
			<!-- <section class="table"> -->
			<!-- <h3>Quiz 4</h3>			 -->
				<!-- <table> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">1. Platz &#x1F947;</td> -->
						<!-- <td>Nico</td> -->
						<!-- <td>47 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">2. Platz &#x1F948;</td> -->
						<!-- <td>Julian</td> -->
						<!-- <td>45 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">3. Platz &#x1F949;</td> -->
						<!-- <td>Iris</td> -->
						<!-- <td>42 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">4. Platz</td> -->
						<!-- <td>Andrea</td> -->
						<!-- <td>39 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">5. Platz</td> -->
						<!-- <td>Conny</td> -->
						<!-- <td>36 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">6. Platz</td> -->
						<!-- <td>Jan</td> -->
						<!-- <td>30 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">7. Platz</td> -->
						<!-- <td>Cathi</td> -->
						<!-- <td>21 Punkte</td> -->
					<!-- </tr> -->
				<!-- </table> -->
			<!-- </section> -->
			<!-- <section class="table"> -->
			<!-- <h3>Quiz 5</h3>			 -->
				<!-- <table> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn" rowspan="2">1. Platz &#x1F947;</td> -->
						<!-- <td>Bernd</td> -->
						<!-- <td rowspan="2">56 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td>Andrea</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">2. Platz &#x1F948;</td> -->
						<!-- <td>Iris</td> -->
						<!-- <td>54 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">3. Platz &#x1F949;</td> -->
						<!-- <td>Nico</td> -->
						<!-- <td>52 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">4. Platz</td> -->
						<!-- <td>Conny</td> -->
						<!-- <td>45 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">5. Platz</td> -->
						<!-- <td>Cathi</td> -->
						<!-- <td>30 Punkte</td> -->
					<!-- </tr> -->
				<!-- </table> -->
			<!-- </section> -->
		<!-- </section> -->
		<!-- <section class="tablesection"> -->
			<!-- <section class="table"> -->
			<!-- <h3>Themenquiz Früher und Heute</h3>			 -->
				<!-- <table> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">1. Platz &#x1F947;</td> -->
						<!-- <td>Iris</td> -->
						<!-- <td>54 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">2. Platz &#x1F948;</td> -->
						<!-- <td>Nico</td> -->
						<!-- <td>53 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">3. Platz &#x1F949;</td> -->
						<!-- <td>Chrissi</td> -->
						<!-- <td>46 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn" rowspan="2">4. Platz</td> -->
						<!-- <td>Conny</td> -->
						<!-- <td rowspan="2">36 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td>Andrea</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">5. Platz</td> -->
						<!-- <td>Jan</td> -->
						<!-- <td>34 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">6. Platz</td> -->
						<!-- <td>Cathi</td> -->
						<!-- <td>33 Punkte</td> -->
					<!-- </tr> -->
				<!-- </table> -->
			<!-- </section> -->
			<!-- <section class="table"> -->
				<!-- <h3>Norwegenquiz zum 17. Mai</h3>			 -->
				<!-- <table> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">1. Platz &#x1F947;</td> -->
						<!-- <td>Andrea</td> -->
						<!-- <td>56 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">2. Platz &#x1F948;</td> -->
						<!-- <td>Iris, Bernd, Nico</td> -->
						<!-- <td>44 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">3. Platz &#x1F949;</td> -->
						<!-- <td>Cathi</td> -->
						<!-- <td>38 Punkte</td> -->
					<!-- </tr> -->
					<!-- <!-- <tr> --> 
						<!-- <!-- <td class="firstcolumn">4. Platz</td> --> 
						<!-- <!-- <td>Jan</td> -->
						<!-- <!-- <td>30 Punkte</td> --> 
					<!-- <!-- </tr> --> 
					<!-- <!-- <tr> --> 
						<!-- <!-- <td class="firstcolumn">5. Platz</td> -->
						<!-- <!-- <td>Cathi</td> -->
						<!-- <!-- <td>21 Punkte</td> --> 
					<!-- <!-- </tr> --> 
				<!-- </table> -->
			<!-- </section> -->
		<!-- </section> -->
		<!-- <section class="tablesection"> -->
			<!-- <section class="table"> -->
			<!-- <h3>Quiz zu Himmelfahrt</h3>			 -->
				<!-- <table> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">1. Platz &#x1F947;</td> -->
						<!-- <td>Jan</td> -->
						<!-- <td>54 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">2. Platz &#x1F948;</td> -->
						<!-- <td>Andrea</td> -->
						<!-- <td>46 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">3. Platz &#x1F949;</td> -->
						<!-- <td>Bernd</td> -->
						<!-- <td>39 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">4. Platz</td> -->
						<!-- <td>Nico</td> -->
						<!-- <td>37 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">5. Platz</td> -->
						<!-- <td>Cathi</td> -->
						<!-- <td>36 Punkte</td> -->
					<!-- </tr> -->
					<!-- <tr> -->
						<!-- <td class="firstcolumn">6. Platz</td> -->
						<!-- <td>Iris</td> -->
						<!-- <td>32 Punkte</td> -->
					<!-- </tr> -->
					<!-- <!-- <tr> --> 
						<!-- <!-- <td class="firstcolumn">6. Platz</td> --> 
						<!-- <!-- <td>Cathi</td> --> 
						<!-- <!-- <td>33 Punkte</td> --> 
					<!-- <!-- </tr> --> 
				<!-- </table> -->
			<!-- </section> -->
			<!-- <section class="table"> -->
				<!-- <!-- <h3>Norwegenquiz zum 17. Mai</h3>			 --> 
				<!-- <!-- <table> --> 
					<!-- <!-- <tr> --> 
						<!-- <!-- <td class="firstcolumn">1. Platz &#x1F947;</td> --> 
						<!-- <!-- <td>Andrea</td> --> 
						<!-- <!-- <td>56 Punkte</td> --> 
					<!-- <!-- </tr> --> 
					<!-- <!-- <tr> -->
						<!-- <!-- <td class="firstcolumn">2. Platz &#x1F948;</td> --> 
						<!-- <!-- <td>Iris, Bernd, Nico</td> --> 
						<!-- <!-- <td>44 Punkte</td> --> 
					<!-- <!-- </tr> --> 
					<!-- <!-- <tr> --> 
						<!-- <!-- <td class="firstcolumn">3. Platz &#x1F949;</td> --> 
						<!-- <!-- <td>Cathi</td> --> 
						<!-- <!-- <td>38 Punkte</td> --> 
					<!-- <!-- </tr> --> 
					<!-- <!-- <tr> --> 
						<!-- <!-- <td class="firstcolumn">4. Platz</td> -->
						<!-- <!-- <td>Jan</td> -->
						<!-- <!-- <td>30 Punkte</td> --> 
					<!-- <!-- </tr> --> 
					<!-- <!-- <tr> --> 
						<!-- <!-- <td class="firstcolumn">5. Platz</td> --> 
						<!-- <!-- <td>Cathi</td> --> 
						<!-- <!-- <td>21 Punkte</td> --> 
					<!-- <!-- </tr> --> 
				<!-- <!-- </table> -->
			<!-- </section> -->
		<!-- </section> -->
		</main>
		<footer>
			<p>&copy; 2020 CQuiz</p>
			<p id="kontakt"><a href="kontakt.html" title="Kontakt">Kontakt</a></p>
		</footer>
		<script src="scripts/ranking.js"></script>
	</body>
</html>
