<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <div class="home_page_part_one_bg">
        <div class="custom_container home_page_part_one">
            <div class="home_page_part_one_left">
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="single_post_content">
                        <div class="single_meta_box white_bg">
                            <div class="breadcrumb">
                                <?php get_breadcrumb(); ?>
                            </div>
                            <h1 class="single_title"><?php the_title(); ?></h1>
                            <div class="dividerDetails"></div>
                            <div class="author_social">
                                <div class="author_box">
                                    <div class="media">
                                        <div style="margin: 0px 10px;" class="media-left hidden-print" id="author_thumb">
                                            <?php
                                            $user = wp_get_current_user();

                                            if ($user) :
                                            ?>
                                                <img alt="প্রতিবেদক" src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" class="media-object" style="margin-top:5px;width:40px;height:40px;border-radius:100%;display:inline-block;">
                                            <?php endif; ?>
                                        </div>
                                        <div class="media-body">
                                            <span class="small text-muted time-with-author">
                                                <i style="font-size: 14px;" class="fas fa-pencil-alt"></i>
                                                <a class="hidden-print" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" style="display:inline-block; color: #000000;"><?php echo get_the_author(); ?></a>
                                                <br>
                                                <i style="font-size: 14px;" class="far fa-clock text-danger"></i>
                                                <?php the_time('F j, Y g:i a'); ?>
                                            </span>

                                        </div>
                                    </div>
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
                <?php endwhile; ?>

                <div class="leatest_news">
                    <h2 class="catTitle"><a> <?php echo $redux_demo['leatest_news_at_site']; ?> </a><span class="liner"></span></h2>
                    <div class="sports_posts">
                        <?php
                        $args = array('posts_per_page' => 4, 'order' => 'DESC',);
                        $lastpost = new WP_Query($args); ?>
                        <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <div class="eight_post border_around">
                                    <div class="post_thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                            <?php } ?></a></div>
                                    <div class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <?php
                                    foreach ((get_the_category()) as $category) {
                                        $postcat = $category->cat_ID;
                                        $catname = $category->cat_name;
                                    }
                                    ?>
                                    <div class="meta">
                                        <span class="pull-left tags"><i style="font-size: 10px; color:#868686;" class="fa fa-tags"></i> <a href="<?php echo get_category_link($postcat); ?>"><?php echo $catname; ?></a></span>
                                    </div>
                                </div>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </div>
                </div>

                <div class="popular_news">
                    <h2 class="catTitle"><a><?php echo $redux_demo['popular_news_at_site']; ?> </a><span class="liner"></span></h2>
                    <div class="sports_posts">
                        <?php
                        $args = array('posts_per_page' => 4, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC');
                        $lastpost = new WP_Query($args); ?>
                        <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <div class="eight_post border_around">
                                    <div class="post_thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                            <?php } ?></a></div>
                                    <div class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <?php
                                    foreach ((get_the_category()) as $category) {
                                        $postcat = $category->cat_ID;
                                        $catname = $category->cat_name;
                                    }
                                    ?>
                                    <div class="meta">
                                        <span class="pull-left tags"><i style="font-size: 10px; color:#868686;" class="fa fa-tags"></i> <a href="<?php echo get_category_link($postcat); ?>"><?php echo $catname; ?></a></span>
                                    </div>
                                </div>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </div>
                </div>

            </div>
            <div class="home_page_part_one_right">

                <?php $categories = get_the_category();
                $category_id = $categories[0]->cat_ID;
                $child = get_category($category_id);
                $parent = $child->parent;
                if ($parent) {
                    $cat_id = $parent;
                } else {
                    $cat_id = $category_id;
                } ?>


                <div class="leatest_in_a_cat">
                    <h2 class="catTitle"><a> <?php echo $redux_demo['latest_only']; ?> - <?php echo get_the_category_by_id($cat_id); ?></a><span class="liner"></span></h2>
                </div>

                <ul class="first_item leatest_in_a_cat_postlopp border_around">
                    <?php $args = array(
                        'posts_per_page' => 5,
                        'order' => 'DESC',
                        'cat' => $cat_id,
                    );

                    $lastpost = new WP_Query($args);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            $count++; ?>
                            <ul class="" style="padding: 7px;">
                                <i style="margin: 3px 10px 0 0; color:#494949;;" class="fa fa-angle-double-right"></i>
                                <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            </ul>
                    <?php endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?>
                </ul>

                <div class="most_read_in_a_cat white_bg">
                    <h2 class="catTitle"><a> <?php echo $redux_demo['most_read']; ?> - <?php echo get_the_category_by_id($cat_id); ?></a><span class="liner"></span></h2>
                    <ul class="most_read_in_a_cat_post">
                        <?php $popular = new WP_Query(array('cat' => $cat_id, 'posts_per_page' => 5, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
                            while ($popular->have_posts()) : $popular->the_post(); ?>
                            <ul class="border_around">
                                <a href="<?php the_permalink(); ?>">
                                    <thumb> <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                </a>
                                <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            </ul>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                </div>

                <div class="recommened_for_you">
                    <div class="tab_title"><?php echo $redux_demo['recommened_for_you']; ?></div>
                    <div class="recommened_content">
                        <?php
                        $query_args = array(
                            'posts_per_page'  => 10,
                            'orderby'    => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'post_format',
                                    'field' => 'slug',
                                    'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
                                    'operator' => 'NOT IN'
                                )
                            )
                        );

                        $related_cats_post = new WP_Query($query_args);

                        if ($related_cats_post->have_posts()) :
                            while ($related_cats_post->have_posts()) : $related_cats_post->the_post(); ?>
                                <a class="recommened_ten_post" href="<?php the_permalink(); ?>">
                                    <thumb><?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                        <?php } ?></thumb>
                                    <h4 class="media-heading"><?php the_title(); ?></h4>
                                </a>
                        <?php endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php endif; ?>
<?php get_footer(); ?>