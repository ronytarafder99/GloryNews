<?php
global $wesoftpress;
get_header(); ?>

<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <div class="tranding-tag-gray">
                <span>
                    <?php if ($wesoftpress['time-switch'] == '1') {
                        echo 'আলোচিত :';
                    } else {
                        echo 'Popular';
                        } ?>
                </span>
                <?php $popular_menu = 'popular_menu';
                    if (has_nav_menu($popular_menu)) {
                    $menuParameters = array(
                        'theme_location' => $popular_menu,
                        'container'       => false,
                        'echo'            => false,
                        'items_wrap'      => '%3$s',
                        'depth'           => 0,
                        );

                    echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); 
                    } ?>
            </div>

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
                    <p><?php custom_length_excerpt(30); ?></p>
                    <div class="meta">
                        <?php $post_tags = get_the_tags();
                                if ($post_tags) { ?>
                        <span class="pull-left tags"><i style="font-size: 10px; color:#868686;" class="fa fa-tags"></i>
                            <a
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

            <div class="custom_container home_page_ad">
                <?php echo $wesoftpress['home_page_right_ad1']; ?>
            </div>

            <?php require get_template_directory() . '/inc/leatest_popular.php'; ?>

            <div class="custom_container home_page_ad">
                <?php echo $wesoftpress['home_page_right_ad2']; ?>
            </div>
        </div>
    </div>
</div>

<section class="opinion-section-area">
    <div class="custom_container">
        <h2 class="opinion-title">
            <a
                href="<?php echo get_category_link($wesoftpress['home_cat_0']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_0']); ?></a>
        </h2>
        <div class="row">
            <?php $argsopinion = array('posts_per_page' => 4, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_0'],);
            $opinion = new WP_Query($argsopinion); ?>
            <?php if ($opinion->have_posts()) : while ($opinion->have_posts()) : $opinion->the_post(); ?>
            <div class="col-lg-3 border-right1">
                <div class="opinion-content-box">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
                        <?php } ?>
                    </a>
                    <div class="opinion-body"><a href="<?php the_permalink(); ?>">
                            <h4 class="opinion-heading"><?php the_title(); ?></h4>
                        </a>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><span
                                class="opinion-author"><?php echo get_the_author(); ?></span></a>
                    </div>
                </div>
            </div>
            <?php endwhile;
            endif ?>

        </div>
    </div>
</section>

<div class="custom_container home_page_ad">
    <?php echo $wesoftpress['home_page_2nd_ad']; ?>
</div>

<!-- videogallery -->
<section>
    <div class="custom_container">
        <h2 class="catTitle"><a href="<?php echo get_post_type_archive_link('videogallery'); ?>">
                <?php echo $wesoftpress['video_name']; ?></a><span class="liner"></span></h2>
    </div>

    <div class="video_section">
        <div class="custom_container video_post">
            <div class="leatest_one_video_post">
                <h2 class="catTitle">
                    <a style="color: #fff; padding-left:40px;"
                        href="<?php echo get_post_type_archive_link('videogallery'); ?>" style="margin-left: 40px;">
                        <span class="intro-banner-vdo-play-btn pinkBg">
                            <div class="icon-wrapper"> </div>
                        </span>
                        <?php if ($wesoftpress['time-switch'] == '1') {
                                echo 'নিউজ আপডেট';
                            } else {
                                echo 'News Update';
                            } ?>
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
                                <h4 class="media-body 5video"><a
                                        href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a>
                                </h4>
                            </li>
                            <?php endwhile;
                        endif; ?>
                        </ul>
                    </div>
                </div>

                <a href="<?php echo $wesoftpress['Youtube']; ?>" class="all-videos"
                    rel="nofollow"><?php echo $wesoftpress['all_video_name']; ?> <i
                        class="fas fa-long-arrow-alt-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>


<div class="sports_eight_post_grid_bg">
    <div class="custom_container">
        <h2 class="sports_cat_title">
            <a class="parent_cat_title"
                href="<?php echo get_category_link($wesoftpress['home_cat_1']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_1']); ?></a>
            <div class="archieve_top_cat">
                <ul>
                    <?php
                    $categories=get_categories(array( 'parent' => $wesoftpress['home_cat_11']));
                    foreach($categories as $subcategory){
                        echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
                    }; ?>
                </ul>
            </div>
            <a href="<?php echo get_category_link($wesoftpress['home_cat_1']); ?>"
                class="allright"><?php echo $wesoftpress['all_news']; ?><i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></a>
        </h2>
        <div class="sports_posts">
            <?php $args = array('posts_per_page' => 8, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_1']);
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
        <?php echo $wesoftpress['home_page_3rd_ad']; ?>
    </div>
</div>

<div class="home_page_part_one_bg white_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <h2 class="catTitle"><a
                    href="<?php echo get_category_link($wesoftpress['home_cat_2']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_2']); ?></a><span
                    class="liner"></span></h2>
            <div class="five_posts">
                <?php $args = array('posts_per_page' => 5, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_2'],);
                $lastpost = new WP_Query($args);
                if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                <div class="five_post">

                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
                        <?php } ?>
                    </a>

                    <div class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <?php
                    foreach ((get_the_category()) as $category) {
                        $postcat = $category->cat_ID;
                        $catname = $category->cat_name;
                    }; ?>
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
                <?php $args = array('posts_per_page' => 4, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_2'], 'offset' => 5,);
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

<section class="boxcontent-1lead4x2-section">
    <div class="custom_container">
        <div class="row header-space">
            <div class="col-md-3">
                <div class="boxcontent-1lead4x2-title-here">
                    <?php $home_cat_3 = $wesoftpress['home_cat_3']; ?>
                    <a href="<?php echo get_category_link($home_cat_3); ?>">
                        <h2><?php echo get_the_category_by_id($home_cat_3); ?></h2>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="boxcontent-1lead4x2-country">
                    <?php
                    $categories=get_categories(array( 'parent' => $home_cat_3 ));
                    foreach($categories as $subcategory){
                        echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
                    } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php $args = array('posts_per_page' => 1, 'order' => 'DESC', 'cat' => $home_cat_3,);
                        $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                <div class="boxcontent-1lead4x2-lead-box">
                    <div class="boxcontent-1lead4x2-lead-img-thum">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                        } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </a>
                        <div class="audio-video-button"></div>
                    </div>
                    <div class="boxcontent-1lead4x2-lead-content"><a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
                        <p><?php custom_length_excerpt(30); ?></p>
                    </div>
                </div>
                <?php endwhile;
                endif;
                wp_reset_postdata(); ?>

            </div>
            <div class="col-md-6">

                <?php $args = array('posts_per_page' => 4, 'order' => 'DESC', 'cat' => $home_cat_3, 'offset'=>1,);
                        $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                <div class="boxcontent-1lead4x2-list-box">
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="boxcontent-1lead4x2-img-thum">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                        } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                        alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                </a>
                                <div class="audio-video-button"></div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-8">
                            <div class="boxcontent-1lead4x2-content-box"><a href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                </a>
                                <p><?php custom_length_excerpt(20); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;
                endif;
                wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
</section>

<section class="politics-economy-section" style="margin-bottom: 30px">
    <div class="custom_container">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6" id="desktop_border_right">
                        <div class="singleBlock-3x2-title-here">
                            <a href="<?php echo get_category_link($wesoftpress['home_cat_4']); ?>">
                                <h2><?php echo get_the_category_by_id($wesoftpress['home_cat_4']); ?></h2>
                            </a>
                        </div>
                        <div class="row" id="mobile_scroll">
                            <div class="col-md-12">
                                <?php $args = array('posts_per_page' => 1, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_4'],);
                                $lastpost = new WP_Query($args); ?>
                                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <div class="singleBlock-3x2-lead-content-box">
                                    <div class="singleBlock-3x2-lead-thum">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size', ['class' => 'img-responsive']);
                                            } else { ?>
                                            <img class="img-responsive"
                                                src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                                alt="<?php the_title(); ?>" />
                                            <?php } ?>
                                        </a>
                                        <div class="audio-video-button"></div>
                                    </div>
                                    <div class="singleBlock-3x2-lead-content">
                                        <a href="<?php the_permalink(); ?>">
                                            <h2><?php the_title(); ?></h2>
                                        </a></div>
                                </div>
                                <?php endwhile;
                                endif;
                                wp_reset_postdata(); ?>

                            </div>
                            <?php $args = array('posts_per_page' => 4, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_4'], 'offset'=>1,);
                            $lastpost = new WP_Query($args); ?>
                            <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                            <div class="col-md-6">
                                <div class="singleBlock-3x2-lead-content-box">
                                    <div class="singleBlock-3x2-lead-thum">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size', ['class' => 'img-responsive']);
                                            } else { ?>
                                            <img class="img-responsive"
                                                src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                                alt="<?php the_title(); ?>" />
                                            <?php } ?>
                                        </a>
                                        <div class="audio-video-button"></div>
                                    </div>
                                    <div class="singleBlock-3x2-list-content no-border">
                                        <a href="<?php the_permalink(); ?>">
                                            <h2><?php the_title(); ?></h2>
                                        </a></div>
                                </div>
                            </div>
                            <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="singleBlock-3x2-title-here">
                            <a href="<?php echo get_category_link($wesoftpress['home_cat_5']); ?>">
                                <h2><?php echo get_the_category_by_id($wesoftpress['home_cat_5']); ?></h2>
                            </a>
                        </div>
                        <div class="row" id="mobile_scroll">
                            <div class="col-md-12">
                                <?php $args = array('posts_per_page' => 1, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_5'],);
                            $lastpost = new WP_Query($args); ?>
                                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <div class="singleBlock-3x2-lead-content-box">
                                    <div class="singleBlock-3x2-lead-thum"><a href="<?php the_permalink(); ?>"
                                            title="<?php the_title(); ?>">
                                            <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size', ['class' => 'img-responsive']);
                                            } else { ?>
                                            <img class="img-responsive"
                                                src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                                alt="<?php the_title(); ?>" />
                                            <?php } ?>
                                        </a>
                                        <div class="audio-video-button"></div>
                                    </div>
                                    <div class="singleBlock-3x2-lead-content">
                                        <a href="<?php the_permalink(); ?>">
                                            <h2><?php the_title(); ?></h2>
                                        </a>
                                    </div>
                                </div>
                                <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>

                            </div>
                            <?php $args = array('posts_per_page' => 4, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_5'], 'offset'=>1,);
                            $lastpost = new WP_Query($args); ?>
                            <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                            <div class="col-md-6">
                                <div class="singleBlock-3x2-lead-content-box">
                                    <div class="singleBlock-3x2-lead-thum"><a href="<?php the_permalink(); ?>"
                                            title="<?php the_title(); ?>">
                                            <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size', ['class' => 'img-responsive']);
                                            } else { ?>
                                            <img class="img-responsive"
                                                src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                                alt="<?php the_title(); ?>" />
                                            <?php } ?>
                                        </a>
                                        <div class="audio-video-button"></div>
                                    </div>
                                    <div class="singleBlock-3x2-list-content no-border">
                                        <a href="<?php the_permalink(); ?>">
                                            <h2><?php the_title(); ?></h2>
                                        </a></div>
                                </div>
                            </div>
                            <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-sm-4 aside" style="margin-top: -15px">

                <div class="text-center">
                    <div class="facebook_like" style="text-align: center; margin:15px 0">
                        <?php if (is_active_sidebar('facebook_like')) : ?>
                        <?php dynamic_sidebar('facebook_like'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="custom_container home_page_ad">
                        <?php echo $wesoftpress['home_page_right_ad4']; ?>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</section>



<div class="home_page_part_one_bg white_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <h2 class="catTitle"><a
                    href="<?php echo get_category_link($wesoftpress['home_cat_6']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_6']); ?></a><span
                    class="liner"></span></h2>
            <div class="grid_posts">
                <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_6'],);
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
                endif
                ?>
            </div>
        </div>
        <div class="home_page_part_one_right">
            <div class="fb-live">
                <h2 class="no-margin">
                    <a
                        href="<?php echo get_category_link($wesoftpress['home_sidebar_cat2']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_sidebar_cat2']); ?></a>
                </h2>
                <div class="fb-live_post border_around">
                    <?php $manobotapost = new WP_Query('cat=' . $wesoftpress['home_sidebar_cat2'] . ' & posts_per_page=6'); ?>
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
                    <a href="<?php echo get_category_link($wesoftpress['home_sidebar_cat2']); ?>">
                        <?php echo $wesoftpress['more']; ?> <i class="fa fa-angle-double-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="custom_container home_page_ad">
    <?php echo $wesoftpress['home_page_4th_ad']; ?>
</div>



<div class="home_page_part_one_bg white_bg">
    <div class="custom_container">
        <div class="three_coloumn">
            <div class="column_one">
                <h2 class="catTitle"><a
                        href="<?php echo get_category_link($wesoftpress['home_cat_7']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_7']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_7'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_8']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_8']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_8'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_9']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_9']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_9'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_10']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_10']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_10'],);
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

<div class="binodon-section">
    <div class="custom_container">
        <h2 class="sports_cat_title">
            <a class="parent_cat_title"
                href="<?php echo get_category_link($wesoftpress['home_cat_11']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_11']); ?></a>
            <div class="archieve_top_cat">
                <ul>
                    <?php
                    $categories=get_categories(array( 'parent' => $wesoftpress['home_cat_11']));
                    foreach($categories as $subcategory){
                        echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
                    }; ?>
                </ul>
            </div>
            <a href="<?php echo get_category_link($wesoftpress['home_cat_11']); ?>"
                class="allright"><?php echo $wesoftpress['all_news']; ?> <i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></a>
        </h2>
        <div class="binodon_posts">
            <?php $args = array('posts_per_page' => 9, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_11']);
            $lastpost = new WP_Query($args); ?>
            <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                    get_template_part('template-parts/binodon-post');
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_12']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_12']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_12'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_13']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_13']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_13'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_14']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_14']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_14'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_15']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_15']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_15'],);
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
                href="<?php echo get_category_link($wesoftpress['home_cat_16']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_16']); ?></a>
            <div class="archieve_top_cat">
                <ul>
                    <?php
                    $categories=get_categories(array( 'parent' => $wesoftpress['home_cat_11']));
                    foreach($categories as $subcategory){
                        echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
                    }; ?>
                </ul>
            </div>
            <a href="<?php echo get_category_link($wesoftpress['home_cat_16']); ?>"
                class="allright"><?php echo $wesoftpress['all_news']; ?> <i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></a>
        </h2>
        <div class="sports_posts">
            <?php $args = array('posts_per_page' => 4, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_16']);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_17']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_17']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_17'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_18']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_18']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_18'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_19']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_19']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_19'],);
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
                        href="<?php echo get_category_link($wesoftpress['home_cat_20']); ?>"><?php echo get_the_category_by_id($wesoftpress['home_cat_20']); ?></a><span
                        class="liner"></span></h2>
                <div class="six_posts border_around">
                    <?php $args = array('posts_per_page' => 6, 'order' => 'DESC', 'cat' => $wesoftpress['home_cat_20'],);
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
                    href="<?php echo get_post_type_archive_link('photogallery'); ?>"><?php echo $wesoftpress['photo_name']; ?></a><span
                    class="liner"></span></h2>
            <?php get_template_part('template-parts/content-myslide-pic'); ?>
        </div>
        <div class="home_page_part_one_right">
            <h2 class="catTitle"><a
                    href="<?php echo get_post_type_archive_link('photogallery'); ?>"><?php echo $wesoftpress['latest_only']; ?></a><span
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
        <?php echo $wesoftpress['home_page_last_ad']; ?>
    </div>
</div>

<?php get_footer(); ?>