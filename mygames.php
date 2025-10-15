<?php
include "inc/menu.php";
include "inc/functions.php";

$username = $_COOKIE['ID_your_site'];



if(isset($_POST['submitRemoveArchive'])){
	$gameId = $_POST['gameId'];
	$username = $_POST['username'];
	$usernameOther = $_POST['usernameOther'];
	$gamePage =  $_POST['gamePage'];
	
	if(ctrWithId($gameId) == true){
		removeGameArchive($gameID = $gameId, $Username = $username);
	}
}

if(isset($_POST['submitArchiveGame'])){
	
	$gamePage =  $_POST['gamePage'];
	addGameArchive($_POST['gameName'],$isUserPage = 0,"");
	
}

if(isset($username)){
	
	$allgames = mysql_query("SELECT * FROM archives WHERE username = '".$username."'");
	$games = mysql_fetch_array($allgames);
	$gamesArray = json_decode($games['Games'],true);
	$arrayCount = 0;
	
	if(count($gamesArray) > 0){
		echo "<table border=0>";
		echo "<th></th><th>Name</th><th>Description</th><th>Release Date</th><th>Developer</th><th>Archivers</th>";
		foreach($gamesArray as $games){	
			$gameName =  $gamesArray[$arrayCount]['Name'];
			$gameId   =  $gamesArray[$arrayCount]['ID'];
			$gameIndex = $gamesArray[$arrayCount]['Index'];
			
			listingGames($games,$otherUser,$listPage,$formPage="mygames.php");
			
			$arrayCount++ ;
		
		}
		echo "</table >";	
	}else{echo "<h3>Buralar Boş !</h3>";}
}


?>