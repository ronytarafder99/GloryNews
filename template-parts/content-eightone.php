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