<?php
// header.php

// Query to fetch all headless_templates with template_type = 'header'
$args = array(
    'post_type' => 'headless_templates',
    'meta_query' => array(
        array(
            'key' => 'template_type',
            'value' => 'header',
            'compare' => '='
        ),
    ),
);

// The Query
$header_templates = new WP_Query($args);

// Flag to check if any template is applied
$template_applied = false;

// The Loop
if ($header_templates->have_posts()) :
    while ($header_templates->have_posts()) : $header_templates->the_post();
        // Fetch metadata for template display options
        $display_option = get_post_meta(get_the_ID(), 'template_display_option', true);
        $selected_pages = get_post_meta(get_the_ID(), 'template_selected_pages', true);
        $exclude_pages = get_post_meta(get_the_ID(), 'template_exclude_pages', true);

        // Render based on conditions
        if ($display_option === 'entire_site') {
            // Check if current page is in the exclude list
            if (!is_page($exclude_pages)) {
                // Render the template content for the entire site, excluding specific pages
                the_content();
                $template_applied = true;
                break;  // Exit loop since template is applied
            }
        } elseif (is_page($selected_pages)) {
            // Render the template content only for selected pages
            the_content();
            $template_applied = true;
            break;  // Exit loop since template is applied
        }
    endwhile;
    wp_reset_postdata(); // Reset the global post object
endif;

// Display default header if no template is applied
if (!$template_applied) {?>
    <header id="masthead" class="site-header header">
        <div class="header__logo">
            <?php
            the_custom_logo();
            if ( is_front_page() && is_home() ) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;
            $headless_theme_description = get_bloginfo( 'description', 'display' );
            if ( $headless_theme_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $headless_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'headless-theme' ); ?></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
    <?php
}
?>
