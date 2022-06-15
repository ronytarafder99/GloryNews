<?php get_header();
global $read_more;
if (have_posts()) : ?>
<div class="home_page_part_one_bg">
    <div class="custom_container">
        <div class="breadcrumb author_breadcrumb">

            <div style="margin: 0px 10px;" class="media-left hidden-print" id="author_thumb">
                <?php
                    $user = wp_get_current_user();

                    if ($user) :
                    ?>
                <img alt="প্রতিবেদক" src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" class="media-object"
                    style="margin-top:5px;width:40px;height:40px;border-radius:100%;display:inline-block;">
                <?php endif; ?>
            </div>
            <h2 style="margin-bottom: 0;"> <?php $author = get_user_by('slug', get_query_var('author_name'));
                                                echo get_the_author();
                                                ?></h2>

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
          </div>'; 
      ?>
    </div>
</div>
<?php else :
    echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>