<?php

/**
 * Template Name: All post Template
 */

get_header(); ?>
<?php global $wesoftpress; ?>
<div class="custom_container">
    <div class="text-center padding20 no-margin">
        <h2 class="no-margin">সব খবর</h2>
    </div>
    <?php $args = array(
            'posts_per_page' => 10,
            'paged' => max(1, get_query_var('paged')),
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
                    'operator' => 'NOT IN'
                )
            )
        );
        $lastpost = new WP_Query($args); ?>
    <div class="all_twinty_posts">
        <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
        <div class="all_twinty_posts_inner">
            <div class="all_post_thumb">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if (has_post_thumbnail()) {
                                the_post_thumbnail('custom-size');
                            } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                        alt="<?php the_title(); ?>" />
                    <?php } ?>
                </a>
                <?php foreach ((get_the_category()) as $category) {
                                    $postcat = $category->cat_ID;
                                    $catname = $category->cat_name;
                                }
                                ?>
                <div class="overlay-category">
                    <a href="<?php echo get_category_link($postcat); ?>"><?php echo $catname; ?></a>
                </div>
            </div>
            <span class="item20span">
                <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a></h4>
                <p><?php if ($wesoftpress['time-switch'] == '1') {
                echo bn_number(get_the_date('g:i a, j F Y, l'));
            } else {
                echo get_the_date('g:i a, j F Y, l');
            } ?></p>
            </span>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="pagination1">
        <div class="pagi_inner">
            <?php echo paginate_links(array(
                    'total' => $lastpost->max_num_pages,
                    'prev_text' => __('&laquo;', 'textdomain'),
                    'next_text' => __('&raquo;', 'textdomain'),
                )); ?>
        </div>
    </div>
    <?php else :
                echo '<P>no posts found</P>';
            endif;
    ?>

</div>
<?php get_footer(); ?>