<?php 
    wp_head();
 ?>
<div id="primary" class="content-area">
    
    <?php get_template_part( 'template-parts/content', 'header' ); ?>

    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
            // Include the page content template.
            the_content();
        endwhile;
        ?>
    </main><!-- .site-main -->
    
	<?php get_template_part( 'template-parts/content', 'footer' ); ?>

</div><!-- .content-area -->
<?php wp_footer(); ?>