<?php  

function forget_mdp($email) {
	global $errors;
	$bdd=getbdd();
	$req = $bdd->prepare('SELECT * FROM users WHERE email = :email');
     $req->execute(['email'=>$email]);

     $userHasBeenFound = $req->rowCount();

     if ($userHasBeenFound ) {
     	$utilisateur = $req->fetch(PDO::FETCH_OBJ); // on récupère sous forme d'objet
     	//echo $userHasBeenFound; exit;

     	forget_mdp_email($utilisateur->name, $utilisateur->pseudo, $utilisateur->email);

     }else {
     	$errors[]="Le compte n' existe pas !<br>";
     }





	}