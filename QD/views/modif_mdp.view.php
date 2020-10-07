<?php ob_start() ?>


<?php require_once '_partials/_errors.php'  ?> 


<div class="card" style="margin-top: 5rem;">
	<div class="card-body">
		<form method="POST">
		    <p class="h4 text-center py-4">Modifier son mot de passe</p>
			<div class="md-form">
				<i class="fa fa-user-lock"></i>
				<input type="password" class="form-control" name="last_password">
				<label for="password" class="font-weight-normal">Votre ancien mot de passe</label>
			</div>
			<div class="md-form">
				<i class="fa fa-signature"></i>
				<input type="password" class="form-control" name="new_password">
				<label for="password" class="font-weight-normal">Votre nouveau mot de passe</label>
			</div>
			<div class="md-form">
				<i class="fa fa-signature"></i>
				<input type="password" class="form-control" name="new_confirm_password">
				<label for="password" class="font-weight-normal">Confirmez votre mot de passe</label>
			</div>
			<button type="submit" class="btn btn-primary" name="modif_mdp">Modifier</button>
		</form>
	</div>
</div>


<?php $contenu = ob_get_clean()  ?>


<?php require_once 'views/gabarit.php'; ?>