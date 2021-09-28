<?php get_header(); ?>
	<?php
    while ( have_posts() ) : the_post();
       if (get_the_post_thumbnail_url() !== ""){
            $thumbUrl = get_the_post_thumbnail_url();
            $xtraClass = "";
        } 
    ?>
        <div class="entry-content-page" id="main_content">
            <div class="container">
                <div class="blog_content">
                    <h3><?php echo get_the_title(); ?></h3>
                    <p class="dateTitle"><?php echo date("F Y"); ?></p>
                    <br>
                    <?php if(!is_front_page()){ ?>
                    <?php
                        if ( has_post_thumbnail() ) { 
                            the_post_thumbnail( 'hero-img' ); 
                        }
                    ?>
                    <?php } ?>
                    <?php the_content(); ?>
                </div>    
            </div>
        </div>
    <?php
    endwhile;
    wp_reset_query();
    ?>
<?php  get_footer(); ?>