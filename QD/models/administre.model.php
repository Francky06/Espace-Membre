

<?php
		function admin () {
     			$req = "SELECT * FROM users";
                $resultat = getbdd()->query($req); 
                while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        // on recupere les champs de la ligne
                        $id = $row['id'];
                        $name = $row['name'];
                        $pseudo = $row['pseudo'];
                        $email = $row['email'];

                                    
echo "<TR><TD>$id</TD><TD>$name</TD><TD>$pseudo</TD><TD>$email</TD><TD><a href='?page=adminbdd&id=$id'>Modifier</a></TD><TD><a href='page=adminbdd&id=$id'>Supprimer</a></TD></TR>";
                        } 
                        }                         
                        ?>
                   
        