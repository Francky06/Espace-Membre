<?php require_once 'models/register.model.php' ?>

<?php 
	if (isset($_POST['register'])) {
		if (not_empty (['name','pseudo','email','password','password_confirm'])) {
		$_POST= array_map ("htmlspecialchars", $_POST);
		$_POST= array_map ('trim',$_POST);
		extract($_POST,EXTR_SKIP);
		

		if (mb_strlen($name) > 30 ){
			$errors[]= 'Le nom est trop long'.'<br>';
		}
		if (mb_strlen($pseudo) < 2 ){
			$errors[]= 'Le pseudo est trop court'.'<br>';
		}
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$errors[]= 'Le mail n\'est pas au format'.'<br>';
		}
		if (mb_strlen($password) < 2 ){
			$errors[]= 'Le mot de passe est trop court'.'<br>';
		}
		else if ($password != $password_confirm){
			$errors[]= 'Les mots de passe sont differents'.'<br>';
		}

		if (is_already_in_use('pseudo', $pseudo, 'users')) {
			$errors[]='Ce pseudo est deja pris'.'<br>';
		}
		if (is_already_in_use('email', $email, 'users')) {
			$errors[]='Ce mail est deja pris'.'<br>';
		}
		
		if (count($errors) == 0 ) {
			$password = password_hash($password, PASSWORD_DEFAULT);

			activ_mail($name,$pseudo,$email);
			register_user($name,$pseudo,$email,$password,0);
			
		}
	}
}




?>

<?php require_once 'views/register.view.php'; ?>



