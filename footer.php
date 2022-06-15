<?php global $wesoftpress; ?>
<footer>
    <h4 class="div-title">অন্যান্য</h4>
    <div class="footer_mobile_menu">
        <?php
        $footer_menu = 'footer_menu';
        if (has_nav_menu($footer_menu)) {
            wp_nav_menu(array(
                'theme_location' => 'footer_menu',
                'container' => 'div',
                'container_class' => 'left_side',
                'menu_class' => 'footer_nav_ul',
                'depth' => '1',
            ));
        } ?>
    </div>
    <div class="footer_part_one_bg">
        <div class="custom_container">
            <div class="footer_flex_item">
                <div class="footer_logo">
                    <div class="footer_logo_text">
                        <h4><?php echo $wesoftpress['get_our_app']; ?></h4>
                    </div>
                    <a id="footer_logo_img" href="<?php bloginfo('url'); ?>"> <img width="<?php echo $wesoftpress['footer_logo_width']; ?>" height="<?php echo $wesoftpress['footer_logo_height']; ?>" src="<?php echo $wesoftpress['footer_logo']['url']; ?>" alt="<?php echo $wesoftpress['footer_logo_alt']; ?>"></a>
                </div>
                <div class="footer_apps_links">
                    <a target="_blank" href="<?php echo $wesoftpress['android']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/google-play.png" alt="Goole play store link"></a>
                    <a target="_blank" href="<?php echo $wesoftpress['apple']; ?>"> <img src="<?php echo get_template_directory_uri(); ?>/img/ios_app_icon.png" alt="Apple App Store"> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_part_two_bg">
        <div class="custom_container">
            <div class="our_text"><?php echo $wesoftpress['info']; ?></div>
        </div>
    </div>
    <div class="footer_part_three_bg">
        <div class="custom_container">
            <div class="footer_flex_item">
                <div class="publiser">
                    <?php echo $wesoftpress['publiser']; ?>
                </div>
                <div class="footer_menu">
                    <?php
                    $footer_menu = 'footer_menu';
                    if (has_nav_menu($footer_menu)) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer_menu',
                            'container' => 'div',
                            'container_class' => 'left_side',
                            'menu_class' => 'footer_nav_ul',
                            'depth' => '1',
                        ));
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ($wesoftpress['opt-switch'] == 1) { ?>
        <div class="marquee_container_bg">
            <div class="marquee_container">
                <div class="marquee_name"><?php echo $wesoftpress['marguee_name']; ?></div>
                <marquee class="marquee_title_sizeing" behavior="scroll" direction="left" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
                    <?php $foodpost = new WP_Query(array('posts_per_page' => 7, 'order' => 'DESC',)); ?>
                    <?php if ($foodpost->have_posts()) : while ($foodpost->have_posts()) : $foodpost->the_post(); ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php endwhile;
                    else : ?>
                    <?php endif; ?>
                </marquee>
            </div>
        </div>
    <?php } ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>