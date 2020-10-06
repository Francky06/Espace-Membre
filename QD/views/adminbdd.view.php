<?php ob_start() ?>

<form name="etudiants" method="POST" action="" class="formm" > 
		<p><label for="nom" style="width:100px;display:inline-block;">Nom :</label><input type="text" name="name" id="name" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['name']; ?>"/></p>
		<p><label for="prenom" style="width:100px;display:inline-block;">Pseudo :</label> <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['pseudo']; ?>"/></p>
		<p><label for="classe" style="width:100px;display:inline-block;">Email :</label> <input type="text" name="email" id="email" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['email']; ?>"/></p>
		
		<button class="btn btn-cyan" type="submit" name="ok" value="Enregistrement en BDD" >Valider</button>
	</form> 
	<div class="bulleflex">
				<?php
		
//********************************** affichage de toutes les données bdd
$id = $_GET['id'];
$reponse = getbdd()->prepare('SELECT * FROM users where id = :id'); 
$reponse->execute(array(':id'=>$id));
while ($donnees = $reponse->fetch()) // On affiche chaque entrée une à une
{
	?>
	
	<div class="card bulle">
		<p>
			<strong>Nom</strong>  : <?php echo $donnees['name']; ?><br />
			<strong>Pseudo </strong>  :  <?php echo $donnees['pseudo']; ?><br />
			<strong>Email</strong>  : <?php echo $donnees['email']; ?><br />
			<strong>id</strong>  : <?php echo $donnees['id']; ?><br />
			<?php echo '<a href="?page=adminbdd&action=supprimer&id='.$donnees['id'].'">Supprimer l\'utilisateur</a>'; ?><br />
			<?php echo '<a href="?page=adminbdd&action=maj&id='.$donnees['id'].'">Mise à jour de l\'utilisateur</a>'; ?><br />
		</p>
	</div>

	<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</div>

<?php $contenu = ob_get_clean()  ?>
<?php require_once 'views/gabarit.php'; ?>