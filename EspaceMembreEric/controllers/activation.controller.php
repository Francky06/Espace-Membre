<?php require_once 'models/activation.model.php' ?>


<?php  
active_compte(htmlspecialchars($_GET['pseudo']), htmlspecialchars($_GET['token']));

?>