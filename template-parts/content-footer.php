<?php
// header.php

// Query to fetch all headless_templates with template_type = 'header'
$args = array(
    'post_type' => 'headless_templates',
    'meta_query' => array(
        array(
            'key' => 'template_type',
            'value' => 'footer',
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
    <footer id="colophon" class="site-footer">
        <div class="site-info">
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'headless-theme' ) ); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( 'Proudly powered by %s', 'headless-theme' ), 'WordPress' );
                ?>
            </a>
            <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf( esc_html__( 'Theme: %1$s by %2$s.', 'headless-theme' ), 'headless-theme', '<a href="https://webdeveloperarif.com/">Arif Hossin</a>' );
                ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
    <?php
}
?>


