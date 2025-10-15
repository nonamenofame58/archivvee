<?php
mysql_connect("localhost", "root", "password","archivve") or die(mysql_error());
mysql_select_db("archivve") or die(mysql_error()); 

$gamePage = NULL; // GEÇERLİ OYUN SAYFASI EĞER LOGİNSE 

// setcookie('gamePage', $_POST["submitPage"] ,time() + (3600*30),"/");	

function ctr($gameCtrlName){
	$username = $_COOKIE['ID_your_site'];	
	$gameSearch = mysql_query("SELECT * FROM archives WHERE username = '".$username."'");
	$gamesSearch = mysql_fetch_array($gameSearch);
	$gamesSearchArray = json_decode($gamesSearch['Games'],true);
	$searchArray = 0;
	$hidden = false;
	$gamesSearchArrayCount = count($gamesSearchArray);
	for ($x = 0; $x <= $gamesSearchArrayCount; $x++) {
	if ($gameCtrlName == $gamesSearchArray[$x]["Name"]){$hidden = true;}}
	return $hidden;}
	
function ctrWithId($gameCtrlId){
	$username = $_COOKIE['ID_your_site'];	
	$gameSearch = mysql_query("SELECT * FROM archives WHERE username = '".$username."'");
	$gamesSearch = mysql_fetch_array($gameSearch);
	$gamesSearchArray = json_decode($gamesSearch['Games'],true);
	$searchArray = 0;
	$hidden = false;
	$gamesSearchArrayCount = count($gamesSearchArray);
	for ($x = 0; $x <= $gamesSearchArrayCount; $x++) {
	if ($gameCtrlId == $gamesSearchArray[$x]["ID"]){$hidden = true;}}
	return $hidden;}
	
	
	


function listingGames($games,$otherUser,$listPage,$formPage){
	
	
	
	if (isset($_COOKIE["ID_your_site"])){
		$username = $_COOKIE["ID_your_site"];
	}else{
		$username = "NULL";
	}
	$page = $listPage;
	$gameNameReal = mysql_real_escape_string($games['Name']);
	$getArchivedUsers = mysql_query("SELECT archivedUsers FROM games WHERE Name = '".$gameNameReal."'") or die(mysql_error());
	$archivedUsers = mysql_fetch_row($getArchivedUsers)[0];
	
	if  (ctr($games["Name"]) == 1){
		echo "
		<tr>
		<td><img style=width:64px;height:64px; src ='./webicons/gameicons/gameicon.jpg' ></td>
		<td><a href='gamepage.php?name=".htmlentities($games['Name'],ENT_QUOTES,"UTF-8")."'>".$games['Name']."</a></td>
		<td>".$games['Description']."</td>
		<td>".$games['releaseDate']."</td>
		<td>".$games['developer']."</td>
		<td><img src ='./webicons/Edit/Layers.svg' >".$archivedUsers."</td>
		<td colspan = 2 >
		<form action ='".$formPage."' method=POST>
		<input name='gameName' value='".htmlentities($games['Name'],ENT_QUOTES,"UTF-8")."' hidden>
		<input name='gameId' type='text' hidden value=".$games['ID'].">
		<input name ='username' type=text value='".$username."' hidden>
		<input name='gamePage' type='text' hidden value=".$page.">
		<input name='usernameOther' type=text value='".$otherUser."' hidden>
		<input type='submit' name='submitRemoveArchive' value='Çıkart'>
		</form>
		</td>
		</tr>	
		";	
	}
	else{
		echo "
		<tr>
		<td><img style=width:64px;height:64px; src ='./webicons/gameicons/gameicon.jpg' ></td>
		<td><a href='gamepage.php?name=".htmlentities($games['Name'],ENT_QUOTES,"UTF-8")."'>".$games['Name']."</a></td>
		
		<td>".$games['Description']."</td>
				<td>".$games['releaseDate']."</td>
		<td>".$games['developer']."</td>
		<td><img src ='./webicons/Edit/Layers.svg' >".$archivedUsers."</td>
		<td>
		<form action ='".$formPage."' method=POST >
		<input name='gameName' value='".htmlentities($games['Name'],ENT_QUOTES,"UTF-8")."' hidden >
		<input name='gameId' type='text' hidden value=".$games['ID'].">
		<input name='otherUser' type='text'  value=".$otherUser." hidden>
		<input name='gamePage' type='text' hidden value=".$page.">
		<input type='submit' name=submitArchiveGame value='Ekle'>
		</td>
		</form>
		</tr>";
	}

}


	
	


