var quiz1Button = document.querySelector('#startquiz1');
var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');
var loesungsButton = document.querySelector('#loesungzeigen');

quiz1Button.onclick = function() {
	document.location.href = 'quiz1.html';
}

cquizLogo.onclick = function() {
	document.location.href = 'index.html';
}

cquizH1.onclick = function() {
	document.location.href = 'index.html';
}

loesungsButton.onclick = function() {
	document.getElementById('loesungmonat').style.visibility = 'visible';
}