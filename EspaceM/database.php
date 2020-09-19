
<?php  

try {   
	$bdd = new PDO('mysql:host=localhost;dbname=first', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$bdd -> exec("set names utf8"); 
	} catch(Exception $e) {     
	die('Erreur : '.$e->getMessage());
	}




	?>