function searchInUserGames($searchUsername,$keyword){
	$username = $searchUsername;
	$search = mysql_query("SELECT Games FROM archives WHERE Username = '".$username."';");
	$searchArray = mysql_fetch_array($search);
	$searchArrayDecode = json_decode($searchArray[0],true);
	$arrayCound = 0;
	echo "<table border='0'>";
	echo "<th></th><th>Name</th><th>Description</th><th>Release Date</th><th>Developer</th><th>Archivers</th>";
	foreach($searchArrayDecode as $games){
		$keywords = $keyword;
		$searching = stripos($games['Name'],$keywords);
		stripos($games['Name'],$keywords);	
		
		if($searching !== false){
			
			$gameNameReal = mysql_real_escape_string($games['Name']);
			$getArchivedUsers = mysql_query("SELECT archivedUsers FROM games WHERE Name = '".$gameNameReal."'") or die(mysql_error());
			$archivedUsers = mysql_fetch_row($getArchivedUsers)[0];
			
		listingGames($games = $games,$otherUser = $username,$listPage = $page,$formPage = "user.php");
			
		}else {
			
		}
		
		$arrayCount++;
		
	}
	echo "</table>";
}


function searchInGames($gameName){
	$start = 0;
	$end = 3;
	$Limit = 3;
	if ($page == 0){
		
	}else{
		$Limit = $Limit * $page;
		$start = $start + $Limit;
		$end = $end + $limit;
	}
	$username = $_COOKIE['ID_your_site'];

	echo "<table border='0'>";
	echo "<th></th><th>Name</th><th>Description</th><th>Release Date</th><th>Developer</th><th>Archivers</th>";
	
	$search = mysql_query("SELECT * FROM games");
	while($games = mysql_fetch_array($search)){
	$keywords = $gameName;
	$searching = stripos($games['Name'],$keywords);
	
	if($searching !== false){
				
			$gameNameReal = mysql_real_escape_string($games['Name']);
			$getArchivedUsers = mysql_query("SELECT archivedUsers FROM games WHERE Name = '".$gameNameReal."'") or die(mysql_error());
			$archivedUsers = mysql_fetch_row($getArchivedUsers)[0];
			
		listingGames($games = $games,$otherUser = "Null",$listPage = $page,$formPage = "oyun.php");
			
		}else {
			
		}
		
		$arrayCount++;
		
	}
	echo "</table>";
}



function searchUser($username){
	$getAllUsers = mysql_query("SELECT username FROM users");
	echo "<table><th>Username</th>";
	while($user = mysql_fetch_array($getAllUsers,MYSQL_NUM)){
		$username = $username;
		$src = stripos($user[0],$username);	
		if($src !== false){
			echo "
			<tr>
			<td>
			<form method='POST' action='user.php' style ='margin:0px;' >
			<input type='text' name='' hidden>
			<input type='submit' name='user' value='".$user[0]."'>
			</form>
			</td>
			</tr>
			";	
		}
		
	}
	echo "</table>";	
}



function listUserGames($otherUser = 0){	
	$start = 0;
	$end = 3;
	$Limit = 3;
	if ($page == 0){
		
	}else{
		$Limit = $Limit * $page;
		$start = $start + $Limit;
		$end = $end + $limit;
	}
	
	$username = $_COOKIE['ID_your_site'];
	$allgames = mysql_query("SELECT * FROM archives WHERE username = '".$otherUser."'");
	$allgamesArray = mysql_fetch_array($allgames);
	$allgamesDecode = json_decode($allgamesArray['Games'],true);
	
	if(isset($allgamesDecode)){
		echo "<table border=0>
		<tr>
		<form method='POST' action='user.php'>
		<td><input type='text' name='username' value='".$otherUser."' hidden></input></td>
		<td><input type='text' name=searchInUserGames></td>
		<td><input type='submit' name='submitSearchInUserGames' value='Ara'></td>
		</form>
		</tr>
		</table>";
		
		
		echo "<table>";
		echo "<th></th><th>Name</th><th>Description</th><th>Release Date</th><th>Developer</th><th>Archivers</th>";
		foreach($allgamesDecode as $games){
			$gameNameReal = mysql_real_escape_string($games['Name']);
			$getArchivedUsers = mysql_query("SELECT archivedUsers FROM games WHERE Name = '".$gameNameReal."'") or die(mysql_error());
			$archivedUsers = mysql_fetch_row($getArchivedUsers)[0];
			
			listingGames($games,$otherUser=$otherUser,$listPage=0,$formPage ="user.php");
		}
		echo "</table>";
	}

} // OYUNLARI GETİR FONKSİYONUN SONU


	






