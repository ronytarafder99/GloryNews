<?php get_header(); ?>
<div class="custom_container">
    <div class="photo_subcat_posts_grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="single-block auto">
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
        <?php endwhile;
        endif ?>
    </div>
    <div class="pagination1">
        <div class="pagi_inner">
            <?php echo paginate_links(array(
                'prev_text' => __('&laquo;', 'textdomain'),
                'next_text' => __('&raquo;', 'textdomain'),

            )); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>