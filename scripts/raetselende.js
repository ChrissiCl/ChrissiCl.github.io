var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');
var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');
var request = new XMLHttpRequest();
var buttonRanking = document.querySelector('#punktebutton');
var script_tag = document.getElementById('script');
var quizNr = script_tag.getAttribute('data-quizname');

window.onload = function() {
	endPunktzahl.textContent = storedPoints + '';
}

// var input = document.querySelector('#punktzahl');
// if (input != null) {
	// input.setAttribute('value', storedPoints);
// }

var input = document.getElementById('name');
input.addEventListener('keyup', function(event) {
  if (event.keyCode === 13) {
	event.preventDefault();
	buttonRanking.click();
  }
});

function leerzeichenersetzen(textMitLeerzeichen) {
	return textMitLeerzeichen.replace(/ /g, '_');
}

function umlauteersetzen(textMitUmlauten) {
	return textMitUmlauten.replace(/[iui]/g, 'ü');
}

buttonRanking.onclick = function() {
	request.open('POST','scripts/datenspeichern.php');
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	request.addEventListener('load', function(event) {
		if (request.status >= 200 && request.status < 300) {
			console.log(request.responseText);
			document.location.href = 'ranking.php?quizname=' + leerzeichenersetzen(umlauteersetzen(quizNr));
		} else {
			console.warn(request.statusText, request.responseText);
		}
	});
	request.send('quizname=' + leerzeichenersetzen(quizNr) + '&name=' + document.getElementById('name').value + '&punktzahl=' + storedPoints);
}

// var quizweiterButton = document.querySelector('.weiterquiz');
// var fileName = location.href.split("/").slice(-1); 

// quizweiterButton.onclick = function() {
	// if (fileName == 'raetselende_quiz2.html') {
	// document.location.href = 'quiz3.html';
	// }
	// if (fileName == 'raetselende_quiz3.html') {
	// document.location.href = 'quiz4.html';
	// }
	// if (fileName == 'raetselende_quiz4.html') {
	// document.location.href = 'quiz5.html';
	// }
	// if (fileName == 'raetselende_quiz5.html') {
	// document.location.href = 'quiz6.html';
	// }
// }

cquizLogo.onclick = function() {
	document.location.href = 'index.html';
}

cquizH1.onclick = function() {
	document.location.href = 'index.html';
}
