<?php get_header();
global $read_more;
if (have_posts()) : ?>
<?php $cat_id = get_query_var('cat'); ?>
<div class="home_page_part_one_bg">
  <div class="custom_container">
    <div class="breadcrumb">
      <?php get_breadcrumb(); ?>
    </div>
    <div class="home_page_part_one">
      <div class="home_page_part_one_left">
        <div class="archive_page_post sunset-posts-container">
          <?php while (have_posts()) : ?>
          <?php the_post(); 
          get_template_part( 'template-parts/post/archive-post');
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
      <div class="home_page_part_one_right">
        <div class="most_read_in_a_cat white_bg">
          <h2 class="catTitle"><a href="#Popular"><?php echo $wesoftpress['most_read']; ?> -
              <?php echo get_the_category_by_id($cat_id); ?></a><span class="liner"></span></h2>
          <ul class="most_read_in_a_cat_post">
            <?php $popular = new WP_Query(array('cat' => $cat_id, 'posts_per_page' => 5, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
              while ($popular->have_posts()) : $popular->the_post(); ?>
            <li class="border_around">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('custom-size');
                      } else { ?>
                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                  alt="<?php the_title(); ?>" />
                <?php } ?>
              </a>
              <span class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
            </li>
            <?php endwhile;
              wp_reset_postdata(); ?>
          </ul>
        </div>

        <?php require get_template_directory() . '/inc/leatest_popular.php'; ?>

      </div>
    </div>
  </div>
</div>
<?php else :
  echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>