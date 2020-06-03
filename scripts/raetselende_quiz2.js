var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');
var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');
var request = new XMLHttpRequest();
var buttonRanking = document.querySelector('#punktebutton');
var quizNummer = document.querySelector('#quiznummer'); //Kann man diese, die nächste Zeile und Zeile 19 irgendwie zusammenfassen?
var quizNr = script_tag.getAttribute('data-quiznummer');

window.onload = function() {
	endPunktzahl.textContent = storedPoints + '';
}

var input = document.querySelector('#punktzahl');
if (input != null) {
	input.setAttribute('value', storedPoints);
}

quiznummer.setAttribute('value', 'Quiz' + quizNr);

buttonRanking.onclick = function() {
	request.open('POST','datenspeichern.php');
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	request.addEventListener('load', function(event) {
		if (request.status >= 200 && request.status < 300) {
			console.log(request.responseText);
		} else {
			console.warn(request.statusText, request.responseText);
		}
	});
	request.send('quizname=' + document.getElementById('quiznummer').value + '&name=' + document.getElementById('name').value + '&punktzahl=' + document.getElementById('punktzahl').value);
}

var quizweiterButton = document.querySelector('.weiterquiz');
var fileName = location.href.split("/").slice(-1); 

quizweiterButton.onclick = function() {
	if (fileName == 'raetselende_quiz2.html') {
	document.location.href = 'quiz3.html';
	}
	if (fileName == 'raetselende_quiz3.html') {
	document.location.href = 'quiz4.html';
	}
	if (fileName == 'raetselende_quiz4.html') {
	document.location.href = 'quiz5.html';
	}
	if (fileName == 'raetselende_quiz5.html') {
	document.location.href = 'quiz6.html';
	}
}

cquizLogo.onclick = function() {
	document.location.href = 'index.html';
}

cquizH1.onclick = function() {
	document.location.href = 'index.html';
}
