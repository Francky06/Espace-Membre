<?php 

function active_compte ($pseudo, $token) {
	$bdd=getbdd();
	$req = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
	$req->execute([$pseudo]);

	if ($req->rowCount()) {
		$utilisateur = $req->fetch(PDO::FETCH_OBJ);

		$token_verif = sha1($utilisateur->name.$utilisateur->pseudo.$utilisateur->email);
		if ( $token == $token_verif) {
			$req = $bdd->prepare('UPDATE users SET active = "1" WHERE pseudo = ?');
			$req->execute([$pseudo]);
			message_flash('Bien ouej, compte activé');
			header('location: ?page=login');
			exit;
		}else{
			message_flash('Lien incorrect', 'danger');
			header ('location ?page=login');
			exit;
		}

	
	}

}


?>