<?php  

function getbdd() {
try {   
	$bdd = new PDO('mysql:host=localhost;dbname=espace_membres', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$bdd -> exec("set names utf8"); 
	
	} catch(Exception $e) {     
	die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}
	?>