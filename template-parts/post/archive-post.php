<div class="archive_posts">
    <a class="archive_post_thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('custom-size');
                  } else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
        <?php } ?></a>
    <div class="direction_coloumn">
        <h3 class="archive_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php custom_length_excerpt(30); ?></p>
    </div>
</div>