<?php
include "inc/menu.php";
include "inc/functions.php";




 

$username = $_COOKIE['ID_your_site'];
$gameName = $_POST["gameName"];
$gameNameEsc = mysql_real_escape_string($_POST["gameName"]);
$gameDescription = $_POST["gameDescription"];
$gameDescriptionEsc = mysql_real_escape_string($_POST["gameDescription"]);



if (isset($gameName)){
	$allgames = mysql_query("SELECT * FROM games WHERE Name = '".$gameNameEsc."' ");
	$checkName = mysql_num_rows($allgames);

	if($checkName != 0){
		die ("Zaten Var !");
	}
	else{
		if (isset($_COOKIE['ID_your_site'])){
		$insert = "INSERT INTO games (Name, Description,Owner,releaseDate,developer,keywords) VALUES ('".$gameNameEsc."', '".$gameDescriptionEsc."','".$_COOKIE['ID_your_site']."','".$_POST['releaseDate']."','".$_POST['developer']."','".$keywords."')";
		mysql_query($insert);
		echo "Eklendi!";
		}	
		
	}
}
echo uniqid();



$dir = "./webicons/gameicons/";
$photoName = uniqid() . basename($_FILES['fileToUpload']['name']);

$target_file = $dir . $photoName;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
	
    $uploadOk = 1;
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	} else {
    echo "Sorry, there was an error uploading your file.";
	}
	
	echo "<img style='width:128px;height:128px;' src='".$_FILES["fileToUpload"]["tmp_name"]."'>";
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}






?>
<form action="oyunekle.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>


<form action='oyunekle.php' method='post' enctype='multipart/form-data'>
   <table border = 0>
  
   <tr><td>İsim :</td><td><input type = 'text' name = 'gameName'></td></tr>
   <tr><td>Açıklama : </td><td><input type = 'text' name = 'gameDescription'></td></tr>
   <tr><td>Geliştirici : </td><td><input type = 'text' name = 'developer'></td></tr>
   <tr><td>Yayın Tarihi : </td><td><input type = 'date' name = 'releaseDate'></td></tr>
   <tr><td>Anahtar Kelimeler : </td><td><input type = 'text' name = 'keywords'></td></tr>
   <th colspan = 3><input type = 'submit' ></th>
   </table>
   
</form>	

</body>
</html>