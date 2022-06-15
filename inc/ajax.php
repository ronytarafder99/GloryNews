<?php

/*
	
@package Jagotheme_by_rony-ajax
	
	========================
		AJAX FUNCTIONS
	========================
*/


function misha_my_load_more_scripts() {
 
	global $wp_query; 
    wp_enqueue_script('jquery');
	wp_register_script( 'my_loadmore', get_template_directory_uri() . '/js/myloadmore.js', array('jquery') );
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );



function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
		 if(is_tag() or is_author()){ 
			get_template_part( 'template-parts/post/tag-post');
		}else{ 
			get_template_part( 'template-parts/post/archive-post');
		}  
	endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

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
