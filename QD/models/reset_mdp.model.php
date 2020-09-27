<?php  

function verif_token($pseudo,$token) {

    global $errors;
    $bdd=getbdd();
    $req = $bdd->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
    $req->execute(['pseudo'=>$pseudo]);
    $userHasBeenFound = $req->rowCount();

    if ($userHasBeenFound) {
           $utilisateur = $req->fetch(PDO::FETCH_OBJ); 
            
            $token_verif=sha1($utilisateur->name.$utilisateur->pseudo.$utilisateur->email);

            if ($token==$token_verif) {
                return true;

            }else {
                return false;
            }
            }else {
                return false;

            }


        }


function change_mdp($password,$pseudo) {
    global $errors;
    $bdd=getbdd();
    $req = $bdd->prepare('UPDATE users SET password = :password WHERE pseudo = :pseudo');
    $req->execute(['password'=>password_hash($password,PASSWORD_DEFAULT),'pseudo'=>$pseudo]);

}
