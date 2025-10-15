<?php
include "menu.php";
mysql_connect("localhost", "root", "password","archivve") or die(mysql_error()); 
mysql_select_db("archivve") or die(mysql_error()); 

$username = $_POST['username'];
$password = $_POST['pass'];
echo $username;

echo "<h1>".$username."</h1>";



?>



