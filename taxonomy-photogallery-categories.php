<?php get_header(); ?>
<?php if (have_posts()) : ?>
<main id="main-content">
    <section class="box-white photo">
        <div class="custom_container">
            <div class="row marginTop20">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo get_post_type_archive_link('photogallery'); ?>"><i class="fa fa-home text-danger"></i></a></li>
                        <li class="active"><?php single_cat_title(); ?></li>
                    </ol>
                </div>
            </div>
            <div class="marginBottom20">
                <div class="row">
                    <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="col-md-3">
                        <div class="single-block auto">
                            <div class="img-box">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                        alt="<?php the_title(); ?>" />
                                    <?php } ?></a>
                            </div>
                            <h4><a href="<?php the_permalink(); ?>"
                                    title="<?php the_title(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a>
                            </h4>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="pagination1">
                    <div class="pagi_inner">
                        <?php echo paginate_links(array(
                            'prev_text' => __('&laquo;', 'textdomain'),
                            'next_text' => __('&raquo;', 'textdomain'),
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php else :
  echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>