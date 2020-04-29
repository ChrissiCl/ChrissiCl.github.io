var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');
var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');

window.onload = function() {
	endPunktzahl.textContent = storedPoints + '';
}

var quiz2Button = document.querySelector('#startquiz3');

quiz2Button.onclick = function() {
	document.location.href = 'quiz3.html';
}

cquizLogo.onclick = function() {
	document.location.href = 'index.html';
}

cquizH1.onclick = function() {
	document.location.href = 'index.html';
}

var input = document.querySelector('#punktzahl');
input.setAttribute('value', storedPoints);
