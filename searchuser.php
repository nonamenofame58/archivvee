<?php
include "inc/menu.php";
include "inc/functions.php";

if(isset($_POST['submitSearchUser'])){
	searchUser($username = $_POST['searchUser']);
}



echo 
"<table>
<tr>
<form method='POST' action='searchuser.php'>
<td><input type='text' name='searchUser'  ></td>
<td><input type='submit' name='submitSearchUser' value='Ara'></td>
</form>
</tr>
</table>"



?>