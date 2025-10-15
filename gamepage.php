<?php
include "inc/menu.php";
include "inc/functions.php";



if(isset($_GET['name'])){
	echo "<h1 style=color:black;>Welcome to the -".$_GET['name']. " page</h1>";
	echo $_GET['name'];
}





?>