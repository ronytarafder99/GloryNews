<?php
global $redux_demo;
get_header(); ?>

<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <div class="tranding-tag-gray"><span>আলোচিত :</span><a
                    href="https://www.jagonews24.com/topic/আইপিএল?utm_source=jagonews_trending">আইপিএল</a><a
                    href="https://www.jagonews24.com/topic/আবহাওয়া?utm_source=jagonews_trending">আবহাওয়া</a><a
                    href="https://www.jagonews24.com/topic/ইউক্রেন-সংকট?utm_source=jagonews_trending">ইউক্রেন-সংকট</a><a
                    href="https://www.jagonews24.com/topic/চাকরির-খবর?utm_source=jagonews_trending">চাকরির-খবর</a><a
                    href="https://www.jagonews24.com/topic/টিকা-সনদ?utm_source=jagonews_trending">টিকা-সনদ</a><a
                    href="https://www.jagonews24.com/topic/ভোজ্যতেল?utm_source=jagonews_trending">ভোজ্যতেল</a></div>
            <div class="leatest_posts">
                <?php
                $args = array('posts_per_page' => 12, 'order' => 'DESC',);
                $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                <div class="leatest_twelve_post border_around">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
                        <?php } ?></a>
                    <h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php custom_length_excerpt(35); ?></p>
                    <div class="meta">
                        <?php $post_tags = get_the_tags();
                                if ($post_tags) { ?>
                        <span class="pull-left tags"><i style="font-size: 10px; color:#868686;" class="fa fa-tags"></i>
                            <a
                                href="<?php bloginfo('url'); ?>/tag/<?php print_r($post_tags[0]->slug); ?>"><?php echo $post_tags[0]->name; ?></a></span>
                        <?php } else { ?>
                        <span class="pull-left tags"><i style="opacity: 0; font-size: 10px; color:#868686;"
                                class="fa fa-tags"></i> <a
                                href="<?php bloginfo('url'); ?>/tag/<?php print_r($post_tags[0]->slug); ?>"><?php echo $post_tags[0]->name; ?></a></span>
                        <?php }
                                foreach ((get_the_category()) as $category) {
                                    $postcat = $category->cat_ID;
                                    $catname = $category->cat_name;
                                }
                                ?>
                        <a href="<?php echo get_category_link($postcat); ?>" style="padding-right: 10px;"
                            class="pull-right"><?php echo $catname; ?></a>
                    </div>
                </div>
                <?php endwhile;
                else :
                    echo '<P>no posts found</P>';
                endif;
                ?>
            </div>
        </div>
        <div class="home_page_part_one_right">
            <div class="home_sidebar_two_post">
                <div class="border_around">
                    <h2 class="home_sidebar_cat_title">
                        <a
                            href="<?php echo get_category_link($redux_demo['home_sidebar_cat1']); ?>"><?php echo get_the_category_by_id($redux_demo['home_sidebar_cat1']); ?></a>
                    </h2>
                    <?php $lastpost = new WP_Query('cat=' . $redux_demo['home_sidebar_cat1'] . ' & posts_per_page=3'); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                    <a class="home_sidebar_posts border_bottom" href="<?php the_permalink(); ?>">
                        <thumb> <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                alt="<?php the_title(); ?>" />
                            <?php } ?></thumb>
                        <h4 class="media-heading"><?php the_title(); ?></h4>
                    </a>
                    <?php endwhile;
                else :
                    echo '<P>no posts found</P>';
                endif;
                ?>
                </div>
            </div>
            <div class="custom_container home_page_ad">
                <?php echo $redux_demo['home_page_right_ad1']; ?>
            </div>

            <?php require get_template_directory() . '/inc/leatest_popular.php'; ?>

            <div class="custom_container home_page_ad">
                <?php echo $redux_demo['home_page_right_ad2']; ?>
            </div>
        </div>
    </div>
</div>

<div class="custom_container home_page_ad">
    <?php echo $redux_demo['home_page_2nd_ad']; ?>
</div>

