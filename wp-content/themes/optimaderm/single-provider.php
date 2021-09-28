<?php get_header();
while ( have_posts() ) : the_post(); 
$providerinfo = get_post_meta( $post->ID );
?>
	<div class="entry-content-page provider interior" id="main_content">
		<div class="container">
			<div id="provider_hero">
				<div class="container">
					<div class="img">
						<?php if (get_the_post_thumbnail_url($post->ID) == ""){
							$thumbUrl = '/wp-content/themes/optimaderm/img/defaultprovider.svg';
							$xtraClass = "default";
						} else {
							$thumbUrl = get_the_post_thumbnail_url($post->ID);
							$xtraClass = "";
						} ?>
						<div class="thumb <?php echo $xtraClass; ?>" style="background-image: url(<?php echo $thumbUrl; ?>)"></div>
						<?php
					
						?>
						<?php if ( isset ( $providerinfo['logo_img'] ) && $providerinfo['logo_img'][0] !== "" ) echo '<div class="logo"><img src="'.$providerinfo['logo_img'][0].'" alt="Optima Dermatology"></div>'; ?>
						<!-- <div class="logo"><img src="/wp-content/uploads/2021/03/optima_logo.svg" alt="Optima Dermatology"></div> -->
					</div>
					<div class="info">
						<h1><?php echo get_the_title($post->ID); ?></h1>
						<?php if ( isset ( $providerinfo['position'] ) && $providerinfo['position'][0] !== "" ) echo '<p class="title">'.$providerinfo['position'][0].'</p>';?>
						<?php if (isset($providerinfo['review']) && $providerinfo['review'][0] > 0){ ?>
						<div class="reviews" data-num="<?php echo $providerinfo['review'][0]; ?>">
							<?php for($x=0;$x<$providerinfo['review'][0];$x++){
								echo '<img src="/wp-content/themes/optimaderm/img/star.svg" alt="'.($x+1).' Star">';
							} ?>
							<!-- <span>(49 Reviews)</span> -->
						</div>
						<?php } ?>
						<?php if(has_excerpt() && get_the_excerpt($post->ID) !== ""){ ?><p class="desc"><?php echo get_the_excerpt(); ?></p><?php } ?>
						<div class="btns"><p><a href="/contact-us" class="btn orange">Request Appointment</a></p></div>
					</div>
				</div>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
<?php
endwhile;
wp_reset_query();
?>
<?php  get_footer(); ?>