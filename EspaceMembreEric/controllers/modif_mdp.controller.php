<?php 
require_once 'models/modif_mdp.model.php'; 

if (isset($_POST['modif_mdp'])) {
		if (not_empty(['last_password','new_password','new_confirm_password'])) {
			$_POST=array_map("htmlspecialchars",$_POST);
			$_POST=array_map("trim",$_POST);
			extract($_POST,EXTR_SKIP);
			

			if (mb_strlen($new_password) < 2 ){
			$errors[]= 'Le mdp est trop court'.'<br>';
			}else if ( $new_password != $new_confirm_password) {
			$errors[]= 'Les mdp sont differents'.'<br>';
			}
			
			if (count($errors)==0) {
				if (modif_mdp($_SESSION['pseudo'], $last_password,$new_password)) {
					message_flash('mdp modif');
					header('location: ?page=profil');
					exit;
				}else {
					$errors[]='Ancien mdp incorrect';
				}

			}
			}
	}




require_once 'views/modif_mdp.view.php'; 