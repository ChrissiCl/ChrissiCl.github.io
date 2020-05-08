var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');
var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');

window.onload = function() {
	endPunktzahl.textContent = storedPoints + '';
}

var input = document.querySelector('#punktzahl');
if (input != null) {
	input.setAttribute('value', storedPoints);
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
