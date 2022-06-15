<?php get_header(); ?>
<main id="main-content">
    <section class="box-white photo">
        <div class="custom_container">
            <div class="marginTopBottom20">
                <div class="row">
                    <div class="col-md-8 main-content">
                        <?php get_template_part('template-parts/content-myslide-pic'); ?>
                    </div>
                    <aside class="col-md-4 aside">
                        <div class="border_around">
                            <div class="button_group">
                                <button class="leatest_btn"><?php echo $wesoftpress['latest_only']; ?></button>
                                <Button class="popular_btn"><?php echo $wesoftpress['most_read']; ?></Button>
                            </div>
                            <div>
                                <ul class="first_item">
                                    <?php $args = array(
                                        'posts_per_page' => 6,
                                        'order' => 'DESC',
                                        'post_type' => 'photogallery'
                                    );

                                    $lastpost = new WP_Query($args);
                                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                    <li class="media photo_tab">
                                        <div class="media-left">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail();
                                                } else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                                    alt="<?php the_title(); ?>" />
                                                <?php } ?>
                                            </a></div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 13); ?></a></h4>
                                        </div>
                                    </li>
                                    <?php endwhile;
                                else :
                                    echo '<P>no posts found</P>';
                                endif;
                                wp_reset_postdata(); ?>
                                </ul>
                                <ul class="second_item">
                                    <?php $popular = new WP_Query(array('posts_per_page' => 6, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC',  'post_type' => 'photogallery',));
                                while ($popular->have_posts()) : $popular->the_post(); ?>
                                    <li class="media photo_tab">
                                        <div class="media-left">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail();
                                                } else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                                    alt="<?php the_title(); ?>" />
                                                <?php } ?>
                                            </a></div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 13); ?></a></h4>
                                        </div>
                                    </li>
                                    <?php endwhile;
                                wp_reset_postdata(); ?>
                                </ul>
                            </div>
                        </div>

                    </aside>
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

            <div class="marginBottom20">
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

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="catTitle"><a href="<?php echo get_category_link($subcategories[$i]->term_id); ?>"><i
                                    class="fa fa-camera"
                                    style="margin-right:10px;"></i><?php echo $subcategories[$i]->name; ?></a><span
                                class="liner"></span></h2>
                    </div>
                </div>
                <div class="row">
                    <?php while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                    <div class="col-md-3">
                        <div class="single-block auto">
                            <div class="img-box">
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                        alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                </a>
                            </div>
                            <h4><a href="<?php the_permalink() ?>"
                                    title="<?php the_title(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a></h4>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php $i++;
            } ?>

        </div>
    </section>
</main>
<?php get_footer(); ?>