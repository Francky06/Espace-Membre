<?php require_once 'config/database.php';?>;

<?php  
if (isset($_GET['action']) AND $_GET['action'] =='supprimer' AND is_numeric($_GET['id'])){
	$reponse = getbdd()->prepare('DELETE FROM users WHERE id= :id');
	$reponse->execute(array('id'=>$_GET['id']));
	// Jamais de html au dessus de ca !!!!!!!!!
	header('location:administre.php');
	exit();
	}



?>

<?php require_once '_partials/_header.php'; ?>
<?php require_once '_partials/_nav.php'; ?>



<br><br><br><br><br>



<a href="index.php">Retour</a>
 <div class="container-fluid">
        <Table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <TR>
                    <TH>ID</TH>
                    <TH>Name</TH>
                    <TH>Pseudo</TH>
                    <TH>Email</TH>
                    <TH>Modifier</TH>
                    <TH>Supprimer</TH>
                </TR>
            </thead>            
            <?php
     			$req = "SELECT * FROM users";
                $resultat = getbdd()->query($req); 
                while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        // on recupere les champs de la ligne
                        $id = $row['id'];
                        $name = $row['name'];
                        $pseudo = $row['pseudo'];
                        $email = $row['email'];
                        // on ajoute à la page html la ligne					l
                        echo "<TR><TD>$id</TD><TD>$name</TD><TD>$pseudo</TD><TD>$email</TD></TR> ";
                    }    

  ?>
        </Table>


     <?php 




//LIRE BDD
 echo '* ETUDIANTS DE CLASSE DE BTS SN *<br>';
// affichage de toutes les données 
$reponse = getbdd()->prepare('SELECT * FROM users'); 
$reponse->execute();
while ($donnees = $reponse->fetch())
// On affiche chaque entrée une à une bdd
{
  ?>
  <p>
  	    <p><label for="nom" style="width:100px;display:inline-block;">Nom :</label><input type="text" name="name" id="name" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['name']; ?>"/></p>
   <p><label for="prenom" style="width:100px;display:inline-block;">pseudo :</label> <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['pseudo']; ?>"/></p>
   <p><label for="classe" style="width:100px;display:inline-block;">Classe :</label> <input type="text" name="email" id="email" value="<?php if(isset($_GET["action"]) AND $_GET["action"]==("maj")) echo $donnees['email']; ?>"/></p>

    <strong>Nom</strong>  : <?php echo $donnees['name']; ?><br />
    <strong>pseudo </strong>  :  <?php echo $donnees['pseudo']; ?><br />
    <strong>email</strong>  : <?php echo $donnees['email']; ?><br />
 	<?php

 	// lien pour supprimer, attention concatenation
 	echo '<a href="?action=supprimer&id='.$donnees['id'].'">Supprimer</a><br>';
 	echo '<a href="?action=maj&id='.$donnees['id'].'">changer</a><br>';
 	?>
  </p>
  <?php
}

?> 

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
          
<?php require_once '_partials/_footer.php'; ?>