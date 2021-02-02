<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">

    <title>
        <?php
        if (is_front_page()) {
            echo bloginfo('name');
        } elseif (is_post_type_archive()) {
            echo post_type_archive_title();
        } elseif (!is_front_page() || !is_page()) {
            echo single_post_title();
        } elseif (!is_front_page() || !is_single()) {
            echo the_title();
        } elseif (is_front_page() && is_category()) {
            echo single_cat_title();
        }
        if (is_archive()) {
            echo single_cat_title();
        }
        ?>
    </title>

    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- OpenGraph -->
    <meta property="og:locale" content="ru_RU"/>
    <meta property="og:locale:alternate" content="ru_RU"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="
    <?php
    if (is_front_page()) {
        echo bloginfo('name');
    } elseif (is_post_type_archive()) {
        echo post_type_archive_title();
    } elseif (!is_front_page() || !is_page()) {
        echo single_post_title();
    } elseif (!is_front_page() || !is_single()) {
        echo the_title();
    } elseif (is_front_page() && is_category()) {
        echo single_cat_title();
    }
    if (is_archive()) {
        echo single_cat_title();
    }
    ?>
    "/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:url" content="<?php echo esc_url(site_url()); ?>"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:image" content="<?php echo esc_url(the_post_thumbnail_url()); ?>"/>
    <meta property="og:image:secure_url" content="<?php echo esc_url(the_post_thumbnail_url()); ?>"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="628"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="
        <?php
    if (is_front_page()) {
        echo bloginfo('name');
    } elseif (is_post_type_archive()) {
        echo post_type_archive_title();
    } elseif (!is_front_page() || !is_page()) {
        echo single_post_title();
    } elseif (!is_front_page() || !is_single()) {
        echo the_title();
    } elseif (is_front_page() && is_category()) {
        echo single_cat_title();
    }
    if (is_archive()) {
        echo single_cat_title();
    }
    ?>
    "/>
    <meta name="twitter:image" content="<?php echo esc_url(the_post_thumbnail_url()); ?>"/>
    <!-- OpenGraph end-->
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.ico'); ?>"
          type="image/x-icon">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.ico'); ?>"
          type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">

<?php wp_body_open(); ?>
<div class="wrapper js-container"><!--Do not delete!-->

    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="header__column">
                    <?php if (has_nav_menu('main-nav')) { ?>
                        <nav class="nav left-nav">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'main-nav',
                                'container' => false,
                                'menu_class' => 'menu-container',
                                'menu_id' => '',
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 3
                            )); ?>
                        </nav>
                    <?php } ?>
                </div>
                <div class="header__middle-column">
                    <div class="logo">
                        <?php get_default_logo_link([
                            'name' => 'logo.svg',
                            'options' => [
                                'class' => 'logo-img',
                                'width' => 140,
                                'height' => 170,
                            ],
                        ])
                        ?>
                    </div>
                </div>
                <div class="header__column">
                    <?php if (has_nav_menu('second-menu')) { ?>
                        <nav class="nav right-nav">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'second-menu',
                                'container' => false,
                                'menu_class' => 'menu-container',
                                'menu_id' => '',
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 3
                            )); ?>
                        </nav>
                    <?php } ?>
                    <?php echo do_shortcode('[bw-social]'); ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile menu start-->
    <div class="nav-mobile-header">
        <div class="logo">
            <?php get_default_logo_link([
                'name' => 'small_logo.svg',
                'options' => [
                    'class' => 'logo-img',
                    'width' => 90,
                    'height' => 30,
                ],
            ])
            ?>
        </div>
        <button class="hamburger js-hamburger" type="button" tabindex="0">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
    <?php if (has_nav_menu('main-nav')) { ?>
        <nav class="nav js-menu hide-on-desktop">
            <button type="button" tabindex="0" class="menu-item-close menu-close js-menu-close"></button>
            <div class="mobile-wrapper">
                <div class="top-container">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main-nav',
                        'container' => false,
                        'menu_class' => 'menu-container',
                        'menu_id' => '',
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 3
                    )); ?>
                    <?php if (has_nav_menu('second-menu')) { ?>
                        <div class="mobile-nav">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'second-menu',
                                'container' => false,
                                'menu_class' => 'mobile-nav__wrapper',
                                'menu_id' => '',
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 3
                            )); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="bottom-container">
                    <div class="social-mob"><?php echo do_shortcode('[bw-social]'); ?></div>
                    <div class="mobile-phones">
                        <?php echo do_shortcode('[bw-phone]'); ?>
                    </div>
                </div>
            </div>
        </nav>
    <?php } ?>
    <!-- Mobile menu end-->
