var cquizLogo = document.querySelector('#logo');
var cquizH1 = document.querySelector('h1');
var selectMenu = document.querySelector('select')
var request = new XMLHttpRequest();

selectMenu.onchange = function() {
	request.open('GET','scripts/datensenden.php');
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	request.addEventListener('load', function(event) {
		if (request.status >= 200 && request.status < 300) {
			console.log(request.responseText);
		} else {
			console.warn(request.statusText, request.responseText);
		}
	});
	request.send('quizname=' + selectMenu.value);
}

cquizLogo.onclick = function() {
	document.location.href = 'index.html';
}

cquizH1.onclick = function() {
	document.location.href = 'index.html';
}

