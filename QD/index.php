<?php 
session_start();
require_once 'config/database.php';
require_once 'includes/functions.php';
require_once 'config/constant.php';
$errors=[];
	
	if (!empty($_GET['page']) AND is_file('controllers/'.$_GET['page'].'.controller.php')) {
		require_once 'controllers/'.$_GET['page'].'.controller.php';
	}else{
		require_once 'controllers/accueil.controller.php';
	}
?>
       
