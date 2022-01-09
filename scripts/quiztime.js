var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');
var raetselname = document.querySelector('#raetselname');
var kategorie = document.querySelector('#kategorie');
var hinweis1 = document.querySelector('#hinweis1');
var hinweis2 = document.querySelector('#hinweis2');
var hinweis3 = document.querySelector('#hinweis3');
var hinweis4 = document.querySelector('#hinweis4');
var hinweis5 = document.querySelector('#hinweis5');
var hinweis6 = document.querySelector('#hinweis6');
var hinweis7 = document.querySelector('#hinweis7');
var hinweisButton = document.querySelector('#hinweisbutton');
var vorschlagButton = document.querySelector('#vorschlagbutton');
var weiterButton = document.querySelector('#weiter');
var hinweis = 0;
var min = 0;
var max = 6;
var hinweisZahl;
var gezeigteHinweise = [];
var raetselNummer = 0;
var punktZahl = document.querySelector('#punktzahl');
var gesamtPunktzahl = 0;
var paragraphGesamtpunktzahl = document.querySelector('#gesamtpunktzahl');
var leeresElement = document.getElementById('schnellsein').textContent;
var script_tag = document.getElementById('script');
var quizNr = script_tag.getAttribute('data-quiznummer');
var falscheTipps = [];
var raetselAnzahl = meineDaten.quize[quizNr - 1].raetsel.length;
var timerButton = document.querySelector('#starttimer');
var time = 210;
var timeText = document.querySelector('#timer');
var runCountdown;

function emptyfield() {
	document.getElementById('solution').value='';
}

window.onload = function() {
	document.getElementById('subsection4').style.visibility = 'hidden';
	vorschlagButton.setAttribute('class', 'disabled');
	weiterButton.style.visibility = 'hidden';
}

function neuesRaetsel() {
	// window.scrollTo(0, 0);
	kategorie.textContent = 'Kategorie: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].kategorie;
	hinweis = 0;
	gezeigteHinweise = [];
	falscheTipps = [];
	time = 210;
	while (document.getElementById('listefalschetipps').firstChild) {
		document.getElementById('listefalschetipps').removeChild(document.getElementById('listefalschetipps').firstChild);
	}
	hinweisZahl  = Math.floor(Math.random() * (max - min + 1)) + min;
	hinweis1.textContent = '1. Hinweis: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].hinweise[hinweisZahl];
	gezeigteHinweise.push(hinweisZahl);
	vorschlagButton.setAttribute('class', 'enabled');
	vorschlagButton.disabled = false;
	timerButton.setAttribute('class', 'enabled');
	timerButton.disabled = false;
	if (raetselNummer == raetselAnzahl - 1){
		weiterButton.textContent='Weiter zum Ende';
	}
}

timerButton.onclick = function() {
	neuesRaetsel();
	runCountdown = setInterval(countDown, 1000);	
}

function countDown() {
	time = time - 1;
	if (time <= 0) {
		clearInterval(runCountdown);
	}
	if (time % 30 == 0){
		hinweisHinzufuegen();
	}
	if (time <= 30){
		document.getElementById('schnellsein').textContent = 'Jetzt aber schnell 😉';
	}
	var minutes = Math.floor(time / 60);
	var seconds = time % 60;
	if (minutes < 10){
		minutes = '0' + minutes;
	}
	if (seconds < 10){
		seconds = '0' + seconds;
	}
	timeText.textContent = minutes + ':' + seconds;
}

function hinweisHinzufuegen() {
	if (gezeigteHinweise.length == 7){
	// 	document.getElementById('keinhinweis').textContent = 'Jetzt aber schnell';
		return;
	}
	if (gezeigteHinweise.length == 6) {
		weiterButton.style.visibility='visible';
	}
	hinweisZahl  = Math.floor(Math.random() * (max - min + 1)) + min;
	while(gezeigteHinweise.indexOf(hinweisZahl) != -1){
		hinweisZahl  = Math.floor(Math.random() * (max - min + 1)) + min;
	}
	if (hinweis == 0) {
		hinweis2.textContent = '2. Hinweis: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].hinweise[hinweisZahl];
	}
	else if (hinweis == 1) {
		hinweis3.textContent = '3. Hinweis: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].hinweise[hinweisZahl];
	}
	else if (hinweis == 2) {
		hinweis4.textContent = '4. Hinweis: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].hinweise[hinweisZahl];
	}
	else if (hinweis == 3) {
		hinweis5.textContent = '5. Hinweis: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].hinweise[hinweisZahl];
	}
	else if (hinweis == 4) {
		hinweis6.textContent = '6. Hinweis: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].hinweise[hinweisZahl];
	}
	else if (hinweis == 5) {
		hinweis7.textContent = '7. Hinweis: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].hinweise[hinweisZahl];
	}
	gezeigteHinweise.push(hinweisZahl);
	hinweis ++;
}	

