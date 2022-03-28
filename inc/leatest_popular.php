<div class="button_group">
    <button class="leatest_btn"><?php echo $redux_demo['latest_only']; ?></button>
    <Button class="popular_btn"><?php echo $redux_demo['most_read']; ?></Button>
</div>
<div class="fixed_height border_around">
    <ul class="first_item">
        <?php $args = array(
            'posts_per_page' => 10,
            'order' => 'DESC',
            'offset' => 1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
                    'operator' => 'NOT IN'
                )
            )
        );

        $lastpost = new WP_Query($args);
        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                $count++; ?>
                <ul>
                    <a href="<?php the_permalink(); ?>">
                        <span class="numbers"><?php echo $count; ?></span>
                        <thumb> <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                            <?php } ?>
                    </a>
                    <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                </ul>
        <?php endwhile;
        else :
            echo '<P>no posts found</P>';
        endif;
        ?>
    </ul>
    <ul class="second_item">
        <?php $popular = new WP_Query(array('posts_per_page' => 10, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
        $count = 0;
        while ($popular->have_posts()) : $popular->the_post();
            $count++; ?>
            <ul>
                <a href="<?php the_permalink(); ?>">
                    <span class="numbers"><?php echo $count; ?></span>
                    <thumb> <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('custom-size');
                            } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                        <?php } ?>
                </a>
                <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            </ul>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </ul>
</div>
<div class="allnews"><a href="<?php bloginfo('home'); ?>/all-posts/"><?php echo $redux_demo['latest_all_only']; ?></a>
</div>