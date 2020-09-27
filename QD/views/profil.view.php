<?php ob_start() ?>



<h1>Espace Membre</h1>

Bonjour <?= $_SESSION['pseudo'];  ?>

<a class="nav-link" href="?page=modif_mdp">Modifier son mot de passe</a>
<?php $contenu = ob_get_clean()  ?>


<?php require_once 'views/gabarit.php'; ?>




