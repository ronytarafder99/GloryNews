<?php get_header(); ?>
<div class="page_container">
    <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article class="page">
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
            </article>
    <?php endwhile;
    else :
        echo '<p>No content found</p>';
    endif; ?>
</div>
<?php get_footer(); ?>