<?php get_header(); ?>
<div class="custom_container">
    <div class="home_page_part_one_bg">
        <div class="custom_container home_page_part_one">
            <div class="home_page_part_one_left">
                <?php get_template_part('template-parts/content-myslide-pic'); ?>
            </div>
            <div class="home_page_part_one_right">
                <div class="button_group border_around">
                    <button class="leatest_btn"><?php echo $redux_demo['latest_only']; ?></button>
                    <Button class="popular_btn"><?php echo $redux_demo['most_read']; ?></Button>
                </div>
                <div class="fixed_height archive_non_fix_height border_around">
                    <ul class="first_item">
                        <?php $args = array(
                            'posts_per_page' => 10,
                            'order' => 'DESC',
                            'post_type' => 'photogallery'
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <ul>
                                    <a href="<?php the_permalink(); ?>">
                                        <thumb> <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail('custom-size');
                                                } else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                            <?php } ?>
                                    </a>
                                    <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8); ?></a></li>
                                </ul>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </ul>
                    <ul class="second_item">
                        <?php $popular = new WP_Query(array('posts_per_page' => 10, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
                        while ($popular->have_posts()) : $popular->the_post(); ?>
                            <ul>
                                <a href="<?php the_permalink(); ?>">
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
            </div>
        </div>
    </div>
    <?php
    $subcategories = get_terms(array(
        'taxonomy' => 'photogallery-categories',
        'hide_empty' => false,
    ));
    $arrayLength = count($subcategories);
    $i = 0;
    while ($i < $arrayLength) { ?>

        <div class="photo_subcat">
            <?php $lastpost = new WP_Query(array(
                'post_type' => 'photogallery',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'photogallery-categories',
                        'field' => 'term_id',
                        'terms' => $subcategories[$i]->term_id,
                    )
                ), 'posts_per_page' => 8,
            ));
            if ($lastpost->have_posts()) :
            ?>

                <h2 class="catTitle" style="margin:10px 0">
                    <i class="fa fa-camera"></i> <?php echo sprintf('<a href="%s">%s</a>', get_category_link($subcategories[$i]->term_id), apply_filters('get_term', $subcategories[$i]->name)); ?><span class="liner"></span>
                </h2>
                <div class="photo_subcat_posts_grid">
                    <?php while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                        <div class="single-block auto border_around">
                            <div class="img-box">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                    <?php } ?></a>
                            </div>
                            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a></h4>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif;
            ?>
        </div>
    <?php $i++;
    } ?>

</div>
<?php get_footer(); ?>