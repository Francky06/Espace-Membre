<?php require_once 'config/database.php';?>;
<?php require_once '_partials/_header.php'; ?>
<?php require_once '_partials/_nav.php'; ?>

<?php  

	if(isset($_POST["ok"]) AND !empty($_POST["name"]) AND !empty($_POST["pseudo"]) AND !empty($_POST["email"])) {   
	$_POST=array_map('htmlspecialchars',$_POST);
	extract($_POST,EXTR_SKIP); 
	 if(isset($_GET["action"]) AND $_GET["action"]==("maj"))
	         {$req = getbdd()->prepare('UPDATE users SET name = :name , pseudo = :pseudo, email= :email WHERE id = :id'); 
	       $req->execute(array('name'=>$name, 'pseudo'=>$pseudo,'email'=>$email,'id'=>$_GET["id"]));  
	     }
	     else {$req = getbdd()->prepare('INSERT INTO users(name, pseudo, email) VALUES(:name,:pseudo,:email)');
	     $req->execute(array('name'=>$name, 'pseudo'=>$pseudo,'email'=>$email));}
	   }
	// Suppression d'éléments
	   if(isset($_GET["action"]) AND $_GET["action"]==("supprimer") AND is_numeric($_GET["id"]))
	   {
	    $id=$_GET["id"]; 	
	    $req = getbdd()->prepare('DELETE FROM users WHERE id= :id');
	    $req->execute(array('id'=>$id)); 
	  }
	// MAJ d'éléments
	  if(isset($_GET["action"]) AND $_GET["action"]==("maj") AND is_numeric($_GET["id"]))
	  {	   
	    $reponse = getbdd()->prepare('SELECT * FROM users WHERE id= :id'); 
	    $reponse->execute(['id'=>$_GET["id"]]);
	    $donnees = $reponse->fetch();
	//print_r($donnees);exit;
	//$req = $bdd->prepare('DELETE FROM etudiants WHERE id= :id');
	//$req->execute(array('id'=>$id));	    
	  }
	  ?>
 
 <body> <br><br><br>
  <form name="etudiants" method="POST" action="" class="formm" > 
  <p><label for="nom" style="width:100px;display:inline-block;">Nom :</label><input type="text" name="name" id="name" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['name']; ?>"/></p>
   <p><label for="prenom" style="width:100px;display:inline-block;">Pseudo :</label> <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['pseudo']; ?>"/></p>
   <p><label for="classe" style="width:100px;display:inline-block;">Email :</label> <input type="text" name="email" id="email" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['email']; ?>"/></p>
  
   <button class="btn btn-cyan" type="submit" name="ok" value="Enregistrement en BDD" >Valider</button>
 </form> 
 <div class="bulleflex">
 <?php
 
//********************************** affichage de toutes les données bdd

$reponse = getbdd()->prepare('SELECT * FROM users'); 
$reponse->execute();
while ($donnees = $reponse->fetch()) // On affiche chaque entrée une à une 
{
  ?>
  
  <div class="card bulle">
  <p>
    <strong>Nom</strong>  : <?php echo $donnees['name']; ?><br />
    <strong>Pseudo </strong>  :  <?php echo $donnees['pseudo']; ?><br />
    <strong>Email</strong>  : <?php echo $donnees['email']; ?><br />
    <?php echo '<a href="?action=supprimer&id='.$donnees['id'].'">Supprimer l\'utilisateur</a>'; ?><br />
    <?php echo '<a href="?action=maj&id='.$donnees['id'].'">Mise à jour de l\'utilisateur</a>'; ?><br />
  </p>
</div>

  <?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</div>	
</body> 
<html> 





<?php require_once '_partials/_footer.php'; ?>