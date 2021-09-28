<div class="providers_list">
	<div class="container">
		<h3>Our Providers</h3>
		<div class="carousel" data-count="<?php echo count($settings->provideroptions); ?>">
			<?php
			if(count($settings->provideroptions) > 0){ 
			foreach($settings->provideroptions as $provider){
				$providerinfo = get_post_meta( $provider );
			?>
			<div class="block">
				<div class="contents">
					<?php if (get_the_post_thumbnail_url($provider) == ""){
						$thumbUrl = '/wp-content/themes/optimaderm/img/defaultprovider.svg';
						$xtraClass = "default";
					} else {
						$thumbUrl = get_the_post_thumbnail_url($provider);
						$xtraClass = "";
					} ?>
					<div class="thumb <?php echo $xtraClass; ?>" style="background-image: url(<?php echo $thumbUrl; ?>);"></div>
					<p class="name"><?php echo get_the_title($provider); ?></p>
					<?php if ( isset ( $providerinfo['position'] ) && $providerinfo['position'][0] !== "" ) echo '<p class="title">'.$providerinfo['position'][0].'</p>';?>
					<!-- <hr> -->
					<?php if ( isset ( $providerinfo['locations']) && count(explode(",", $providerinfo['locations'][0]) > 0)){ ?>
					<p class="locations">Practices at: <b><?php echo count(explode(",", $providerinfo['locations'][0])); ?> Locations</b></p>
					<?php } ?>
					<p class="btns">
						<a href="/contact-us" class="btn">Request Appointment</a>
						<br>
						<a href="<?php echo get_the_permalink($provider); ?>" class="btn orange">View Profile</a>
					</p>
					<?php if ( isset ( $providerinfo['logo_img']) && $providerinfo['logo_img'][0] !== ""){ ?>
					<div class="logo">
						<img src="<?php if ( isset ( $providerinfo['logo_img'] ) ) echo $providerinfo['logo_img'][0]; ?>" alt="Optima Dermatology">
					</div>
					<?php } ?>
				</div>
			</div>
			<?php } } ?>
		</div>
		<div class="slider-controls">
			<div class='a-left control-c prev slick-prev slide-m-prev'><img src='/wp-content/themes/optimaderm/img/left-orange.svg' alt="Previous"></div>
			 <div class='a-right control-c next slick-next slide-m-next'><img src='/wp-content/themes/optimaderm/img/right-orange.svg' alt="Next"></div>
		</div>
	</div>
</div>