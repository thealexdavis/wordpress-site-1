<div id="hero">
	<div class="img">
		
	</div>
	<div class="container">
		<div class="contents">
			<?php if ($settings->subtitle){
				echo '<h2>'.$settings->subtitle.'</h2>';
			} ?>
			<div class="btm">
				<?php if ($settings->title){
					echo '<h1>'.$settings->title.'</h1>';
				} ?>
				<?php if ($settings->ctabox_link){
					if($settings->ctabox_text){
						$ctaText = $settings->ctabox_text;
					} else {
						$ctaText = "Learn More";
					}
					echo '<a href="'.$settings->ctabox_link.'" class="btn">'.$ctaText.'</a>';
				} ?>
			</div>
		</div>
	</div>
</div>