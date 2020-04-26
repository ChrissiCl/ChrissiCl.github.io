var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');

window.onload = function() {
	endPunktzahl.textContent = storedPoints + '';
}

var quiz2Button = document.querySelector('#startquiz2');

quiz2Button.onclick = function() {
	document.location.href = 'quiz2.html';
}