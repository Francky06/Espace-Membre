		<?php /*mise en memoire*/ ?>
		<?php ob_start() ?>

		<?php require_once '_partials/_errors.php' ?>

         	

		<div class="card" style="margin-top: 5rem;">
		  <div class="card-body">
		    <form method="POST">
		      <p class="h4 text-center py-4">S'inscrire</p>
		      <div class="md-form">
		        <i class="fa fa-user-secret"></i>
		        <input type="text" class="form-control" name="name">
		        <label for="name" class="font-weight-normal">Nom</label>
		      </div>
		      <div class="md-form">
		        <i class="fa fa-user-ninja"></i>
		        <input type="text" class="form-control" name="pseudo">
		        <label for="pseudo" class="font-weight-normal">Pseudo</label>
		      </div>
		      <div class="md-form">
		        <i class="fa fa-parachute-box"></i>
		        <input type="email" class="form-control" name="email">
		        <label for="email" class="font-weight-normal">Email</label>
		      </div>
		       <div class="md-form">
		        <i class="fa fa-jedi"></i>
		        <input type="password" class="form-control" name="password">
		        <label for="password" class="font-weight-normal">Mot de passe</label>
		      </div>
		      <div class="md-form">
		        <i class="fa fa-signature"></i>
		        <input type="password" class="form-control" name="password_confirm">
		        <label for="password" class="font-weight-normal">Confirmer votre mot de passe</label>
		      </div>
		      <div class="text-center py-4 mt-3">
		        <button class="btn btn-cyan" type="submit" name="register">Incription</button>
		      </div>
		    </form>
		  </div>
		</div>


<?php $contenu = ob_get_clean() ?>
<?php require_once 'views/gabarit.php'; ?>