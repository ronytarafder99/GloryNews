<?php get_header();
global $read_more;
if (have_posts()) : ?>
    <div class="home_page_part_one_bg">
        <div class="custom_container">
            <div class="breadcrumb" style="background-color: transparent; padding-top: 10px !important;">
                <h2>
                    <i class="fa fa-tag" style="color:#9a1515;"></i>
                    <?php single_tag_title(); ?>
                </h2>
            </div>
            <div class="tag_page_post white_bg sunset-posts-container">
            <?php while (have_posts()) : the_post();
            get_template_part( 'template-parts/post/tag-post');
            endwhile; ?>
        </div>
        <?php
        global $wp_query;
        if (  $wp_query->max_num_pages > 1 )
          echo '<div class="text-center paddingBottom20">
          <button class="sunset-load-more" id="load_more_button"><img alt="Loader"
          src="'.get_template_directory_uri().'/img/ajax-loader.gif" class="animation_image"
          style="margin-right: 5px; width: 21px; display: none;"> <span class="text">'.$read_more.'</span></button>
          </div>'; ?>
        </div>
    </div>
<?php else :
    echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>