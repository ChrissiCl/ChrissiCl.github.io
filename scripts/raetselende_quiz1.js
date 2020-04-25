var endPunktzahl = document.querySelector('#endpunktzahl');
var storedPoints = sessionStorage.getItem('endpunktzahl');

window.onload = function() {
	endPunktzahl.textContent = 'Quiz abgeschlossen mit ' + storedPoints + ' Punkten';
}

