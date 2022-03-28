<?php get_header(); ?>
<div class="custom_container">
    <?php
    $subcategories = get_terms(array(
        'taxonomy' => 'videogallery-categories',
        'hide_empty' => false,
    ));
    $arrayLength = count($subcategories);
    $i = 0;
    while ($i < $arrayLength) { ?>

        <div class="photo_subcat">
            <?php $lastpost = new WP_Query(array(
                'post_type' => 'videogallery',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'videogallery-categories',
                        'field' => 'term_id',
                        'terms' => $subcategories[$i]->term_id,
                    )
                ), 'posts_per_page' => 8,
            ));
            if ($lastpost->have_posts()) :
            ?>

                <h2 class="catTitle" style="margin:10px 0">
                    <span class="video_cat_title_before"></span> <?php echo sprintf('<a href="%s">%s</a>', get_category_link($subcategories[$i]->term_id), apply_filters('get_term', $subcategories[$i]->name)); ?><span class="liner"></span>
                </h2>
                <div class="photo_subcat_posts_grid">
                    <?php while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                        <div class="single-block auto">
                            <div class="img-box">
                            <div class="video_icon2">
                                <i class="fas fa-play"></i>
                            </div>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                    <?php } ?></a>
                            </div>
                            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
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