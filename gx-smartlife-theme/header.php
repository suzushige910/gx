<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-inner">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <div class="site-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="menu-icon">
                    <i class="fas fa-bars"></i>
                </span>
                <span class="menu-text"><?php esc_html_e('Menu', 'gx-smartlife'); ?></span>
            </button>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'gx_smartlife_fallback_menu',
                ));
                ?>
            </nav>

            <div class="header-search hide-mobile">
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
