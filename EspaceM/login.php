<?php  
session_start();
include "database.php";

	if (isset($_POST['envoyer'])){
		$mail = htmlspecialchars($_POST['mail']);
		$password = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
		if (!empty($mail) AND !empty($password)) {
			$_POST= array_map('trim',$_POST);
					extract($_POST,EXTR_SKIP);

			//verif A REFAIRE
			$verif = $bdd->prepare("SELECT * FROM users WHERE email=? AND password =?");
			$verif->execute(array($mail,$password));
			$utilisateur = $verif->rowCount();
			if ($utilisateur == 1){
				$succesMessage = 'Bravo';
			}else{
				$errorMessage = 'Identifiants incorrect';
			}
		}	else{
			$errorMessage = 'Veuillez remplir tous les champs';
			}
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

<div>
	<a href="index.php">Accueil</a><br><br>
	<a href="register.php">S'inscrire</a><br><br>
</div>

<?php if(isset($errorMessage)) { ?><p style="color:red;"><?php echo $errorMessage ?></p><?php } ?>
<?php if(isset($succesMessage)) { ?><p style="color:green;"><?php echo $succesMessage ?></p><?php } ?>

<form action="" method="POST">

		<fieldset style="width: 800px;">
  			<legend>Mail</legend>
			<input type="mail" name="mail" placeholder="Entrez votre mail" style="width: 500px;">
		</fieldset>

		<fieldset style="width: 800px;">
  			<legend>Mot de passe</legend>
			<input type="password" name="mdp" placeholder="Entrez votre MDP" style="width: 500px;">
		</fieldset>

		<button style="margin-top:50px;" type="submit" name="envoyer">Envoyer</button><br><br>

</body>
</html>