<?php get_header(); ?>

<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left single_video_left">
            <div class="vid item">
                <iframe style="border: 2px solid #808000;" width="100%" height="460" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID,  'post_reading_time', true); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h1 class="single_title"><?php the_title(); ?></h1>
                <div class="d-flex" style="align-items: center; justify-content: space-between;"> <i style="margin-right:5px;" class="far fa-clock">
                        <?php the_time('F j, Y g:i a'); ?></i>
                    <div class="social_share"><?php wcr_share_buttons(); ?></div>
                </div>
            </div>
            <?php the_content(); ?>
        </div>
        <div class="home_page_part_one_right single_video_right">
            <?php $video_one = array(
                'post_type' => 'videogallery',
                'posts_per_page' => 10,
                'order' => 'DESC',
            );
            $lastpost_one = new WP_Query($video_one);
            if ($lastpost_one->have_posts()) : ?>
                <div class="recent-items p-2" style="background: #eee">
                    <div class="video-category-title">
                        <h3 class="category-title d-flex">
                            <span></span>
                            <a href="#"><?php echo $redux_demo['latest_only']; ?></a>
                        </h3>
                    </div>
                    <div class="recent-content mt-1" style="height: 408px; overflow-y: scroll">
                        <?php while ($lastpost_one->have_posts()) : $lastpost_one->the_post(); ?>

                            <a class="recent-item d-flex border-bottom border-light pt-2 pb-2" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                <?php } ?>
                                <h2 class="ml-2"><?php the_title(); ?></h2>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>


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
                <div class="photo_leatest_post_left">
                    <?php while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                        <li class="photo_leatest_post_left_li">
                            <div class="img_box">
                                <div class="video_icon2">
                                    <i class="fas fa-play"></i>
                                </div>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                    <?php } ?></a>

                                <a class="home_pic_title" href="<?php the_permalink(); ?>"><span class="media-body"><?php echo wp_trim_words(get_the_title(), 10); ?></span></a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </div>
            <?php endif;
            ?>
        </div>
    <?php $i++;
    } ?>

</div>
<?php get_footer(); ?>