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
	<body>
		<header>
			<h1>CQuiz</h1>
			<img src="images/cquiz_logo.png" alt="Fragezeichen-Logo" id="logo">
			<input type="checkbox" id="responsive-nav">
			<label for="responsive-nav" class="responsive-nav-label"><span>&#9776;</span></label>
			<nav>
				<ul>
					<li><a href="index.html">Start</a></li>
					<li class="dropdown"><a href="#">Standardquiz</a>
						<ul class="dropdownlist">				
							<li><a href="quiz1.html">Quiz 1</a></li>
							<li><a href="quiz2.html">Quiz 2</a></li>
							<li><a href="quiz3.html">Quiz 3</a></li>
							<li><a href="quiz4.html">Quiz 4</a></li>
							<li><a href="quiz5.html">Quiz 5</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#">Themenquiz</a>
						<ul class="dropdownlist">				
							<li><a href="maiquiz.html">Quiz zum 1. Mai</a></li>
							<li><a href="quiz_frueherundheute.html">Früher und Heute</a></li>
							<li><a href="quiz_norge.html">17. Mai</a></li>
							<li><a href="quiz_himmelfahrt.html">Himmelfahrt</a></li>
							<li><a href="quiz_pfingsten.html">Pfingsten</a></li>
						</ul>
					</li>
					<li><span>Ranking</span></li>
					<li><a href="kontakt.html">Kontakt</a></li>
				</ul>
			</nav>
		</header>
		<main class="rankingmain">
		<h2 class="h2ranking"><span>Ranking &#x1F3C6;</span></h2>
		<label for="rankingdropdown">Wähle ein Quiz aus, für das du das Ranking sehen möchtest:</label><br>
		<select id="rankingdropdown">
			<optgroup label="Standardquiz">
				<option value="Quiz+3">Quiz 3</option>
				<option value="Quiz+4">Quiz 4</option>
				<option value="Quiz+5">Quiz 5</option>
			</optgroup>
			<optgroup label="Themenquiz">
				<option value="Quiz+zum+1.+Mai">Quiz zum 1. Mai</option>
				<option value="Themenquiz+Frueher+und+Heute">Themenquiz Früher und Heute</option>
				<option value="Norwegenquiz+zum+17.+Mai">Norwegenquiz zum 17. Mai</option>
				<option value="Norwegenquiz+zu+Himmelfahrt">Norwegenquiz zu Himmelfahrt</option>
				<option value="Norwegenquiz+zu+Pfingsten">Norwegenquiz zu Pfingsten</option>
			</optgroup>
		</select>
		<?php
		$jsonDaten = file_get_contents("rankingdaten.json");
		$myRanking = json_decode($jsonDaten, True);
		$angefragterQuizname = $_GET['quizname'];
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
		$infos = $myRanking["ranking"][quiznummer($angefragterQuizname, $myRanking["ranking"])];
		echo var_export($infos, true);
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