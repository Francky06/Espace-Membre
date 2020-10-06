<?php /*mise en memoire*/ ?>
<?php ob_start() ?>

				
<main>
	<section class="landing">
		<div class="heros">
		<img src="assets/images/woman.jpg" alt="">
		</div>
		<h2 id="logo">Pimp' & <span style="color:#d13248">Mim's!</span> </h2>
		
	
		<h2 class="big-text"><span style="color:#d13248">Hello</span> Sexy</h2>
	</section>
</main> 
<div class="intro">
	<div class="intro-text">
		<h3 class="hide">
			<span class="text" style="color:#d13248">Quantic</span>
		</h3>
		<h3 class="hide">
			<span class="text" style="color:#dfd0ce">Design</span>
		</h3>
		<h3 class="hide">
			<span class="text" style="color:#e4355b">Development</span>
		</h3>
	</div>
</div>
<div class="slider"></div>

        		

				
				
		
<?php $contenu = ob_get_clean() ?>
<?php require_once 'views/gabarit.php'; ?>