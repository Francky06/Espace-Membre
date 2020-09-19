<?php  
session_start();
include "database.php";

if (isset($_POST['envoyer'])){

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$password = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
	$password_confirm = password_hash($_POST['mdp2'],PASSWORD_DEFAULT);
	date_default_timezone_set('Europe/Paris');
	$date = date('d/m/Y à H:i:s');


	if (!empty($pseudo) AND !empty($mail) AND !empty($password) AND !empty($password_confirm)){
			
			if (strlen($pseudo) <= 16) {
				if (filter_var($mail,FILTER_VALIDATE_EMAIL)) {
					if (password_verify($_POST['mdp'],$password_confirm)) {
						$_POST= array_map('trim',$_POST);
						extract($_POST,EXTR_SKIP);

						//verif si mail existe
						$verifMail = $bdd->prepare("SELECT * FROM users WHERE email=?");
						$verifMail->execute([$mail]); 
						$user = $verifMail->fetch();
						if ($user) {
						    $errorMessage ='Ce mail est déjà pris';
						} else {
							
						//insertion BDD
						$reponse = $bdd->prepare('INSERT INTO users(pseudo,email,password,isadmin,registerdate) VALUES(?,?,?,?,?)');
					    $reponse -> execute(array($pseudo,$mail,$password,0,$date));
						if($reponse){
								echo 'Merci';
								header('location:login.php');
								exit();
								
							}
						}

				}else{
					$errorMessage = "Votre mdp n'est pas valide";
				}
				}else{
					$errorMessage = "Votre mail n'est pas valide";
				}
				}else{
					$errorMessage = 'Le pseudo est trop long';
				}
				}else{
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
	<a href="login.php">Se connecter</a><br><br>

</div>
<div>
<?php if(isset($errorMessage)) { ?><p style="color:red;"><?php echo $errorMessage ?></p><?php } ?>
<?php if(isset($succesMessage)) { ?><p style="color:green;"><?php echo $succesMessage ?></p><?php } ?>

<form action="" method="POST">
  		<fieldset style="width: 800px;">
  			<legend>Pseudo</legend>
			<input type="text" name="pseudo" placeholder="Entrez votre pseudo" style="width: 500px;" 
			<?php if(isset($pseudo)) { ?>value="<?= $pseudo ?>" <?php } ?>>
		</fieldset>

		<fieldset style="width: 800px;">
  			<legend>Mail</legend>
			<input type="email" name="mail" placeholder="Entrez votre mail" style="width: 500px;"
			<?php if(isset($mail)) { ?>value="<?= $mail ?>" <?php } ?>>
		</fieldset>

		<fieldset style="width: 800px;">
  			<legend>Mot de passe</legend>
			<input type="password" name="mdp" placeholder="Entrez votre MDP" style="width: 500px;">
		</fieldset>

		<fieldset style="width: 800px;">
  			<legend>Confirmer MDP</legend>
			<input type="password" name="mdp2" placeholder="Entrez votre MDP" style="width: 500px;">
		</fieldset>

		<button style="margin-top:50px;" type="submit" name="envoyer">Envoyer</button><br><br>
</div>
</body>
</html>