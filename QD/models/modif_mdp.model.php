<?php 

function modif_mdp ($pseudo,$last_password,$new_password) {
	$bdd=getbdd();

	$req = $bdd->prepare('SELECT * FROM users WHERE (pseudo = :pseudo)');
    $req->execute(['pseudo'=>$pseudo]);
    $utilisateur = $req->fetch(PDO::FETCH_OBJ);

    if (password_verify($last_password, $utilisateur->password)) {
    	$req = $bdd->prepare('UPDATE users SET password = :password WHERE pseudo = :pseudo');
    	$req->execute(['password'=> password_hash($new_password, PASSWORD_DEFAULT) ,'pseudo'=>$pseudo]);
    	return true;
    }else {
    	return false;
    }
}







?>