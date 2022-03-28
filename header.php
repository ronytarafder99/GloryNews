<?php global $redux_demo; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-2x fa-angle-up"></i></button>
        <div class="header_top_ad custom_container home_page_ad">
            <?php echo $redux_demo['home_page_top_ad1']; ?>
        </div>
        <div class="top_header_bg">
            <div class="custom_container top_header_container">
                <div class="time_part">
                    <small class="time_date"><span><?php the_time('l , j F Y ') ?></span><span><?php echo do_shortcode('[bangla_date]'); ?></span></small>
                </div>
                <div class="logo_part">
                    <a href="<?php bloginfo('home'); ?>"><img width="<?php echo $redux_demo['width']; ?>" height="<?php echo $redux_demo['height']; ?>" src="<?php echo $redux_demo['logo']['url']; ?>" alt="<?php echo $redux_demo['alt']; ?>"></a>
                </div>
                <div class="social_part">
                    <ul class="social">
                        <li><a target="_blank" href="<?php echo $redux_demo['facebook']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['Youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['twitter']; ?>"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['instagram']; ?>"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom_header_bg bottom_parent">
            <div class="custom_container for_header_search_form d-flex">
                <div class="bottom_header_container">
                    <div class="home_icon">
                        <i id="bars" class="fas fa-bars"></i>
                        <a id="home" href="<?php bloginfo('home'); ?>"><i class="fa fa-home"></i></a>
                    </div>
                    <div class="logo_part mobile_logo">
                        <a href="<?php bloginfo('home'); ?>"><img width="<?php echo $redux_demo['width']; ?>" height="<?php echo $redux_demo['height']; ?>" src="<?php echo $redux_demo['logo']['url']; ?>" alt="<?php echo $redux_demo['alt']; ?>"></a>
                    </div>
                    <?php $header_menu = 'header_menu';
                    if (has_nav_menu($header_menu)) {
                        wp_nav_menu(array(
                            'theme_location' => 'header_menu',
                            'container' => 'div',
                            'container_class' => 'nav_menu_ground',
                            'menu_class' => 'ul_menu',
                            'depth' => '3',
                        ));
                    } ?>
                    <ul class="ul_menu always_show">
                        <li><a href="<?php echo $redux_demo['english']; ?>" target="_blank"><span class="en-edition"> <?php echo $redux_demo['english_title']; ?> </span></a></li>
                    </ul>
                </div>
                <div class="search_container">
                    <div class="search_icon"><i class="fa fa-search"></i></div>
                    <div class="cross_icon"><i style="color: #ffffff;" class="fas fa-times"></i></div>
                    <div class="search_inner"><?php get_search_form(); ?></div>
                </div>
            </div>
            <div class="header_mobile_menu">
                <?php $header_mobile_menu = 'header_mobile_menu';
                if (has_nav_menu($header_mobile_menu)) {
                    wp_nav_menu(array(
                        'theme_location' => 'header_mobile_menu',
                        'container' => 'div',
                        'container_class' => 'header_mobile_menu_ground',
                        'menu_class' => 'header_mobile_menu_ul',
                        'depth' => '3',
                    ));
                } ?>
            </div>
        </div>
        <div class="scrollmenu">
            <ol>
                <?php wp_list_categories(array(
                    'parent' => 0,
                    'hide_empty' => 0,
                    'number' => 15,
                    'title_li' => __(''),
                    'exclude'    => '1',
                )); ?>
            </ol>
        </div>
    </header>