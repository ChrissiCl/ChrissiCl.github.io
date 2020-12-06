var quiz1Button = document.querySelector('#startquiz1');
var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');
var loesungsButton = document.querySelector('#loesungzeigen');
var now = new Date().getTime();
var kerze1 = document.getElementById('Kerze_1')
var kerze2 = document.getElementById('Kerze_2')
var kerze3 = document.getElementById('Kerze_3')
var kerze4 = document.getElementById('Kerze_4')

window.onload = function() {
	// if (now >= 1605975437000) {
		// kerze1.src = 'images/Kerze_mit_Flamme.png';
		// kerze1.alt = 'Kerze mit Flamme';
	// }
	if (now >= 1606608060000) {
		kerze1.src = 'images/Kerze_mit_Flamme.png';
	}
	if (now >= 1607212860000) {
		kerze2.src = 'images/Kerze_mit_Flamme.png';
	}
	if (now >= 1607817660000) {
		kerze3.src = 'images/Kerze_mit_Flamme.png';
	}
	if (now >= 1608422460000) {
		kerze4.src = 'images/Kerze_mit_Flamme.png';
	}
}

kerze1.onclick = function() {
	// if (now >= 1605975197000) {
		// document.location.href = 'quiz_ersteradvent.shtml';
	// }
	if (now >= 1606608060000) {
		document.location.href = 'quiz_ersteradvent.shtml';
	}
}

kerze2.onclick = function() {
	if (now >= 1606608060000) {
		document.location.href = 'quiz_zweiteradvent.shtml';
	}
}

// kerze3.onclick = function() {
	// if (now >= 1606608060000) {
		// document.location.href = 'index.shtml';
	// }
// }

// kerze4.onclick = function() {
	// if (now >= 1606608060000) {
		// document.location.href = 'index.shtml';
	// }
// }

quiz1Button.onclick = function() {
	document.location.href = 'quiz1.shtml';
}

cquizLogo.onclick = function() {
	document.location.href = 'index.shtml';
}

cquizH1.onclick = function() {
	document.location.href = 'index.shtml';
}

loesungsButton.onclick = function() {
	document.getElementById('loesungmonat').style.visibility = 'visible';
}



