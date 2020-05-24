var request = new XMLHttpRequest();
var buttonEins = document.querySelector('button');

buttonEins.onclick = function() {
	request.open('GET','http://192.168.0.234/phpTest/test.php');
	request.setRequestHeader('X-Test','test1');
	request.setRequestHeader('X-Test','test2');
	request.addEventListener('load', function(event) {
	if (request.status >= 200 && request.status < 300) {
		console.log(request.responseText);
	} else {
		console.warn(request.statusText, request.responseText);
	}
	});
	request.send();
}