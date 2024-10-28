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