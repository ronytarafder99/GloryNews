<?php get_header();
global $wesoftpress; ?>
<?php if (have_posts()) : ?>
<main role="main">
    <div class="custom_container">
        <div class="row">
            <div class="col-sm-12">
                <nav aria-label="breadcrumb" style="margin: 10px 0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo get_post_type_archive_link('videogallery'); ?>">
                                <svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-house" fill="black"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a><?php single_cat_title(); ?></a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="category-1-contents pb-3">
                    <div class="row video-list">

                        <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-3 d-flex align-items-stretch">
                            <a class="card" href="<?php the_permalink(); ?>">
                                <div class="card-image">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                            } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                        alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" height="48" viewBox="0 0 24 24"
                                        width="48">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php the_title(); ?></h4>
                                </div>
                            </a>
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
        </div>
    </div>
</main>
<?php else :
  echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>