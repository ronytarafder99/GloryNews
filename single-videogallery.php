<?php get_header(); ?>

<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left single_video_left">
            <div class="vid item" id="single_video_iframe_container">
                <iframe
                    src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID,  'post_reading_time', true); ?>"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <h1 style="font-size:24px;" class="mt-2 single_title"><?php the_title(); ?></h1>
            <div class="d-flex" style="align-items: center; justify-content: space-between; padding: 0.5rem 0;">
                <div class="video_update_time">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"></path>
                        <path fill-rule="evenodd"
                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                        </path>
                    </svg><?php the_time('F j, Y g:i a'); ?></div>
                <div class="social_share"><?php wcr_share_buttons(); ?></div>
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
                        <a href="#"><?php echo $wesoftpress['latest_only']; ?></a>
                    </h3>
                </div>
                <div class="recent-content mt-1" style="height: 408px; overflow-y: scroll">
                    <?php while ($lastpost_one->have_posts()) : $lastpost_one->the_post(); ?>

                    <a class="recent-item d-flex border-bottom border-light pt-2 pb-2" href="<?php the_permalink(); ?>"
                        title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
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
    <div class="py-2" style="border-bottom: 2px solid #8c8c8c"></div>
        <?php
        $subcategories = get_terms(array(
            'taxonomy' => 'videogallery-categories',
            'hide_empty' => false,
        ));
        $arrayLength = count($subcategories);
        $i = 0;
        while ($i < $arrayLength) { ?>

    <div class="positional-contents my-3">
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

        <div class="video-category-title">
            <h3 class="category-title d-flex">
                <span></span>
                <a
                    href="<?php echo get_category_link($subcategories[$i]->term_id); ?>"><?php echo $subcategories[$i]->name; ?></a>
            </h3>
        </div>
        <div class="row">
            <?php while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
            <div class="col-sm-3 d-flex align-items-stretch">
                <a class="card" href="<?php the_permalink(); ?>">
                    <div class="card-image">
                        <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail();
                                                } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
                        <?php } ?>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" height="48" viewBox="0 0 24 24" width="48">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                            </path>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php the_title(); ?></h4>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php $i++;
    } ?>

</div>
<?php get_footer(); ?>