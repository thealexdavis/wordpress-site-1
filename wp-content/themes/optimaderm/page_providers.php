<?php
/*
* Template Name: Providers
*/
 get_header();

$args = array(
 'post_type' => 'provider',
 'post_status' => 'publish',
 'posts_per_page' => 999,
 'order'    => 'ASC',
 'orderby'  => 'ln',
 'meta_key' => 'ln',
 'tax_query' => array(
	 array (
		 'taxonomy' => 'provtype',
		 'field' => 'slug',
		 'terms' => 'physician',
	 )
 ),
);
$providerQueryPhysician = new WP_Query($args);

$args = array(
	'post_type' => 'provider',
	'post_status' => 'publish',
	'posts_per_page' => 999,
	'order'    => 'ASC',
	 'orderby'  => 'ln',
	 'meta_key' => 'ln',
	'tax_query' => array(
	array (
			'taxonomy' => 'provtype',
			'field' => 'slug',
			'terms' => 'pa',
		)
	),
);
$providerQueryPA = new WP_Query($args);

$args = array(
	'post_type' => 'provider',
	'post_status' => 'publish',
	'posts_per_page' => 999,
	'order'    => 'ASC',
	 'orderby'  => 'ln',
	 'meta_key' => 'ln',
	'tax_query' => array(
	array (
			'taxonomy' => 'provtype',
			'field' => 'slug',
			'terms' => 'np',
		)
	),
);
$providerQueryNP = new WP_Query($args);

$args = array(
	'post_type' => 'provider',
	'post_status' => 'publish',
	'posts_per_page' => 999,
	'order'    => 'ASC',
	'orderby'  => 'ln',
	'meta_key' => 'ln',
	'tax_query' => array(
		array (
			'taxonomy' => 'provtype',
			'field' => 'slug',
			'terms' => 'rn',
		)
	),
);
$providerQueryRN = new WP_Query($args);

$locationsArgs = array(
	'post_type' => 'location',
	'post_status' => 'publish',
	'posts_per_page' => 999,
	'orderby' => 'title',
	'order' => 'ASC',
);
$locationsLoop = new WP_Query( $locationsArgs );

