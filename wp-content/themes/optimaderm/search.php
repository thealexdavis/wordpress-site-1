<?php get_header(); 
$alert = ""; if ( is_active_sidebar( 'sitewide_alert' ) ){ if (!isset($_COOKIE['alert'])){ $alert = "alert"; } }
?>
<?php
	global $wp_query;
	$total_results = $wp_query->found_posts;
	$search_query = get_search_query();
?>
<div class="entry-content-page <?php echo $alert; ?>" id="main_content">
	<div class="container">
		<div id="top_hero"<?php if(get_the_post_thumbnail_url()){ echo 'class="withimg"'; } ?>>
			<div class="container">
				<h1>Search Results</h1>
			</div>
		</div>
	</div>
	<div class="search_results">
		<div id="search_frame">
			<?php echo get_search_form(); ?>
		</div>
		<p class="results"><?php echo $total_results; ?> Results</p>
		<div class="content">
			<div class="results_list row">
				<?php if ($total_results == 0){ ?>
				<h4>Sorry, we weren't able to find any results for "<?php echo $search_query; ?>". Check to be sure your search is free of typos, or try searching for a similar term so we can help find what you're looking for.</h4>
			<?php } else { $resultcount = 1; ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="result">
					<?php 
						$target = "";
						if (get_post_type(get_the_ID()) == "resource"){  
							$resourceinfo = get_post_meta(get_the_ID());
							if ($resourceinfo['resource_file'][0] && $resourceinfo['resource_file'][0] !== ""){
								$thelink = $resourceinfo['resource_file'][0];
								$target = 'target="_blank"';
							} else {
								$thelink = get_permalink(get_the_ID());
							}
						} else {
							$thelink = get_permalink(get_the_ID());
						}
					?>
					<h4><a href="<?php echo $thelink; ?>" class="title" <?php echo $target; ?>><?php the_title(); ?></a></h4>
					<?php 
						if(has_excerpt()){
							the_excerpt(); 
						}
					?>
				</div>
				<?php $resultcount++; endwhile; ?>
			<?php } ?>
			</div>
			<div class="sidebar row">
				<?php 
					if ( is_active_sidebar( 'search_sidebar' ) ) : 
						dynamic_sidebar( 'search_sidebar' );
					endif;
				?>
			</div>
		</div>
	</div>
</div>
<?php  get_footer(); ?>