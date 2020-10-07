<?php ob_start() ?>


<?php require_once '_partials/_errors.php'  ?> 


	<div class="card" style="margin-top: 5rem;">
		  <div class="card-body">
		    <form method="POST">
		      <p class="h4 text-center py-4">Entrez votre mail</p>
		      <div class="md-form">
		        <i class="fa fa-user-ninja"></i>
		        <input type="email" class="form-control" name="email">
		        <label for="email" class="font-weight-normal">Mail</label>
		      </div>
				<button type="submit" class="btn btn-cyan" name="forget_mdp">Envoyer</button>
			</form>
		  </div>
	</div>




<?php $contenu = ob_get_clean()  ?>


<?php require_once 'views/gabarit.php'; ?>