?>
<?php
while ( have_posts() ) : the_post(); ?>
	<div class="entry-content-page  <?php if(!is_front_page()){ echo "interior"; }?>" id="main_content">
		<div class="container">
			<?php if(!is_front_page()){ ?>
			<div id="top_hero">
				<div class="container">
					<h1><?php echo get_the_title(); ?></h1>
				</div>
			</div>
			<?php } ?>
			<div id="provider_filters">
				<p>Filter by:</p>
				<div class="select">
					<?php
						$servicesTerms = get_terms( array(
							'taxonomy' => 'specialty',
							'hide_empty' => false,
						));
					?>
					<select name="services" id="services">
						<option value="0">Specialty</option>
						<?php foreach ($servicesTerms as $service){
							echo '<option value="'.$service->term_id.'">'.$service->name.'</option>';
						} ?>
					</select>
				</div>
				<div class="select">
					<select name="location" id="location">
						<option value="0">Location</option>
						<?php if ($locationsLoop->have_posts() ) : while ( $locationsLoop->have_posts() ) : $locationsLoop->the_post(); ?>
							<option value="<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></option>
						<?php endwhile; wp_reset_query(); endif; ?>
					</select>
				</div>
				<div class="select">
					<?php
						$genderTerms = get_terms( array(
							'taxonomy' => 'gender',
							'hide_empty' => false,
						));
					?>
					<select name="gender" id="gender">
						<option value="0">Gender</option>
						<?php foreach ($genderTerms as $gender){
						echo '<option value="'.$gender->term_id.'">'.$gender->name.'</option>';
					} ?>
					</select>
				</div>
			</div>
			<div id="provider_results">
				<?php
				if ($providerQueryPhysician->have_posts() ) :
					while ( $providerQueryPhysician->have_posts() ) : $providerQueryPhysician->the_post(); $providerinfo = get_post_meta(get_the_id());
					$servicesTermList = wp_get_post_terms( get_the_id(), 'specialty', array( 'fields' => 'all' ) );
					$servicesIdArray = array(0);
					if(count($servicesTermList > 0)){
						foreach($servicesTermList as $servicesTerm){
							array_push($servicesIdArray,$servicesTerm->term_id);
						}
					}
					$servicesTermString = implode(",", $servicesIdArray);
					$genderTermList = wp_get_post_terms( get_the_id(), 'gender', array( 'fields' => 'all' ) );
					$genderIdArray = array(0);
					if(count($genderTermList > 0)){
						foreach($genderTermList as $genderTerm){
							array_push($genderIdArray,$genderTerm->term_id);
						}
					}
					$genderTermString = implode(",", $genderIdArray);
					?>
					<div class="tile active" data-services="<?php echo $servicesTermString ?>" data-gender="<?php echo $genderTermString; ?>" data-locations="0,<?php echo $providerinfo['locations'][0]; ?>">
						<div class="contents">
							<?php if (get_the_post_thumbnail_url(get_the_id()) == ""){
								$thumbUrl = '/wp-content/themes/optimaderm/img/defaultprovider.svg';
								$xtraClass = "default";
							} else {
								$thumbUrl = get_the_post_thumbnail_url(get_the_id());
								$xtraClass = "";
							} ?>
							<div class="thumb <?php echo $xtraClass; ?>" style="background-image: url(<?php echo $thumbUrl; ?>)"></div>
							<p class="name"><?php echo get_the_title(); ?></p>
							<?php if ( isset ( $providerinfo['position'] ) && $providerinfo['position'] !== "" ) echo '<p class="title">'.$providerinfo['position'][0].'</p>';?>
							<?php if ( isset ( $providerinfo['logo_img']) && $providerinfo['logo_img'][0] !== ""){ ?>
							<div class="logo">
								<img src="<?php if ( isset ( $providerinfo['logo_img'] ) ) echo $providerinfo['logo_img'][0]; ?>" alt="Optima Dermatology">
							</div>
							<?php } ?>
							<div class="btns">
								<p><a href="/contact-us" class="btn">Request Appointment</a></p>
								<p><a href="<?php echo get_the_permalink(); ?>" class="btn orange">View Profile</a></p>
							</div>
						</div>
					</div>
				<?php
					endwhile;
					wp_reset_query();
				endif;
				?>
				<?php
				if ($providerQueryPA->have_posts() ) :
					while ( $providerQueryPA->have_posts() ) : $providerQueryPA->the_post(); $providerinfo = get_post_meta(get_the_id());
					$servicesTermList = wp_get_post_terms( get_the_id(), 'specialty', array( 'fields' => 'all' ) );
					$servicesIdArray = array(0);
					if(count($servicesTermList > 0)){
						foreach($servicesTermList as $servicesTerm){
							array_push($servicesIdArray,$servicesTerm->term_id);
						}
					}
					$servicesTermString = implode(",", $servicesIdArray);
					$genderTermList = wp_get_post_terms( get_the_id(), 'gender', array( 'fields' => 'all' ) );
					$genderIdArray = array(0);
					if(count($genderTermList > 0)){
						foreach($genderTermList as $genderTerm){
							array_push($genderIdArray,$genderTerm->term_id);
						}
					}
					$genderTermString = implode(",", $genderIdArray);
					?>
					<div class="tile active" data-services="<?php echo $servicesTermString ?>" data-gender="<?php echo $genderTermString; ?>" data-locations="0,<?php echo $providerinfo['locations'][0]; ?>">
						<div class="contents">
							<?php if (get_the_post_thumbnail_url(get_the_id()) == ""){
								$thumbUrl = '/wp-content/themes/optimaderm/img/defaultprovider.svg';
								$xtraClass = "default";
							} else {
								$thumbUrl = get_the_post_thumbnail_url(get_the_id());
								$xtraClass = "";
							} ?>
							<div class="thumb <?php echo $xtraClass; ?>" style="background-image: url(<?php echo $thumbUrl; ?>)"></div>
							<p class="name"><?php echo get_the_title(); ?></p>
							<?php if ( isset ( $providerinfo['position'] ) && $providerinfo['position'] !== "" ) echo '<p class="title">'.$providerinfo['position'][0].'</p>';?>
							<!-- <hr> -->
							<div class="btns">
								<p><a href="/contact-us" class="btn">Request Appointment</a></p>
								<p><a href="<?php echo get_the_permalink(); ?>" class="btn orange">View Profile</a></p>
							</div>
							<?php if ( isset ( $providerinfo['logo_img']) && $providerinfo['logo_img'][0] !== ""){ ?>
							<div class="logo">
								<img src="<?php if ( isset ( $providerinfo['logo_img'] ) ) echo $providerinfo['logo_img'][0]; ?>" alt="Optima Dermatology">
							</div>
							<?php } ?>
						</div>
					</div>
				<?php
					endwhile;
					wp_reset_query();
				endif;
				?>
				<?php
				if ($providerQueryNP->have_posts() ) :
					while ( $providerQueryNP->have_posts() ) : $providerQueryNP->the_post(); $providerinfo = get_post_meta(get_the_id());
					$servicesTermList = wp_get_post_terms( get_the_id(), 'specialty', array( 'fields' => 'all' ) );
					$servicesIdArray = array(0);
					if(count($servicesTermList > 0)){
						foreach($servicesTermList as $servicesTerm){
							array_push($servicesIdArray,$servicesTerm->term_id);
						}
					}
					$servicesTermString = implode(",", $servicesIdArray);
					$genderTermList = wp_get_post_terms( get_the_id(), 'gender', array( 'fields' => 'all' ) );
					$genderIdArray = array(0);
					if(count($genderTermList > 0)){
						foreach($genderTermList as $genderTerm){
							array_push($genderIdArray,$genderTerm->term_id);
						}
					}
					$genderTermString = implode(",", $genderIdArray);
					?>
					<div class="tile active" data-services="<?php echo $servicesTermString ?>" data-gender="<?php echo $genderTermString; ?>" data-locations="0,<?php echo $providerinfo['locations'][0]; ?>">
						<div class="contents">
							<?php if (get_the_post_thumbnail_url(get_the_id()) == ""){
								$thumbUrl = '/wp-content/themes/optimaderm/img/defaultprovider.svg';
								$xtraClass = "default";
							} else {
								$thumbUrl = get_the_post_thumbnail_url(get_the_id());
								$xtraClass = "";
							} ?>
							<div class="thumb <?php echo $xtraClass; ?>" style="background-image: url(<?php echo $thumbUrl; ?>)"></div>
							<p class="name"><?php echo get_the_title(); ?></p>
							<?php if ( isset ( $providerinfo['position'] ) && $providerinfo['position'] !== "" ) echo '<p class="title">'.$providerinfo['position'][0].'</p>';?>
							<!-- <hr> -->
							<div class="btns">
								<p><a href="/contact-us" class="btn">Request Appointment</a></p>
								<p><a href="<?php echo get_the_permalink(); ?>" class="btn orange">View Profile</a></p>
							</div>
							<?php if ( isset ( $providerinfo['logo_img']) && $providerinfo['logo_img'][0] !== ""){ ?>
							<div class="logo">
								<img src="<?php if ( isset ( $providerinfo['logo_img'] ) ) echo $providerinfo['logo_img'][0]; ?>" alt="Optima Dermatology">
							</div>
							<?php } ?>
						</div>
					</div>
				<?php
					endwhile;
					wp_reset_query();
				endif;
				?>
				<?php
				if ($providerQueryRN->have_posts() ) :
					while ( $providerQueryRN->have_posts() ) : $providerQueryRN->the_post(); $providerinfo = get_post_meta(get_the_id());
						$servicesTermList = wp_get_post_terms( get_the_id(), 'specialty', array( 'fields' => 'all' ) );
						$servicesIdArray = array(0);
						if(count($servicesTermList > 0)){
							foreach($servicesTermList as $servicesTerm){
								array_push($servicesIdArray,$servicesTerm->term_id);
							}
						}
						$servicesTermString = implode(",", $servicesIdArray);
						$genderTermList = wp_get_post_terms( get_the_id(), 'gender', array( 'fields' => 'all' ) );
						$genderIdArray = array(0);
						if(count($genderTermList > 0)){
							foreach($genderTermList as $genderTerm){
								array_push($genderIdArray,$genderTerm->term_id);
							}
						}
						$genderTermString = implode(",", $genderIdArray);
						?>
						<div class="tile active" data-services="<?php echo $servicesTermString ?>" data-gender="<?php echo $genderTermString; ?>" data-locations="0,<?php echo $providerinfo['locations'][0]; ?>">
							<div class="contents">
								<?php if (get_the_post_thumbnail_url(get_the_id()) == ""){
									$thumbUrl = '/wp-content/themes/optimaderm/img/defaultprovider.svg';
									$xtraClass = "default";
								} else {
									$thumbUrl = get_the_post_thumbnail_url(get_the_id());
									$xtraClass = "";
								} ?>
								<div class="thumb <?php echo $xtraClass; ?>" style="background-image: url(<?php echo $thumbUrl; ?>)"></div>
								<p class="name"><?php echo get_the_title(); ?></p>
								<?php if ( isset ( $providerinfo['position'] ) && $providerinfo['position'] !== "" ) echo '<p class="title">'.$providerinfo['position'][0].'</p>';?>
								<!-- <hr> -->
								<div class="btns">
									<p><a href="/contact-us" class="btn">Request Appointment</a></p>
									<p><a href="<?php echo get_the_permalink(); ?>" class="btn orange">View Profile</a></p>
								</div>
								<?php if ( isset ( $providerinfo['logo_img']) && $providerinfo['logo_img'][0] !== ""){ ?>
									<div class="logo">
										<img src="<?php if ( isset ( $providerinfo['logo_img'] ) ) echo $providerinfo['logo_img'][0]; ?>" alt="Optima Dermatology">
									</div>
								<?php } ?>
							</div>
						</div>
					<?php
					endwhile;
					wp_reset_query();
				endif;
				?>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
<?php
endwhile;
wp_reset_query();
?>
<?php  get_footer(); ?>
