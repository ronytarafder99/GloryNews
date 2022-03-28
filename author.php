<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <div class="home_page_part_one_bg">
        <div class="custom_container">
            <div class="breadcrumb author_breadcrumb">

                <div style="margin: 0px 10px;" class="media-left hidden-print" id="author_thumb">
                    <?php
                    $user = wp_get_current_user();

                    if ($user) :
                    ?>
                        <img alt="প্রতিবেদক" src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" class="media-object" style="margin-top:5px;width:40px;height:40px;border-radius:100%;display:inline-block;">
                    <?php endif; ?>
                </div>
                <h2 style="margin-bottom: 0;"> <?php $author = get_user_by('slug', get_query_var('author_name'));
                                                echo get_the_author();
                                                ?></h2>

            </div>
            <div class="tag_page_post white_bg sunset-posts-container">
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="tag_posts border_around">
                        <a class="tag_post_thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('custom-size');
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                            <?php } ?></a>
                        <div class="direction_coloumn">
                            <h3 class="tag_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <small><?php the_time('F j, Y g:i a'); ?></small>
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
    </div>
<?php else :
    echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>