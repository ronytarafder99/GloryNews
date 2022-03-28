<?php

/*
	
@package Jagotheme_by_rony-ajax
	
	========================
		AJAX FUNCTIONS
	========================
*/

add_action('wp_ajax_nopriv_sunset_load_more', 'sunset_load_more');
add_action('wp_ajax_sunset_load_more', 'sunset_load_more');

function sunset_load_more()
{

	$paged = $_POST["page"] + 1;
	$cat_id  = $_POST['cat'];
	$query = new WP_Query(array(
		'cat'      => $cat_id,
		'post_type' => 'post',
		'paged' => $paged,
		'posts_per_page' => 4,

	));

	if ($query->have_posts()) :

		while ($query->have_posts()) : $query->the_post(); ?>

			<div class="archive_posts border_around">
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

		<?php endwhile;

	endif;

	wp_reset_postdata();

	die();
}


add_action('wp_ajax_nopriv_home_page_tab_post', 'home_page_tab_post');
add_action('wp_ajax_home_page_tab_post', 'home_page_tab_post');
function home_page_tab_post()
{
	$cat_id  = $_POST['cat'];

	$video_tab = array(
		'post_type' => 'videogallery',
		'tax_query' => array(
			array(
				'taxonomy' => 'videogallery-categories',
				'field' => 'term_id',
				'terms' => $cat_id,
			)
		), 'posts_per_page' => 5,
	);
	$lastpost_tab = new WP_Query($video_tab);
	if ($lastpost_tab->have_posts()) : while ($lastpost_tab->have_posts()) : $lastpost_tab->the_post(); ?>
			<li class="white_bg border_around">
				<div class="img_box">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('custom-size');
						} else { ?>
							<img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
						<?php } ?></a>
					<i class="fa fa-play"></i>
				</div>
				<h4 class="media-body"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a></h4>
			</li>
		<?php endwhile;
	else :
		echo '<P>no posts found</P>';
	endif;





	wp_reset_postdata();

	die();
}
