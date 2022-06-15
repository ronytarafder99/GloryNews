<?php
function theme_set_up(){
    register_nav_menus(array(
        'header_menu' => 'Header Menu',
        'popular_menu' => 'Fopular Item Menu',
        'header_mobile_menu' => 'Header Mobile Menu',
        'footer_menu' => 'Footer Menu',
    ));
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('custom-size', 500, 280, array('center', 'top'));
}

add_action('after_setup_theme', 'theme_set_up');



// custom excerpt
function custom_length_excerpt($word_count_limit){
    $content = wp_strip_all_tags(get_the_content(), true);
    echo wp_trim_words($content, $word_count_limit);
}

// widgets
function mytheme_widgets_init(){
    register_sidebar(array(
        'name'          => __('Facebook Like Plugin'),
        'id'            => 'facebook_like',
        'description'   => __('This Block Will Show in homepage right side')
    ));
}
add_action('widgets_init', 'mytheme_widgets_init');


// Popular Posts
function shapeSpace_popular_posts($post_id){
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

function shapeSpace_track_posts($post_id){
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');

require get_template_directory() . '/inc/update-checker.php';

new ThemeUpdateChecker(
	'GloryNews',  //Theme folder name, AKA "slug". 
	'https://wesoftpress.com/my-theme-update/GloryNews/info.json' //URL of the metadata file.
);


if ( ! function_exists( 'gloryews_lic' ) ) {
    // Create a helper function for easy SDK access.
    function gloryews_lic() {
        global $gloryews_lic;

        if ( ! isset( $gloryews_lic ) ) {
            // Include Freemius SDK.
            require_once get_template_directory() . '/wordpress-sdk/start.php';

            $gloryews_lic = fs_dynamic_init( array(
                'id'                  => '10373',
                'slug'                => 'glorynews-wp-theme',
                'premium_slug'        => 'glorynews-wp-theme-premium',
                'type'                => 'theme',
                'public_key'          => 'pk_82c6077ba8461931c45a94bf18288',
                'is_premium'          => true,
                'is_premium_only'     => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'menu'                => array(
                    'slug'            => 'glorynews-wp-theme',
                    'support'	      => true,
                    'first-path'	  => 'themes.php',
                ),
                // Set the SDK to work in a sandbox mode (for development & testing).
                // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
                'secret_key'          => 'sk_4NN#v3uE$c}?SN^exv=wm3k[g[JQy',
            ) );
        }

        return $gloryews_lic;
    }

    // Init Freemius.
    gloryews_lic();
    // Signal that SDK was initiated.
    do_action( 'gloryews_lic_loaded' );
}


if ( gloryews_lic()->is__premium_only() ) {
    // This IF will be executed only if the user in a trial mode or have a valid license.
    if ( gloryews_lic()->can_use_premium_code() ) {
        // load the Redux framework
        if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/Options/ReduxCore/framework.php')) {
            require_once(dirname(__FILE__) . '/Options/ReduxCore/framework.php');
        }

        if (!isset($redux_owd) && file_exists(dirname(__FILE__) . '/Options/sample/sample-config.php')) {
            require_once(dirname(__FILE__) . '/Options/sample/sample-config.php');
        }
    }
}

function read_more() {
    global $read_more;
    global $wesoftpress;
    if ($wesoftpress['time-switch'] == '1') {
        $read_more = 'আরও পড়ুন';
    } else {
        $read_more = 'Load More';
    };
}
add_action( 'after_setup_theme', 'read_more' );