<?php 
	
	require_once 'models/administre.model.php'; 
	 


if ($_SESSION['isadmin'] == 0) {
	header('location: ?page=profil');
	exit;
	}

	require_once 'views/administre.view.php'; 
?>