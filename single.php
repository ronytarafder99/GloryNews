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
                    <div class="print_logo">
                        <img width="<?php echo $wesoftpress['width']; ?>" height="<?php echo $wesoftpress['height']; ?>"
                            src="<?php echo $wesoftpress['logo']['url']; ?>" alt="<?php echo $wesoftpress['alt']; ?>">
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
                                    <img alt="প্রতিবেদক" src="<?php echo esc_url(get_avatar_url($user->ID)); ?>"
                                        class="media-object"
                                        style="margin-top:5px;width:40px;height:40px;border-radius:100%;display:inline-block;">
                                    <?php endif; ?>
                                </div>
                                <div class="media-body">
                                    <span class="small text-muted time-with-author">
                                        <svg class="details-pencil" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="pencil-alt" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z">
                                            </path>
                                        </svg>
                                        <a class="hidden-print"
                                            href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"
                                            style="display:inline-block; color: #222222;"><?php echo get_the_author(); ?></a>
                                        <br>
                                        <svg class="details-clock" aria-hidden="true" focusable="false"
                                            data-prefix="far" data-icon="clock" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z">
                                            </path>
                                        </svg>
                                        <?php echo 'প্রকাশিত: '. bn_number(get_the_date( 'g:i a, j F Y')); ?>
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
                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                        alt="<?php the_title(); ?>" />
                    <?php } ?>
                </div>
                <div class="single_post_content">
                    <p><?php the_content(); ?></p>
                </div>
                <?php $posttags = get_the_tags();
                if ($posttags) {
                echo '<div class="paddingLeft10 paddingRight10 single_tag photo-title">
                <ul class="photo-tags">
                <li>
                            <svg class="details-tags-icon" aria-hidden="true" focusable="false" data-prefix="fas"
                                data-icon="tags" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z">
                                </path>
                            </svg>
                        </li>';
                foreach($posttags as $tag) {
                    echo '<li><a href="'.get_tag_link( $tag->term_id ).'">'.$tag->name.'</a></li>';
                }
                echo '</ul>
                </div>';
                } ?>

            </div>
            <?php endwhile; ?>

            <div class="leatest_news">
                <h2 class="catTitle"><a> <?php echo $wesoftpress['leatest_news_at_site']; ?> </a><span
                        class="liner"></span></h2>
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
                        <div class="meta">
                            <span class="pull-left tags"><i style="font-size: 10px; color:#868686;"
                                    class="fa fa-tags"></i> <a
                                    href="<?php echo get_category_link($postcat); ?>"><?php echo $catname; ?></a></span>
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
                <h2 class="catTitle"><a><?php echo $wesoftpress['popular_news_at_site']; ?> </a><span
                        class="liner"></span></h2>
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
                        <div class="meta">
                            <span class="pull-left tags"><i style="font-size: 10px; color:#868686;"
                                    class="fa fa-tags"></i> <a
                                    href="<?php echo get_category_link($postcat); ?>"><?php echo $catname; ?></a></span>
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
                <h2 class="catTitle"><a> <?php echo $wesoftpress['latest_only']; ?> -
                        <?php echo get_the_category_by_id($cat_id); ?></a><span class="liner"></span></h2>
            </div>

            <ul class="first_item leatest_in_a_cat_postlopp border_around">
                <?php $args = array(
                        'posts_per_page' => 5,
                        'order' => 'DESC',
                        'cat' => $cat_id,
                    );

                    $lastpost = new WP_Query($args);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();?>
                    <li class="tab_post"> <i style="margin: 3px 10px 0 0; color:#333; font-size:14px;"
                            class="fa fa-angle-double-right"></i><a
                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?>
            </ul>

            <div class="most_read_in_a_cat white_bg">
                <h2 class="catTitle"><a> <?php echo $wesoftpress['most_read']; ?> -
                        <?php echo get_the_category_by_id($cat_id); ?></a><span class="liner"></span></h2>
                <ul class="most_read_in_a_cat_post">
                    <?php $popular = new WP_Query(array('cat' => $cat_id, 'posts_per_page' => 5, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
                            while ($popular->have_posts()) : $popular->the_post(); ?>
                    <li class="border_around">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </a>
                        <span class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </li>
                    <?php endwhile;
                        wp_reset_postdata(); ?>
                </ul>
            </div>

            <div class="recommened_for_you">
                <div class="tab_title"><?php echo $wesoftpress['recommened_for_you']; ?></div>
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
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                alt="<?php the_title(); ?>" />
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