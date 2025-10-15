
<style>
body {
	background-color:rgba(17, 48, 95,1);
	color : white;

}

a {
	color:white;
		
}


img{
	width:8px;
	height:8px;
}
tr:nth-child(even) {
  background-color: #095271;
 
}

</style>


<?php




if(isset($_COOKIE['ID_your_site'])){
	
	
	mysql_connect("localhost", "root", "password","archivve") or die(mysql_error());
	mysql_select_db("archivve") or die(mysql_error()); 
	
	

	echo "<table><tr><td><a href=mypage.php>".$_COOKIE['ID_your_site']."</a></td><td><a href ='logout.php' >Logout</a></td><td><a href = index.php>Index</a></td></tr></table>";
		
	
	echo 
	"<table>
	<tr>
	<td><a href = 'mygames.php'>Oyunlarım </a></td>
	<td><a href = 'mymovies.php'>Filmlerim </a></td>
	<td><a href = 'mymusics.php'>Müziklerim </a></td>
	<td><a href = 'oyunekle.php'>Oyun Ekle</a></td>
	<td><a href = 'searchuser.php'>Kullanıcı Ara</a></td>
	</tr>
	</table>";

	
	echo 
	"<table>
	 <tr>	
	 <td><a href = 'oyun.php'>Oyun </a></td>
	 <td><a href = 'film.php'>Film </a></td>
	 <td><a href = 'muzik.php'>Müzik </a></td>
	 </tr>
	 </table>";
	 
	 
	 

	}else{
	mysql_connect("localhost", "root", "password","archivve") or die(mysql_error());
	mysql_select_db("archivve") or die(mysql_error()); 
	
	echo "<a href = login.php>Login</a>";
	echo "<a href = add.php> Create User</a>";
	
	echo 
	 "<ul>
	 <li><a href = 'oyun.php'>Oyun </a></li>
	 <li><a href = 'film.php'>Film </a></li>
	 <li><a href = 'muzik.php'>Müzik </a></li>
	 </ul>";
	 
	 

	
}





?>