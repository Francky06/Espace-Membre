<?php /*mise en memoire*/ ?>
<?php ob_start() ?>

				


        		<div class="banner">
        			
					<video autoplay muted loop src="assets/images/tv.mp4" type="video/mp4"></video>
					
				</div>

				
				
		
<?php $contenu = ob_get_clean() ?>
<?php require_once 'views/gabarit.php'; ?>