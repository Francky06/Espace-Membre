<?php  


function getlogin($pseudo,$password,$isadmin)

{
   global $errors;
   $bdd=getbdd();

   $req = $bdd->prepare('SELECT id,pseudo,password,isadmin FROM users WHERE (pseudo = :pseudo OR email = :pseudo) AND active ="1"');
   $req->execute(['pseudo'=>$pseudo]);
   $userHasBeenFound = $req->rowCount();
     $utilisateur = $req->fetch(PDO::FETCH_OBJ); // on récupère sous forme d'objet
     //var_dump($utilisateur); exit;

     if ($userHasBeenFound and password_verify($password, $utilisateur->password)){
        
     	$_SESSION['id_user']=$utilisateur->id;
     	$_SESSION['pseudo']=$utilisateur->pseudo;
      $_SESSION['isadmin']=$utilisateur->isadmin;
     	header('location: ?page=profil');
     	exit;
     }
     else {
     	$errors[]="Erreur de login ou de mot de passe<br>";
     }
     }


