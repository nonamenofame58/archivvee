<?php
mysql_connect("localhost", "root", "password","archivve") or die(mysql_error());





$gameName = $_POST["gameName"];
$gameDescription = $_POST["gameDescription"];

$sql = "SELECT * FROM games";
$result = mysql_query($sql);


while ($fetch = mysql_fetch_assoc($result)){
	echo $fetch['headerPhoto'];
	echo ">";
}








?>