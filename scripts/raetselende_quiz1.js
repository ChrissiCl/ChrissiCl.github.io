var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');
var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');

window.onload = function() {
	endPunktzahl.textContent = storedPoints + '';
}

var quiz2Button = document.querySelector('#startquiz2');

quiz2Button.onclick = function() {
	document.location.href = 'quiz2.shtml';
}

cquizLogo.onclick = function() {
	document.location.href = 'index.shtml';
}

cquizH1.onclick = function() {
	document.location.href = 'index.shtml';
}