<?php get_header(); ?>
<?php if (have_posts()) : ?>
<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <div class="breadcrumb">
                <a href="<?php bloginfo('url'); ?>"><i class="fa fa-home text-danger"></i></a>
                <?php echo "<b>&nbsp;&nbsp;/&nbsp;&nbsp;</b>"; ?>
                <?php $rlcat = get_queried_object();
                    $rlid = $rlcat->term_id;
                    $parents = get_ancestors($rlid, 'location');
                    foreach (array_reverse($parents) as $term_id) { ?>
                <a href="<?php echo get_term_link($term_id) ?>"><?php echo get_term_by('id', $term_id, 'location')->name; ?></a>
                <?php echo "<b>&nbsp;&nbsp;/&nbsp;&nbsp;</b>"; ?>
                <?php } ?>
                <li class="active"><?php single_cat_title(); ?></li>
            </div>
            <div class="archive_page_post sunset-posts-container">
                <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="archive_posts border_around">
                    <a class="archive_post_thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
                        <?php } ?></a>
                    <div class="direction_coloumn">
                        <h3 class="archive_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p><?php custom_length_excerpt(30); ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
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
        <div class="home_page_part_one_right">

            <?php require get_template_directory() . '/inc/leatest_popular.php'; ?>

        </div>
    </div>
</div>
<?php else :
    echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>