<?php get_header();
global $redux_demo;
?>
<div class="custom_container">
    <?php
    $category = get_queried_object();
    ?>
    <div class="breadcrumb" style="margin-top: 20px;">
        <?php echo '<a href="' . home_url() . '" rel="nofollow"><i style="color: #a94442;" class="fa fa-home"></i></a>';
        echo "<b>&nbsp;&nbsp;/&nbsp;&nbsp;</b>";
        echo sprintf('<a href="%s">%s</a>', get_category_link($category->term_id), apply_filters('get_term', $category->name));
        ?>
    </div>
    <div class="photo_subcat_posts_grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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