var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');

window.onload = function() {
	endPunktzahl.textContent = storedPoints + '';
}

var quiz2Button = document.querySelector('#startquiz3');

quiz2Button.onclick = function() {
	document.location.href = 'quiz3.html';
}