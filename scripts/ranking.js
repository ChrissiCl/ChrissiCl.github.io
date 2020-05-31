var request = new XMLHttpRequest();
var buttonRanking = document.querySelector('#punktebutton');
var input = document.querySelector('#punktzahl');
var quizNummer = document.querySelector('#quiznummer');

input.setAttribute('value', 45);
quiznummer.setAttribute('value', 'Quiz 5')


buttonRanking.onclick = function() {
	request.open('POST','test.php');
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
