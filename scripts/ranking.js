var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');
var dropdown = document.querySelector('#rankingdropdown');
var optionName = location.href.split('=').slice(-1); 

window.onload = function() {
	for(var i = 0; i < dropdown.options.length; i++ )
	{
		if (dropdown.options[i].value == optionName)
			dropdown.selectedIndex = i;
	}
};

cquizLogo.onclick = function() {
	document.location.href = 'index.shtml';
}

cquizH1.onclick = function() {
	document.location.href = 'index.shtml';
}

function leerzeichenersetzen(textMitLeerzeichen) {
	return textMitLeerzeichen.replace(/ /g, '_');
}

dropdown.onchange = function() {
	var selectedQuiz = dropdown.options[dropdown.selectedIndex].value;
	document.location.href = 'ranking.php?quizname=' + selectedQuiz;
}
