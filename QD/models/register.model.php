<?php 

function register_user($name,$pseudo,$email,$password,$isadmin) {
	$bdd = getbdd();
	$reponse = $bdd->prepare('INSERT INTO users (name,pseudo,email,password,isadmin) VALUES (:name,:pseudo,:email,:password,:isadmin)');
	$reponse -> execute(array('name'=>$name,'pseudo'=>$pseudo,'email'=>$email,'password'=>$password, 'isadmin'=>$isadmin));

}

?>