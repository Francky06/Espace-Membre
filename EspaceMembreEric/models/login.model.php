<?php  


function getlogin($pseudo,$password)

	{
		global $errors;
		$bdd=getbdd();

	$req = $bdd->prepare('SELECT id,pseudo,password FROM users WHERE (pseudo = :pseudo OR email = :pseudo) AND active ="1" ');
     $req->execute(['pseudo'=>$pseudo]);

     $userHasBeenFound = $req->rowCount();

     $utilisateur = $req->fetch(PDO::FETCH_OBJ); // on récupère sous forme d'objet
     //echo $userHasBeenFound; exit;

     if ($userHasBeenFound and password_verify($password, $utilisateur->password)){

     	$_SESSION['id_user']=$utilisateur->id;
     	$_SESSION['pseudo']=$utilisateur->pseudo;

     	header('location: ?page=profil');
     	exit;
     }
     else{

     	$errors[]="Erreur de login ou de mot de passe<br>";

     }





	}