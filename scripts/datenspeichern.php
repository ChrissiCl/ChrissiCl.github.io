<?php

$gesendeteDaten = $_POST;
//$gesendeteDaten = array("quizname" => "Quiz3", "name" => "Chrissi", "punktzahl" => 70);

$jsonDaten = file_get_contents("rankingdaten.json");
$myRanking = json_decode($jsonDaten, True);

$zeile["name"] = $gesendeteDaten["name"];
$zeile["punktzahl"] = intval($gesendeteDaten["punktzahl"]);

function quizvorhanden($name, $liste){
	foreach($liste as $key=>$val){
		if ($name == $val["quizname"]){
			return True;
		}
	}
	return False;
}

function quiznummer($name, $liste){
	$nummer = 0;
	foreach($liste as $key=>$val){
		if ($name == $val["quizname"]){
			return $nummer;
		}
		$nummer = $nummer + 1;
	}
	return False;
}

if (quizvorhanden($gesendeteDaten["quizname"], $myRanking["ranking"])){
	array_push($myRanking["ranking"][quiznummer($gesendeteDaten["quizname"], $myRanking["ranking"])]["user"], $zeile);
}
else{
	$quiz["quizname"] = $gesendeteDaten["quizname"];
	$quiz["user"] = array($zeile);
	array_push($myRanking["ranking"], $quiz);
}

$myJSON = json_encode($myRanking);
file_put_contents("rankingdaten.json", $myJSON);

$responseStatus = '200 OK';
header($_SERVER['SERVER_PROTOCOL'].' '.$responseStatus);
header('Content-type: text/html; charset=utf-8');
echo $myJSON;

?>