function weißMachen() {
	document.getElementById('solution').style.backgroundColor = 'white'
}

// hinweisButton.onclick = function() {
// 	hinweisHinzufuegen();
// }

vorschlagButton.onclick = function() {
	var loesungsWort = document.getElementById('solution').value.trim()
	if (meineDaten.quize[quizNr - 1].raetsel[raetselNummer].loesung.indexOf(loesungsWort) == -1) {
		var li = document.createElement('li');
		li.appendChild(document.createTextNode(loesungsWort));
		document.getElementById('listefalschetipps').appendChild(li);
		document.getElementById('falschetipps').style.visibility = 'visible';
		if (time <= 0) {
			document.getElementById('subsection4').style.visibility = 'visible';
			document.getElementById('loesungswort').textContent = meineDaten.quize[quizNr - 1].raetsel[raetselNummer].loesung[0];
			vorschlagButton.setAttribute('class', 'disabled');
			vorschlagButton.disabled = true;
			timerButton.setAttribute('class', 'disabled');
			vorschlagButton.disabled = true;
		}
		document.getElementById('solution').style.backgroundColor = '#DA371C';
		setTimeout(weißMachen, 1000);
		setTimeout(emptyfield, 1000);
	}
	else {
		document.getElementById('solution').style.backgroundColor = '#85CA3A';
		setTimeout(weißMachen, 1000);
		vorschlagButton.setAttribute('class', 'disabled');		
		vorschlagButton.disabled = true;
		timerButton.setAttribute('class', 'disabled');
		timerButton.disabled = true;
		document.getElementById('subsection4').style.visibility = 'visible';
		document.getElementById('loesungswort').textContent = meineDaten.quize[quizNr - 1].raetsel[raetselNummer].loesung[0];
		weiterButton.style.visibility='visible';
		clearInterval(runCountdown);
		punktZahl.textContent = 'Punktzahl für dieses Rätsel: ' + time;
		gesamtPunktzahl = gesamtPunktzahl + time;
		paragraphGesamtpunktzahl.textContent = 'Gesamtpunktzahl: ' + gesamtPunktzahl;
		while(gezeigteHinweise.length != 7){
			hinweisHinzufuegen();
		}
	}
	return false
}

weiterButton.onclick = function() {	
	if (raetselNummer != raetselAnzahl - 1) {
		raetselNummer = raetselNummer + 1;
		raetselname.textContent = meineDaten.quize[quizNr - 1].raetsel[raetselNummer].raetselname;
		// neuesRaetsel();
		document.getElementById('falschetipps').style.visibility = 'hidden';
		emptyfield();
		punktZahl.textContent = 'Punktzahl für dieses Rätsel: 0';
		weiterButton.style.visibility = 'hidden';
		document.getElementById('subsection4').style.visibility = 'hidden';
		hinweis1.textContent = '1. Hinweis: ';
		hinweis2.textContent = '2. Hinweis: ';
		hinweis3.textContent = '3. Hinweis: ';				
		hinweis4.textContent = '4. Hinweis: ';				
		hinweis5.textContent = '5. Hinweis: ';	
		hinweis6.textContent = '6. Hinweis: ';				
		hinweis7.textContent = '7. Hinweis: ';
		document.getElementById('schnellsein').textContent = leeresElement;
		kategorie.textContent = 'Kategorie: ?';
		timeText.textContent = '03:30';
	}
	else {
		sessionStorage.setItem('endpunktzahl', gesamtPunktzahl);
		document.location.href = meineDaten.quize[quizNr - 1].abschlussseite;
	}
}

cquizLogo.onclick = function() {
	document.location.href = 'index.shtml';
}

cquizH1.onclick = function() {
	document.location.href = 'index.shtml';
}
	
	
	