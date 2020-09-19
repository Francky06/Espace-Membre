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