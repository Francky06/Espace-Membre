<?php ob_start() ?>


<?php require_once '_partials/_errors.php'  ?> 

		<div class="card" style="margin-top: 5rem;">
		  <div class="card-body">
		    <form method="POST">
		      <p class="h4 text-center py-4">Se connecter</p>
		      <div class="md-form">
		        <i class="fa fa-user-ninja"></i>
		        <input type="text" class="form-control" name="pseudo">
		        <label for="pseudo" class="font-weight-normal">Mail ou Pseudo</label>
		      </div>
		      <div class="md-form">
		        <i class="fa fa-signature"></i>
		        <input type="password" class="form-control" name="password">
		        <label for="password" class="font-weight-normal">Mot de passe</label>
		      </div>

		      	<a href="?page=forget_mdp">Mot de passe oublié</a><br><br>

				<button type="submit" class="btn btn-cyan" name="login">Se connecter</button>
			</form>
		  </div>
		</div>
<?php $contenu = ob_get_clean()  ?>


<?php require_once 'views/gabarit.php'; ?>









