<?php get_header(); ?>

<main role="main">
    <div class="custom_container">
        <div class="positional-contents my-3">
            <div class="row">
                <?php
                $tax_to_check = 'videogallery-categories';
                $all_terms = get_terms(['taxonomy'=>$tax_to_check, 'fields'=>'ids']);
                $args1 = array(
                'post_type' => 'videogallery',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'videogallery-categories',
                        'field' => 'term_id',
                        'terms' => $all_terms,
                        'operator' => 'NOT IN',
                    )
                ), 'posts_per_page' => 8,
            );
                $lastpost = new WP_Query($args1);
                if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                <div class="col-sm-3 d-flex align-items-stretch">
                    <a class="card" href="<?php the_permalink(); ?>">
                        <div class="card-image">
                            <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail();
                                                } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                alt="<?php the_title(); ?>" />
                            <?php } ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" height="48" viewBox="0 0 24 24"
                                width="48">
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
                <?php endwhile;
                endif ?>

            </div>
        </div>
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
                    <a href="<?php echo get_category_link($subcategories[$i]->term_id); ?>"><?php echo $subcategories[$i]->name; ?></a>
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" height="48" viewBox="0 0 24 24"
                                width="48">
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
</main>

<?php get_footer(); ?>