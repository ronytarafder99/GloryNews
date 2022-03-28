<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <div class="home_page_part_one_bg gray_bg">
    <div class="custom_container">
      <div class="breadcrumb gray_bg">
        <h5 style="display: flex; align-items: center;">
          <i class="fa fa-search" style="color:#9a1515; margin-right:10px;"></i>
          <div class="pv_bread">
            <a href="<?php bloginfo('home'); ?>"><?php echo $redux_demo['home_heading']; ?></a>
            <?php echo "<b>&nbsp;&nbsp;&#187;&nbsp;&nbsp;</b>"; ?>
            <a href="<?php bloginfo('home'); ?>/all-posts/"><?php echo $redux_demo['latest_all_only']; ?></a>
            <?php echo "<b>&nbsp;&nbsp;&#187;&nbsp;&nbsp;</b>"; ?>
            <?php the_search_query(); ?>
          </div>
        </h5>
      </div>
      <div class="tag_page_post white_bg sunset-posts-container">
        <?php while (have_posts()) : ?>
          <?php the_post(); ?>
          <div class="tag_posts border_around">
            <a class="tag_post_thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail('custom-size');
              } else { ?>
                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
              <?php } ?></a>
            <div class="direction_coloumn">
              <h3 class="tag_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <small><?php the_time('l , j F Y') ?></small>
              <p><?php custom_length_excerpt(30); ?></p>
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
<?php else :
  echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>