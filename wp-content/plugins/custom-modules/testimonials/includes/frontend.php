<?php

$testimonials_class = 'fl-testimonials-wrap ' . $settings->layout;

if ( '' == $settings->heading && 'compact' == $settings->layout ) {
	$testimonials_class .= ' fl-testimonials-no-heading';
}

?>
<div class="<?php echo $testimonials_class; ?>">

	<div class="testimonial_heading">
		<h3>What our patients are saying:</h3>
	</div>

	<div class="fl-testimonials custom">
		<?php

		for ( $i = 0; $i < count( $settings->testimonials ); $i++ ) :

			if ( ! is_object( $settings->testimonials[ $i ] ) ) {
				continue;
			}

			$testimonials = $settings->testimonials[ $i ];

			?>
		<div class="fl-testimonial">
			<div class="stars">
				<?php for($x=0;$x<$testimonials->star_rating;$x++){
					echo '<img src="/wp-content/themes/optimaderm/img/star.svg" alt="'.($x+1).' Star">';
				} ?>
			</div>
			<?php echo $testimonials->testimonial; ?>
			<?php 
			if($testimonials->name){
				echo '<p class="name">- '.$testimonials->name.'</p>';
			}
			?>
		</div>
		<?php endfor; ?>
	</div>
	<div class="slider-controls">
		<div class='a-left control-c prev slick-prev slide-m-prev'><img src='/wp-content/themes/optimaderm/img/left-orange.svg' alt="Previous Slide"></div>
		 <div class="slide-m-dots"></div>
		 <div class='a-right control-c next slick-next slide-m-next'><img src='/wp-content/themes/optimaderm/img/right-orange.svg' alt="Next Slide"></div>
		</div>
	
</div>
