<div class="button_group">
    <button class="leatest_btn"><?php echo $wesoftpress['latest_only']; ?></button>
    <Button class="popular_btn"><?php echo $wesoftpress['most_read']; ?></Button>
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
        $count = 0;
        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                $count++; ?>
        <li>
            <span><span class="numbers"><?php echo bn_number($count); ?></span></span>
            <span class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
        </li>
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
        <li>
            <span><span class="numbers"><?php echo bn_number($count); ?></span></span>
            <span class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
        </li>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </ul>
</div>
<div class="allnews"><a href="<?=get_all_post_page_link();?>"><?php echo $wesoftpress['latest_all_only']; ?></a>
</div>