<div class="video_section gray_bg">
    <div class="custom_container video_post">
        <div class="leatest_one_video_post">
            <h2 class="catTitle">
                <a style="color: #222; padding-left:40px;"
                    href="<?php echo get_post_type_archive_link('videogallery'); ?>" style="margin-left: 40px;">
                    <span class="intro-banner-vdo-play-btn pinkBg">
                        <div class="icon-wrapper"> </div>
                    </span>
                    <?php echo $redux_demo['video_name']; ?>
                </a>
                <span class="liner"></span>
            </h2>
            <?php $video_one = array(
                'post_type' => 'videogallery',
                'posts_per_page' => 1,
                'order' => 'DESC',
            );
            $lastpost_one = new WP_Query($video_one);
            if ($lastpost_one->have_posts()) : while ($lastpost_one->have_posts()) : $lastpost_one->the_post(); ?>
            <li class="photo_leatest_post_left_li">
                <div class="img_box"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
                        <?php } ?></a>
                    <i class="fa fa-play"></i>
                </div>
                <h4 class="media-body"><a
                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a></h4>
            </li>
            <?php endwhile;
            endif ?>
        </div>
        <div class="three_tab_video_post">
            <?php

            $subcategories = get_terms(array(
                'taxonomy' => 'videogallery-categories',
                'hide_empty' => false,
                'number' => 5,
            ));
            $arrayLength = count($subcategories);
            $i = 0;
            echo '<ul class="nav nav-tabs" role="tablist">';
            while ($i < $arrayLength) { ?>

            <li><a href="#vid_tab" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"
                    data-category="<?php echo esc_attr($subcategories[$i]->term_id); ?>"><?php echo apply_filters('get_term', $subcategories[$i]->name); ?></a>
            </li>

            <?php $i++;
            }
            echo '</ul>'; ?>
            <div class="carousel_inner">
                <div class="carousel">
                    <ul class="slides" id="tab_post_container">

                        <?php $video_tab = array(
                            'post_type' => 'videogallery',
                            'posts_per_page' => 5,
                            'order' => 'DESC',
                            'offset' => 1,
                        );
                        $lastpost_tab = new WP_Query($video_tab);
                        if ($lastpost_tab->have_posts()) : while ($lastpost_tab->have_posts()) : $lastpost_tab->the_post(); ?>
                        <li class="white_bg border_around">
                            <div class="img_box">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                        alt="<?php the_title(); ?>" />
                                    <?php } ?></a>
                                <i class="fa fa-play"></i>
                            </div>
                            <h4 class="media-body"><a
                                    href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a>
                            </h4>
                        </li>
                        <?php endwhile;
                        endif; ?>
                    </ul>
                </div>
            </div>

            <a href="<?php echo $redux_demo['Youtube']; ?>" class="all-videos"
                rel="nofollow"><?php echo $redux_demo['all_video_name']; ?> <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="sports_eight_post_grid_bg">
    <div class="custom_container">
        <h2 class="sports_cat_title">
            <a class="parent_cat_title"
                href="<?php echo get_category_link($redux_demo['home_cat_1']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_1']); ?></a>
            <div class="archieve_top_cat">
                <?php

                $subcategories = get_categories('&child_of=' . $redux_demo['home_cat_1'] . '&hide_empty');
                echo '<ul>';
                foreach ($subcategories as $subcategory) {
                    echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
                    $childcatid = sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->term_id));
                }
                echo '</ul>';
                ?>
            </div>
            <a href="<?php echo get_category_link($redux_demo['home_cat_1']); ?>"
                class="allright"><?php echo $redux_demo['all_news']; ?><i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></a>
        </h2>
        <div class="sports_posts">
            <?php $args = array('posts_per_page' => 8, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_1']);
            $lastpost = new WP_Query($args); ?>
            <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                    get_template_part('template-parts/content-eightone');
                endwhile;
            endif
            ?>
        </div>
    </div>
</div>

<div class="gray_bg">
    <div class="custom_container home_page_ad">
        <?php echo $redux_demo['home_page_3rd_ad']; ?>
    </div>
</div>

<div class="home_page_part_one_bg white_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <h2 class="catTitle"><a
                    href="<?php echo get_category_link($redux_demo['home_cat_2']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_2']); ?></a><span
                    class="liner"></span></h2>
            <div class="five_posts">
                <?php $args = array('posts_per_page' => 5, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_2'],);
                $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                <div class="five_post">
                    <div class="post_thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                alt="<?php the_title(); ?>" />
                            <?php } ?></a></div>
                    <div class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <?php
                            foreach ((get_the_category()) as $category) {
                                $postcat = $category->cat_ID;
                                $catname = $category->cat_name;
                            }
                            ?>
                    <div class="meta meta1">
                        <span class="pull-left tags"><i style="font-size: 10px; color:#868686;" class="fa fa-tags"></i>
                            <a href="<?php echo get_category_link($postcat); ?>"><?php echo $catname; ?></a></span>
                    </div>
                </div>
                <?php endwhile;
                endif
                ?>
            </div>
            <div class="sports_posts">
                <?php $args = array('posts_per_page' => 4, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_2'], 'offset' => 5,);
                $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                        get_template_part('template-parts/content-eightone');
                    endwhile;
                endif
                ?>
            </div>
        </div>
        <div class="home_page_part_one_right">
            <?php require_once 'inc/map.php'; ?>
        </div>
    </div>
</div>

<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <div class="three_coloumn">
                <div class="column_one">
                    <h2 class="catTitle"><a
                            href="<?php echo get_category_link($redux_demo['home_cat_3']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_3']); ?></a><span
                            class="liner"></span></h2>
                    <div class="six_posts border_around">
                        <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_3'],);
                        $lastpost = new WP_Query($args); ?>
                        <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                                get_template_part('template-parts/content-six-post');
                            endwhile;
                        endif
                        ?>
                        <div class="allnews"><a href="<?php echo get_category_link($redux_demo['home_cat_3']); ?>">
                                <?php echo $redux_demo['all_news']; ?></a></div>
                    </div>
                </div>
                <div class="column_one">
                    <h2 class="catTitle"><a
                            href="<?php echo get_category_link($redux_demo['home_cat_4']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_4']); ?></a><span
                            class="liner"></span></h2>
                    <div class="six_posts border_around">
                        <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_4'],);
                        $lastpost = new WP_Query($args); ?>
                        <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                                get_template_part('template-parts/content-six-post');
                            endwhile;
                        endif
                        ?>
                        <div class="allnews"><a href="<?php echo get_category_link($redux_demo['home_cat_4']); ?>">
                                <?php echo $redux_demo['all_news']; ?></a></div>
                    </div>
                </div>
                <div class="column_one">
                    <h2 class="catTitle"><a
                            href="<?php echo get_category_link($redux_demo['home_cat_5']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_5']); ?></a><span
                            class="liner"></span></h2>
                    <div class="six_posts border_around">
                        <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_5'],);
                        $lastpost = new WP_Query($args); ?>
                        <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                                get_template_part('template-parts/content-six-post');
                            endwhile;
                        endif
                        ?>
                        <div class="allnews"><a href="<?php echo get_category_link($redux_demo['home_cat_5']); ?>">
                                <?php echo $redux_demo['all_news']; ?></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home_page_part_one_right">
            <div class="facebook_like" style="text-align: center; margin:15px 0">
                <?php if (is_active_sidebar('facebook_like')) : ?>
                <?php dynamic_sidebar('facebook_like'); ?>
                <?php endif; ?>
            </div>
            <div class="custom_container home_page_ad">
                <?php echo $redux_demo['home_page_right_ad4']; ?>
            </div>
        </div>
    </div>
</div>

<div class="home_page_part_one_bg white_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <h2 class="catTitle"><a
                    href="<?php echo get_category_link($redux_demo['home_cat_6']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_6']); ?></a><span
                    class="liner"></span></h2>
            <div class="grid_posts">
                <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_6'],);
                $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                <div class="grid_post border_around">
                    <div class="post_thumb"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                alt="<?php the_title(); ?>" />
                            <?php } ?></a></div>
                    <div class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <div class="meta meta1">
                        <?php $post_tags = get_the_tags();
                                if ($post_tags) { ?>
                        <span class="pull-left tags"><i style="font-size: 10px; color:#868686;" class="fa fa-tags"></i>
                            <a
                                href="<?php bloginfo('url'); ?>/tag/<?php print_r($post_tags[0]->slug); ?>"><?php echo $post_tags[0]->name; ?></a></span>
                        <?php } else { ?>
                        <span class="pull-left tags"><i style="opacity: 0; font-size: 10px; color:#868686;"
                                class="fa fa-tags"></i> <a
                                href="<?php bloginfo('url'); ?>/tag/<?php print_r($post_tags[0]->slug); ?>"><?php echo $post_tags[0]->name; ?></a></span>
                        <?php } ?>


                        <?php
                                foreach ((get_the_category()) as $category) {
                                    $postcat = $category->cat_ID;
                                    $catname = $category->cat_name;
                                }
                                ?>
                        <a href="<?php echo get_category_link($postcat); ?>" style="padding-right: 10px;"
                            class="pull-right"><?php echo $catname; ?></a>
                    </div>
                </div>
                <?php endwhile;
                endif
                ?>
            </div>
        </div>
        <div class="home_page_part_one_right">
            <div class="fb-live">
                <h2 class="no-margin">
                    <a
                        href="<?php echo get_category_link($redux_demo['home_sidebar_cat2']); ?>"><?php echo get_the_category_by_id($redux_demo['home_sidebar_cat2']); ?></a>
                </h2>
                <div class="fb-live_post border_around">
                    <?php $manobotapost = new WP_Query('cat=' . $redux_demo['home_sidebar_cat2'] . ' & posts_per_page=6'); ?>
                    <?php if ($manobotapost->have_posts()) : while ($manobotapost->have_posts()) : $manobotapost->the_post(); ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size');
                                        } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                    alt="<?php the_title(); ?>" />
                                <?php } ?></a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                    </div>
                    <?php endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?>
                </div>
                <div class="allnews">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_3']); ?>">
                        <?php echo $redux_demo['more']; ?> <i class="fa fa-angle-double-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="custom_container home_page_ad">
    <?php echo $redux_demo['home_page_4th_ad']; ?>
