<?php 
	
	require_once 'models/adminbdd.model.php'; 
	
if ($_SESSION['isadmin'] == 0) {
	header('location: ?page=profil');
	exit;
	}

	if(isset($_POST["ok"]) AND !empty($_POST["name"]) AND !empty($_POST["pseudo"]) AND !empty($_POST["email"])) {   
	$_POST=array_map('htmlspecialchars',$_POST);
	$_POST=array_map('trim',$_POST);
	extract($_POST,EXTR_SKIP); 
	if(isset($_GET["action"]) AND $_GET["action"]==("maj"))
		{$req = getbdd()->prepare('UPDATE users SET name = :name , pseudo = :pseudo, email= :email WHERE id = :id'); 
	$req->execute(array('name'=>$name, 'pseudo'=>$pseudo,'email'=>$email,'id'=>$_GET["id"]));  
}
else {$req = getbdd()->prepare('INSERT INTO users(name, pseudo, email) VALUES(:name,:pseudo,:email)');
$req->execute(array('name'=>$name, 'pseudo'=>$pseudo,'email'=>$email));}
}
	// Suppression d'éléments
if(isset($_GET["action"]) AND $_GET["action"]==("supprimer") AND is_numeric($_GET["id"]))
{
	$id=$_GET["id"]; 	
	$req = getbdd()->prepare('DELETE FROM users WHERE id= :id');
	$req->execute(array('id'=>$id)); 
}
	// MAJ d'éléments
if(isset($_GET["action"]) AND $_GET["action"]==("maj") AND is_numeric($_GET["id"]))
{	   
	$reponse = getbdd()->prepare('SELECT * FROM users WHERE id= :id'); 
	$reponse->execute(['id'=>$_GET["id"]]);
	$donnees = $reponse->fetch();
	//print_r($donnees);exit;
	//$req = $bdd->prepare('DELETE FROM etudiants WHERE id= :id');
	//$req->execute(array('id'=>$id));	    
}




	require_once 'views/adminbdd.view.php'; 
?>