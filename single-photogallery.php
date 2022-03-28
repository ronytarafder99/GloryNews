<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <div class="home_page_part_one_bg">
        <div class="custom_container">
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="breadcrumb">
                    <?php echo '<a href="' . home_url() . '" rel="nofollow"><i style="color: #a94442;" class="fa fa-home"></i></a>';
                    echo "<b>&nbsp;&nbsp;/&nbsp;&nbsp;</b>"; ?>
                    <a href="<?php echo get_post_type_archive_link('photogallery'); ?>"><?php echo $redux_demo['photo_name']; ?></a>
                </div>
                <div class="home_page_part_one">
                    <div class="home_page_part_one_left">
                        <div class="single_meta_box white_bg">
                            <h1 class="single_title"><?php the_title(); ?></h1>
                            <div class="dividerDetails"></div>
                            <div class="d-flex" style="align-items: center; justify-content: space-between;">
                                <div class="author_box">
                                    <i style="font-size: 14px;" class="far fa-clock text-danger"></i>
                                    <?php the_time('F j, Y g:i a'); ?>
                                </div>
                                <div class="social_share"><?php wcr_share_buttons(); ?></div>
                            </div>
                        </div>
                        <div class="single_post_thumbnail">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </div>
                        <div class="single_post_content">
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                    <div class="home_page_part_one_right">
                        <div class="leatest_in_a_cat">
                            <h2 class="catTitle"> <?php echo $redux_demo['more']; ?> &nbsp; <span class="liner"></span></h2>
                        </div>

                        <div class="media-list">
                            <?php $video_more = array(
                                'post_type' => 'photogallery',
                                'posts_per_page' => 20,
                                'order' => 'DESC',
                            );
                            $lastpost_one = new WP_Query($video_more);
                            if ($lastpost_one->have_posts()) : while ($lastpost_one->have_posts()) : $lastpost_one->the_post(); ?>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail('custom-size');
                                                } else { ?>
                                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                                <?php } ?></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="<?php the_permalink(); ?>" class="media-heading"><?php echo wp_trim_words(get_the_title(), 7); ?></a>
                                        </div>
                                    </div>
                            <?php endwhile;
                            endif ?>
                        </div>
                    </div>
                </div>
        </div>
        <div class="custom_container">
            <div class="photo_subcat">
                <?php $lastpost = new WP_Query(array(
                    'post_type' => 'photogallery',
                    'posts_per_page' => 8,
                    'order' => 'DESC',
                ));
                if ($lastpost->have_posts()) :
                ?>

                    <h2 class="catTitle"> <?php echo $redux_demo['more']; ?> &nbsp; <span class="liner"></span></h2>
                    <div class="photo_subcat_posts_grid">
                        <?php while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                            <div class="single-block auto border_around">
                                <div class="img-box">
                                    <div class="photo_icon2">
                                        <i class="fa fa-camera"></i>
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
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php endif;
                ?>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
    </div>

<?php else :
    echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>