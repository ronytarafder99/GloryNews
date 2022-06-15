<div class="binodon-lead-box">
    <div class="binodon-lead-thum">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('custom-size');
            } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
            <?php } ?>
        </a>
        <div class="binodon-audio-video"></div>
    </div>
    <div class="binodon-lead-content"><a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
        </a>
        <p><?php echo custom_length_excerpt(20) ?></p>
    </div>
</div>