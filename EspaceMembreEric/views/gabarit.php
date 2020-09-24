<?php require_once '_partials/_header.php'; ?>
<?php require_once '_partials/_nav.php'; ?>


<main role="main" class="container text-center">
		<?php if (!empty($_SESSION['message_flash'])) {
		 	echo $_SESSION['message_flash'];
		 	$_SESSION['message_flash']=[];

		 }
		 ?>

       <?= $contenu; ?>
			  
 </main>

<?php require_once '_partials/_footer.php'; ?>