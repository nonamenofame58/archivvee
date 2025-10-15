<?php
include "inc/menu.php";
include "inc/functions.php";



if(isset($_POST['submitSearchInUserGames'])){

	echo searchInUserGames($searchUsername = $_POST['username'] ,$keyword = $_POST['searchInUserGames'] );
}


if(isset($_POST['submitRemoveArchive'])){
	$gameId = $_POST['gameId'];
	$username = $_POST['username'];
	$usernameOther = $_POST['usernameOther'];
	
	if(ctrWithId($gameId) == true){
		removeGameArchive($gameID = $gameId, $Username = $username);
	}
	
	listUserGames($usernameOther);
	
}

if(isset($_POST['submitArchiveGame'])){
	$otherUser = $_POST['otherUser'];
	addGameArchive($_POST['gameName'],$isUserPage = 1,$otherUserName = $otherUser);
	
}

if(isset($_POST['usergames'])){
	listUserGames($_POST['usernameOther']);	
}

	

// SAYFAYA GİDER
if(isset($_POST["submitPage"])){
	listUserGames($_POST["submitPage"]);
	}else{
		if(isset($_COOKIE['gamePage'])){
			listUserGames($_COOKIE['gamePage']);
		}else{
			listUserGames(0);
		}
	}


if(isset($_POST['user'])){
	echo "<h3>".$_POST['user']."</h3>";
	
	echo "<table>
	<tr>	
	<td><form action='user.php' method = POST><input type=text name=usernameOther value=".$_POST['user']." hidden><input type=submit name=usergames value='Oyunlar'></form></td>
	<td><form action='user.php' method = POST><input type=submit name=usermovies value='Filmler'></form></td>
	<td><form action='user.php' method = POST><input type=submit name=usermusics value='Müzikler'></form></td>
	</tr>
	</table>";
}






?>