</div>



<div class="home_page_part_one_bg white_bg">
    <div class="custom_container">
        <div class="three_coloumn">
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_7']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_7']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_7'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_8']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_8']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_8'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_9']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_9']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_9'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_10']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_10']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_10'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sports_eight_post_grid_bg">
    <div class="custom_container">
        <h2 class="sports_cat_title">
            <a class="parent_cat_title"
                href="<?php echo get_category_link($redux_demo['home_cat_11']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_11']); ?></a>
            <div class="archieve_top_cat">
                <?php

                $subcategories = get_categories('&child_of=' . $redux_demo['home_cat_11'] . '&hide_empty');
                echo '<ul>';
                foreach ($subcategories as $subcategory) {
                    echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
                    $childcatid = sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->term_id));
                }
                echo '</ul>';
                ?>
            </div>
            <a href="<?php echo get_category_link($redux_demo['home_cat_11']); ?>"
                class="allright"><?php echo $redux_demo['all_news']; ?> <i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></a>
        </h2>
        <div class="sports_posts">
            <?php $args = array('posts_per_page' => 8, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_11']);
            $lastpost = new WP_Query($args); ?>
            <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                    get_template_part('template-parts/content-eight');
                endwhile;
            endif
            ?>
        </div>
    </div>
</div>


<div class="home_page_part_one_bg white_bg">
    <div class="custom_container">
        <div class="three_coloumn">
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_12']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_12']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_12'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_13']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_13']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_13'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_14']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_14']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_14'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_15']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_15']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_15'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sports_eight_post_grid_bg">
    <div class="custom_container">
        <h2 class="sports_cat_title">
            <a class="parent_cat_title"
                href="<?php echo get_category_link($redux_demo['home_cat_16']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_16']); ?></a>
            <div class="archieve_top_cat">
                <?php

                $subcategories = get_categories('&child_of=' . $redux_demo['home_cat_16'] . '&hide_empty');
                echo '<ul>';
                foreach ($subcategories as $subcategory) {
                    echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
                    $childcatid = sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->term_id));
                }
                echo '</ul>';
                ?>
            </div>
            <a href="<?php echo get_category_link($redux_demo['home_cat_16']); ?>"
                class="allright"><?php echo $redux_demo['all_news']; ?> <i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></a>
        </h2>
        <div class="sports_posts">
            <?php $args = array('posts_per_page' => 4, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_16']);
            $lastpost = new WP_Query($args); ?>
            <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                    get_template_part('template-parts/content-eight');
                endwhile;
            endif
            ?>
        </div>
    </div>
</div>


<div class="home_page_part_one_bg white_bg">
    <div class="custom_container">
        <div class="three_coloumn">
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_17']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_17']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_17'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_18']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_18']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_18'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_19']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_19']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_19'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($redux_demo['home_cat_20']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_20']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $redux_demo['home_cat_20'],);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-six-post');
                        endwhile;
                    endif
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Photo -->

