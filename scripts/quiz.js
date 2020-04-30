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
var vorschlagButton = document.querySelector('#vorschlagbutton')
var weiterButton = document.querySelector('#weiter')
var hinweis = 0
var min = 0;
var max = 6;
var hinweisZahl;
var gezeigteHinweise = [];
var raetselNummer = 0
var punktZahl = document.querySelector('#punktzahl');
var gesamtPunktzahl = 0
var paragraphGesamtpunktzahl = document.querySelector('#gesamtpunktzahl')
var leeresElement = document.getElementById('keinhinweis').textContent;
var script_tag = document.getElementById('script')
var quizNr = script_tag.getAttribute('data-quiznummer')

function emptyfield() {
	document.getElementById('solution').value='';
}

function neuesRaetsel() {
	raetselname.textContent = meineDaten.quize[quizNr - 1].raetsel[raetselNummer].raetselname;
	kategorie.textContent = 'Kategorie: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].kategorie;
	hinweis = 0;
	gezeigteHinweise = [];
	emptyfield();
	hinweisZahl  = Math.floor(Math.random() * (max - min + 1)) + min;
	hinweis1.textContent = '1. Hinweis: ' + meineDaten.quize[quizNr - 1].raetsel[raetselNummer].hinweise[hinweisZahl];
	gezeigteHinweise.push(hinweisZahl);
	weiterButton.style.visibility = 'hidden';
	document.getElementById('subsection2').style.visibility = 'hidden';
	vorschlagButton.style.backgroundColor = '#203864';
	vorschlagButton.disabled = false;
	punktZahl.textContent = 'Punktzahl für dieses Rätsel: 0';
	hinweis2.textContent = '2. Hinweis: ';
	hinweis3.textContent = '3. Hinweis: ';				
	hinweis4.textContent = '4. Hinweis: ';				
	hinweis5.textContent = '5. Hinweis: ';	
	hinweis6.textContent = '6. Hinweis: ';				
	hinweis7.textContent = '7. Hinweis: ';
	document.getElementById('keinhinweis').textContent = leeresElement;
	if (raetselNummer == 9){
		weiterButton.textContent='Weiter zum Ende';
	}
}

window.onload = function() {
	neuesRaetsel();
}

function hinweisHinzufuegen() {
	if (gezeigteHinweise.length == 7){
		document.getElementById('keinhinweis').textContent = 'Keine neuen Hinweise 🤔';
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

hinweisButton.onclick = function() {
	hinweisHinzufuegen();
}

vorschlagButton.onclick = function() {
	if (meineDaten.quize[quizNr - 1].raetsel[raetselNummer].loesung.indexOf(document.getElementById('solution').value) == -1) {
		if (gezeigteHinweise.length == 7) {
			vorschlagButton.style.backgroundColor = 'gray';
			vorschlagButton.disabled = true;
		}
		if (gezeigteHinweise.length != 7) {
			hinweisHinzufuegen();
		}
		else {
			document.getElementById('subsection2').style.visibility = 'visible';
			document.getElementById('loesungswort').textContent = meineDaten.quize[quizNr - 1].raetsel[raetselNummer].loesung[0];
		}
		document.getElementById('solution').style.backgroundColor = '#DA371C';
		setTimeout(weißMachen, 1000);
	}
	else {
		document.getElementById('solution').style.backgroundColor = '#85CA3A';
		setTimeout(weißMachen, 1000);
		vorschlagButton.style.backgroundColor = 'gray';
		vorschlagButton.disabled = true;
		document.getElementById('subsection2').style.visibility = 'visible';
		document.getElementById('loesungswort').textContent = meineDaten.quize[quizNr - 1].raetsel[raetselNummer].loesung[0];
		weiterButton.style.visibility='visible';
		punktZahl.textContent = 'Punktzahl für dieses Rätsel: ' + (8 - gezeigteHinweise.length).toString();
		gesamtPunktzahl = gesamtPunktzahl + 8 - gezeigteHinweise.length;
		paragraphGesamtpunktzahl.textContent = 'Gesamtpunktzahl: ' + gesamtPunktzahl
		while(gezeigteHinweise.length != 7){
			hinweisHinzufuegen();
		}
	}
	return false
}

weiterButton.onclick = function() {	
	if (raetselNummer != 9) {
		raetselNummer = raetselNummer + 1;
		neuesRaetsel();
	}
	else {
		sessionStorage.setItem('endpunktzahl', gesamtPunktzahl);
		document.location.href = meineDaten.quize[quizNr - 1].abschlussseite;
	}
}

cquizLogo.onclick = function() {
	document.location.href = 'index.html';
}

cquizH1.onclick = function() {
	document.location.href = 'index.html';
}
	
	
	