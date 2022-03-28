<div class="mySlides">
    <div class="flexslider">
        <ul class="slides">
            <?php $args1 = array(
                'post_type' => 'photogallery',
                'posts_per_page' => 6,
                'orderby' => 'rand',
            );
            $lastpost = new WP_Query($args1);
            if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                    <li> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('custom-size');
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                            <?php } ?></a>
                        <a href="<?php the_permalink(); ?>">
                            <div class="flex-caption"><?php the_title(); ?></div>
                        </a>
                    </li>
            <?php endwhile;
            endif ?>
        </ul>
    </div>
</div>
<div class="photo_leatest_post_left">
    <?php $args1 = array(
        'post_type' => 'photogallery',
        'posts_per_page' => 4,
        'order' => 'DESC',
        'offset' => 8,
    );
    $lastpost = new WP_Query($args1);
    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
            <li class="photo_leatest_post_left_li border_around">
                <div class="img_box"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('custom-size');
                        } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                        <?php } ?></a>
                    <?php
                    $terms = get_the_terms($post->ID, 'photogallery-categories');
                    foreach ($terms as $term) {
                        $texname = $term->name;
                        $texnid = $term->term_id;
                    }
                    ?>
                    <a href="<?php echo get_term_link($texnid); ?>" class="badge"><?php echo $texname; ?></a>
                    <a class="home_pic_title" href="<?php the_permalink(); ?>"><span class="media-body"><?php echo wp_trim_words(get_the_title(), 10); ?></span></a>
                </div>
            </li>
    <?php endwhile;
    endif ?>
</div>