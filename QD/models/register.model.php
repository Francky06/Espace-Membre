<?php 

function register_user($name,$pseudo,$email,$password) {
	$bdd = getbdd();
	$reponse = $bdd->prepare('INSERT INTO users (name,pseudo,email,password) VALUES (:name,:pseudo,:email,:password)');
	$reponse -> execute(array('name'=>$name,'pseudo'=>$pseudo,'email'=>$email,'password'=>$password));

}

?>