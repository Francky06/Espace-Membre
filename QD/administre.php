<?php require_once 'config/database.php';?>;
<?php require_once '_partials/_header.php'; ?>
<?php require_once '_partials/_nav.php'; ?>
<br><br><br><br><br>

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
     echo "<TR><TD>$id</TD><TD>$name</TD><TD>$pseudo</TD><TD>$email</TD><TD><a href='modal.php'>Modifier</a></TD><TD><a href='modal.php'>Supprimer</a></TD></TR>";
                    }                 
  ?>
        </Table>

<a href="index.php">Retour</a>
     






          
<?php require_once '_partials/_footer.php'; ?>