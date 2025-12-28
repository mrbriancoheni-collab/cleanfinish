<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Professional move-out and office cleaning services for property managers, building managers, and property owners. Fast, thorough, and reliable.">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php if (get_bloginfo('description')) : ?>
                    <p class="site-description"><?php bloginfo('description'); ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav-menu',
                'fallback_cb' => 'cleanfinish_default_menu',
            ));
            ?>
        </nav>
    </div>
</header>
