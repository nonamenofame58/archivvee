<?php 
 $past = time() - 10; 
 //this makes the time in the past to destroy the cookie 
 setcookie(ID_your_site, gone, $past); 
 setcookie(Key_your_site, gone, $past); 
 header("Location: index.php"); 
 ?> 
