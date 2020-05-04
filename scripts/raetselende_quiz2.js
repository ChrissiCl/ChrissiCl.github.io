var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');
var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');

window.onload = function() {
	endPunktzahl.textContent = storedPoints + '';
}

var input = document.querySelector('#punktzahl');
input.setAttribute('value', storedPoints);

var quiz3Button = document.querySelector('#startquiz3');

quiz3Button.onclick = function() {
	document.location.href = 'quiz3.html';
}

var quiz4Button = document.querySelector('#startquiz4');

quiz4Button.onclick = function() {
	document.location.href = 'quiz4.html';
}

var quiz5Button = document.querySelector('#startquiz5');

quiz5Button.onclick = function() {
	document.location.href = 'quiz5.html';
}

cquizLogo.onclick = function() {
	document.location.href = 'index.html';
}

cquizH1.onclick = function() {
	document.location.href = 'index.html';
}


