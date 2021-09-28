<?php get_header(); ?>
<?php
while ( have_posts() ) : the_post();
	if(get_post_type() == "location"){
		$postId = get_the_id();
	} else {
		$postId = $settings->location;
	}
?>
	<div class="entry-content-page location interior" id="main_content">
		<h1 class="pagetitle"><?php echo get_the_title(); ?></h1>
		<div class="container">
			<div id="top_hero">
			<h2 class="container location_title"><?php echo get_the_title($postId); ?></h2>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
<?php
endwhile;
wp_reset_query();
?>
<?php  get_footer(); ?>
