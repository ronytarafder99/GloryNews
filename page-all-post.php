<?php

/**
 * Template Name: All post Template
 */
function mypage_head()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/inc/mypage.css">' . "\n";
}
add_action('wp_head', 'mypage_head');
?>

<?php get_header(); ?>
<div class="all_posts_container">
    <div class="all_posts_container_left">
        <div class="bread">
            <a href="<?php bloginfo('home'); ?>"><?php echo $redux_demo['home_heading']; ?></a>
            <?php echo "<b>&nbsp;&nbsp;&#187;&nbsp;&nbsp;</b>"; ?>
            <a href="#"><?php echo $redux_demo['latest_all_only']; ?></a>
        </div>
        <?php
        $args = array(
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
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('custom-size');
                        } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                        <?php } ?>
                        <span class="item20span">
                            <h4><?php echo wp_trim_words(get_the_title(), 6); ?></h4>
                            <p><i style="color:#777; font-size:13px; margin-right:5px;" class="fas fa-clock"></i><?php the_time('j F  Y'); ?></p>
                        </span>
                    </a>
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
    <div class="all_posts_container_right">
        <div class="custom_container home_page_ad">
            <?php echo $redux_demo['home_page_right_ad3']; ?>
        </div>
        <div class="custom_container home_page_ad">
            <?php echo $redux_demo['home_page_right_ad4']; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>