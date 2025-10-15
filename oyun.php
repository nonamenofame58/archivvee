<?php
include "inc/menu.php";
include "inc/functions.php";



if(isset($_POST['submitSearchInGames'])){
	if($_POST['gameName'] != ''){
		searchInGames($_POST['gameName']);
	}
}


if(isset($_POST['submitArchiveGame'])){
	
	$gamePage =  $_POST['gamePage'];
	addGameArchive($_POST['gameName'],$isUserPage = 0,"");
	
}

if(isset($_POST['submitRemoveArchive'])){
	$gameId = $_POST['gameId'];
	$username = $_POST['username'];
	$usernameOther = $_POST['usernameOther'];
	$gamePage =  $_POST['gamePage'];
	
	if(ctrWithId($gameId) == true){
		removeGameArchive($gameID = $gameId, $Username = $username);
	}
}


if(isset($_COOKIE['ID_your_site'])){
	// SAYFAYA GİDER
	if(isset($_POST["submitPage"])){
		$gamePage = $_POST["submitPage"];
		listGames($_POST["submitPage"]);
		}else{
			if(isset($gamePage)){		
				listGames($gamePage);
			}else{
				listGames(0);
			}
		}
	
	}
	


	
	
	
	// EĞER LOGİN DEĞİLSE MENÜYÜ LİSTELER
else{
	
	echo "<a href = login.php>Login</a>";
	echo "<a href = add.php> Create User</a>";
	echo "<a href = index.php>Index</a>";
	
	// BUTUN OYUNLARI BUTONSUZ LİSTELER
	$selectTop50 = mysql_query("select * from games");
	echo "<ul class = 'games-li'><li>";
	while ($games = mysql_fetch_assoc($selectTop50)){
	echo "<div class = 'games'>";
	echo "<h6>".$games['Name']."</h6>";
	echo "<img src = ".$games['headerPhoto'].">";
	echo "</div>";
	}
	echo "</ul></li>";

}


?>

</body>
</html>
