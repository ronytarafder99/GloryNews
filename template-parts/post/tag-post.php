<?php global $wesoftpress; ?>
<div class="tag_posts">
    <div class="tag_post_thumb">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('custom-size');
                } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
            <?php } ?>
        </a>
        <?php foreach ((get_the_category()) as $category) {
            $postcat = $category->cat_ID;
            $catname = $category->cat_name;
        } ?>
        <div class="overlay-category">
            <a href="<?php echo get_category_link($postcat); ?>"><?php echo $catname; ?></a>
        </div>
    </div>
    <div class="direction_coloumn">
        <h3 class="tag_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <small>
            <?php if ($wesoftpress['time-switch'] == '1') {
                echo bn_number(get_the_date('g:i a, j F Y, l'));
            } else {
                echo get_the_date('g:i a, j F Y, l');
            } ?>
        </small>
        <p><?php custom_length_excerpt(30); ?></p>
    </div>
</div>