function listGames($page = 0){	
	$start = 0;
	$end = 10;
	$Limit = 10;
	$gamePage = $page;
	
	if ($page == 0){
		
	}else{
		$Limit = $Limit * $page;
		$start = $start + $Limit;
		$end = $end + $limit;
	}
	
	echo "<table border=0>
	<tr>
	<form method='POST' action='oyun.php'>
	<td><input type='text' name='gameName'></td>
	<td><input type='submit' name='submitSearchInGames' value='Ara'></td>
	</form>
	</tr>
	</table>";
	
	 

	
	echo "<table border=0>";
	echo "<th></th><th>Name</th><th>Description</th><th>Release Date</th><th>Developer</th><th>Archivers</th>";
	
	$selectTop50 = mysql_query("select * from games LIMIT ".$start.", ".$end."");
	while ($games = mysql_fetch_assoc($selectTop50)){
		
		listingGames($games = $games,$otherUser = "Null",$listPage = $page,$formPage = "oyun.php");
		
		}
	echo "</table>";
	
	$arrayGamePages = mysql_query("SELECT * FROM games");
	$arrayGamePagesCount = mysql_num_rows($arrayGamePages) / (mysql_num_rows($arrayGamePages) / 2);
	$arrayGamePagesCount = $arrayGamePagesCount - 1;
	
	// SAYFALARI AYARLAR
	echo "<table style='margin:auto;'; ><tr>";
	echo "<form method = post action = 'oyun.php'>";
	for($x = 0; $x <= $arrayGamePagesCount;$x++){
		if($gamePage == $x){
			echo "<td><input type=submit name=submitPage value=".$x." disabled></td>";
			
		}else{
			echo "<td><input type=submit name=submitPage value=".$x."></td>";
			
		}
		
		}
	echo "</form>";
	echo "</tr></table>";	
		
} // OYUNLARI GETİR FONKSİYONUN SONU



function addGameArchive($addGameName,$isUserPage = 0,$otherUserName){
	

	
	if(ctr($addGameName) == 0){
		$findGame = mysql_query("SELECT * FROM games WHERE Name = '".mysql_real_escape_string($addGameName)."'") or die(mysql_error());
		
		$findGameArray = mysql_fetch_array($findGame);
		
		$gameName = $findGameArray["Name"];
		$gameDescription = mysql_real_escape_string($findGameArray["Description"]);
		$gameId = $findGameArray["ID"];
		$username = $_COOKIE["ID_your_site"];
	
		
		$gameNameEsc = mysql_real_escape_string($addGameName);
		$newCount = $gamesCount + 1;
		
		
		$json = '{"ID" : "'.$gameId.'","Name" : "'.$gameNameEsc.'", "Index" : "'.$newCount.'", "Description" : "'.$gameDescription.'"}';
		
		
		$selectArchivedUsers = "SELECT archivedusers FROM games WHERE Name = '".$gameNameEsc."'";
		$selectArchivedUsersQuery = mysql_query($selectArchivedUsers);
		$updateArchivedUsersCount =  mysql_fetch_array($selectArchivedUsersQuery)[0] + 1;
		
		
		$updateArchivedUsers = "UPDATE games SET archivedusers = ".$updateArchivedUsersCount."  WHERE Name = '".$gameNameEsc."'";
		mysql_query($updateArchivedUsers) or die (mysql_error());
		
		$addArchive = "UPDATE archives SET games = JSON_ARRAY_APPEND(games, '$', CAST('".$json."' as JSON)) WHERE username = '".$username."'";
		mysql_query($addArchive) or die(mysql_error());
		
		
		if($isUserPage == 1){
			listUserGames($otherUserName);
			echo "<h2>".$otherUserName."' nin Oyunu : ".$addGameName." arşive eklendi !</h2>";
			echo $isUserPage;
			}else{
				
				echo "<h2>".$addGameName." arşive eklendi !</h2>";
			}
		
		
		
	}else{
		echo "<h2>Zaten arşivde var !</h2>";}
	
}




function removeGameArchive($gameID,$Username){

		$gameId =  $gameID;
		$username = $Username;
		$selectArchive = mysql_query("SELECT Games FROM archives WHERE Username ='".$username."' ") or die(mysql_error);
		$archiveArray = mysql_fetch_array($selectArchive);
		$arrayDecode = json_decode($archiveArray[0],true);
		$arrayCount = 0;
		
		$selectArchivedUsers = "SELECT archivedusers FROM games WHERE ID = '".$gameId."'";
		$selectArchivedUsersQuery = mysql_query($selectArchivedUsers);
		$updateArchivedUsersCount =  mysql_fetch_array($selectArchivedUsersQuery)[0] - 1;
		echo $updateArchivedUsersCount;
		
		
		$updateArchivedUsers = "UPDATE games SET archivedusers = ".$updateArchivedUsersCount."  WHERE ID = '".$gameId."';";
		mysql_query($updateArchivedUsers) or die (mysql_error());
		
		foreach($arrayDecode as $removeGameEach){
			
			if($removeGameEach['ID'] == $gameId){
				
				mysql_query("UPDATE archives SET Games = JSON_REMOVE(Games,'$[".$arrayCount."]') WHERE Username = '".$username."'") or die(mysql_error());
				
				
			}
			$arrayCount++;
		}
}
?>