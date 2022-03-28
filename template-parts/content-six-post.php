<div class="six_post">
    <div class="post_thumb"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('custom-size');
            } else { ?>
                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
            <?php } ?></a></div>
    <div class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
</div>