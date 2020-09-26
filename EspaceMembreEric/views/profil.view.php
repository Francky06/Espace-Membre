<?php ob_start() ?>



<h1>Espace Membre</h1>

Bonjour <?= $_SESSION['pseudo'];  ?>

<?php $contenu = ob_get_clean()  ?>


<?php require_once 'views/gabarit.php'; ?>




