<?php 
	


	function message_flash ($message,$type='success') {
		$_SESSION['message_flash'] = 
		'<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
	}


	//fonction unicite
	function activ_mail ( $name, $pseudo, $email) {
		$token = sha1($name.$pseudo.$email);
		// @ devant fonction ne renvoie pas les erreurs
		if(@mail($email,'Activation du compte','Activation du compte, Cliquez ici : '.WEBSITE_URL.'?page=activation&pseudo='.$pseudo.'&token='.$token)) {
			message_flash ('Un mail de confirmation vient d\' être envoyé', 'info');
		}else {
			message_flash ('Problème lors de l\'envoi du mail d\'activation', 'danger');
		}
	}

	function is_already_in_use($field, $value,$table) {
		$bdd = getbdd();
		$reponse = $bdd->prepare('SELECT id FROM '.$table.' WHERE '.$field.' = ?');
		$reponse -> execute(array($value));
		$count = $reponse->rowCount();
		return $count;
	}


	//test si les champs ne sont pas vides
	function not_empty($tabRegisterC) {
		foreach ($tabRegisterC as $champ) {
			//raisonnement inverse !empty
			if (empty($_POST[$champ]) || trim($_POST[$champ])== "") {
				return false;
			}
		}
		return true;
	}

	function forget_mdp_email ($name, $pseudo, $email) {
		$token = sha1($name.$pseudo.$email);
		// @ devant fonction ne renvoie pas les erreurs
		if(@mail($email,'Réinitilisation du compte','Réinitilisation du compte, Cliquez ici : '.WEBSITE_URL.'?page=reset_mdp&pseudo='.$pseudo.'&token='.$token)) {
			message_flash ('Un mail de réinitialisation vient d\' être envoyé', 'info');
		}else {
			message_flash ('Problème lors de l\'envoi du mail de reinitialisation', 'danger');
		}
	}



?>