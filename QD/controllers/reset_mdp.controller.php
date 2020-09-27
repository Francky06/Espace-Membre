<?php 
require_once 'models/reset_mdp.model.php'; 

if (!isset($_GET['pseudo']) and !isset($_GET['token'])) {
		header('location: index.php');
		exit;
		}else {
			if (verif_token($_GET['pseudo'],$_GET['token'])) {
			if (isset($_POST['reset_mdp'])) {
				if (not_empty(['password','confirm_password'])) {
					$_POST=array_map("htmlspecialchars",$_POST);
					$_POST=array_map("trim",$_POST);
					extract($_POST,EXTR_SKIP);
					if (mb_strlen($password) < 2) {
						$errors[]="Le mot de passe doit contenir au minimum 2 caractères<br>";
						}
					else if ($password !=$confirm_password) {
							$errors[]="Les deux mots de passe sont différents <br>";
						}

					if (count($errors)==0) {
						change_mdp($password,$_GET['pseudo']);
						message_flash("mot de passe modifié");
						header('location: ?page=login');
						exit;

					}

				}

	}


		}
		else{

			message_flash("Lien de réinitialisation incorrect",'danger');
			header('location: index.php');
			exit;


		}


	}




require_once 'views/reset_mdp.view.php'; 