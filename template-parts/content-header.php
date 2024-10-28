<?php
// header.php

// Function to check if the current page matches any in the provided list
function is_current_page_in_list(array $pages): bool {
    foreach ($pages as $page) {
        if (is_page($page['value'])) {
            return true;
        }
    }
    return false;
}

// Function to display the template content
function apply_template() {
    the_content();
    return true; // Indicate that the template has been applied
}

// Function to render the default header
function render_default_header() {
    ?>
    <header id="masthead" class="site-header header">
        <div class="header__logo">
            <?php
            the_custom_logo();
            if (is_front_page() && is_home()) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php endif;

            $headless_theme_description = get_bloginfo('description', 'display');
            if ($headless_theme_description || is_customize_preview()) : ?>
                <p class="site-description"><?php echo $headless_theme_description; ?></p>
            <?php endif; ?>
        </div>

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'headless-theme'); ?></button>
            <?php
            wp_nav_menu([
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ]);
            ?>
        </nav>
    </header>
    <?php
}

// Query to fetch all headless_templates with template_type = 'header'
$header_templates = new \WP_Query([
    'post_type' => 'headless_templates',
    'meta_query' => [[
        'key'     => 'template_type',
        'value'   => 'header',
        'compare' => '='
    ]],
]);

// Flag to check if any template is applied
$template_applied = false;

// The Loop
if ($header_templates->have_posts()) {
    while ($header_templates->have_posts()) {
        $header_templates->the_post();

        $display_option = get_post_meta(get_the_ID(), 'template_display_option', true)['value'] ?? '';
        $selected_pages = get_post_meta(get_the_ID(), 'template_selected_pages', true) ?: [];
        $exclude_pages = get_post_meta(get_the_ID(), 'template_exclude_pages', true) ?: [];

        switch ($display_option) {
            case 'entire_site':
                if (empty($exclude_pages) || !is_current_page_in_list($exclude_pages)) {
                    $template_applied = apply_template();
                }
                break;

            case 'specific_pages':
                if (is_current_page_in_list($selected_pages)) {
                    $template_applied = apply_template();
                }
                break;
        }

        if ($template_applied) {
            break;
        }
    }
    wp_reset_postdata(); // Reset the global post object
}

// Display default header if no template is applied
if (!$template_applied) {
    render_default_header();
}
?>