<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <h2 class="catTitle"><a
                    href="<?php echo get_post_type_archive_link('photogallery'); ?>"><?php echo $redux_demo['photo_name']; ?></a><span
                    class="liner"></span></h2>
            <?php get_template_part('template-parts/content-myslide-pic'); ?>
        </div>
        <div class="home_page_part_one_right">
            <h2 class="catTitle"><a
                    href="<?php echo get_post_type_archive_link('photogallery'); ?>"><?php echo $redux_demo['latest_only']; ?></a><span
                    class="liner"></span></h2>
            <div class="photo_leatest_post">
                <?php $args1 = array(
                    'post_type' => 'photogallery',
                    'posts_per_page' => 8,
                    'order' => 'DESC',
                );
                $lastpost = new WP_Query($args1);
                if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                <li class="photo_leatest_post_li">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
                        <?php } ?></a>
                    <a href="<?php the_permalink(); ?>"><span
                            class="media-body"><?php echo wp_trim_words(get_the_title(), 10); ?></span></a>
                </li>
                <?php endwhile;
                endif ?>
            </div>
        </div>
    </div>
</div>


<div class="gray_bg">
    <div class="custom_container home_page_ad">
        <?php echo $redux_demo['home_page_last_ad']; ?>
    </div>
</div>

<?php get_footer(); ?>