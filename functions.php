<?php
function theme_resources()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fontawesome/css/all.css');
    wp_enqueue_style('bootstarp', get_template_directory_uri() . '/inc/bootstrap.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css');
    wp_enqueue_style('flex_slider_style', get_template_directory_uri() . '/inc/flexslider.css');
    wp_enqueue_script('script_flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), null, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
    wp_enqueue_script('jquery', get_template_directory_uri() . './js/jquery-3.4.1.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'theme_resources');


function theme_set_up()
{
    register_nav_menus(array(
        'header_menu' => 'Header Menu',
        'header_mobile_menu' => 'Header Mobile Menu',
        'footer_menu' => 'Footer Menu',
    ));
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('custom-size', 500, 280, array('center', 'top'));
}

add_action('after_setup_theme', 'theme_set_up');


add_action('after_switch_theme', 'create_page_on_theme_activation');

function create_page_on_theme_activation()
{
    // Pge one
    $new_page_title_one     = __('সব খবর', 'text-domain');
    $new_page_content_one   = '';
    $new_page_template_one  = 'page-all-post.php';
    $page_check_one = get_page_by_title($new_page_title_one);
    // Store the above data in an array
    $new_page_one = array(
        'post_type'     => 'page',
        'post_title'    => $new_page_title_one,
        'post_content'  => $new_page_content_one,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'all-posts'
    );
    // If the page doesn't already exist, create it
    if (!isset($page_check_one->ID)) {
        $new_page_id_one = wp_insert_post($new_page_one);
        if (!empty($new_page_template_one)) {
            update_post_meta($new_page_id_one, '_wp_page_template', $new_page_template_one);
        }
    }
}


// load the Redux framework
if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/Options/ReduxCore/framework.php')) {
    require_once(dirname(__FILE__) . '/Options/ReduxCore/framework.php');
}

if (!isset($redux_owd) && file_exists(dirname(__FILE__) . '/Options/sample/sample-config.php')) {
    require_once(dirname(__FILE__) . '/Options/sample/sample-config.php');
}

// custom excerpt
function custom_length_excerpt($word_count_limit)
{
    $content = wp_strip_all_tags(get_the_content(), true);
    echo wp_trim_words($content, $word_count_limit);
}

// widgets
function mytheme_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Facebook Like Plugin'),
        'id'            => 'facebook_like',
        'description'   => __('This Block Will Show in homepage right side')
    ));
}
add_action('widgets_init', 'mytheme_widgets_init');


// Popular Posts
function shapeSpace_popular_posts($post_id)
{
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
function shapeSpace_track_posts($post_id)
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');



/* --------------Photo Gallary Customs Post Register----------------- */
function create_posttype()
{
    register_post_type(
        'photogallery',
        array(
            'labels' => array(
                'name' => __('Photo gallery'),
                'singular_name' => __('photogallery')
            ),
            'public' => true,
            'menu_position'       => 5,
            'supports'            => array('editor', 'title', 'thumbnail',),
            'has_archive' => true,
            'rewrite' => array('slug' => 'photogallery'),
            'taxonomies'  => array('photogallery', 'photogallery-category'),
        )
    );
}
add_action('init', 'create_posttype');

//Create category for Photo post type
function tr_create_my_taxonomy()
{
    register_taxonomy(
        'photogallery-categories',
        'photogallery',
        array(
            'label' => __('Photogallery Categories'),
            'rewrite' => array('slug' => 'photogallery-category'),
            'hierarchical' => true,
            'has_archive' => true
        )
    );
}
add_action('init', 'tr_create_my_taxonomy');




/* --------------Video Gallary  Customs Post Register----------------- */

function create__video_posttype()
{
    register_post_type(
        'videogallery',
        array(
            'labels' => array(
                'name' => __('Video gallery'),
                'singular_name' => __('videogallery')
            ),
            'public' => true,
            'menu_position'       => 5,
            'supports'            => array('title', 'thumbnail',),
            'has_archive' => true,
            'rewrite' => array('slug' => 'videogallery'),
            'taxonomies'  => array('videogallery', 'videogallery-category'),
        )
    );
}
add_action('init', 'create__video_posttype');
//Create category for Video post type
function tr_create_my_video_taxonomy()
{
    register_taxonomy(
        'videogallery-categories',
        'videogallery',
        array(
            'label' => __('Videogallery Categories'),
            'rewrite' => array('slug' => 'videogallery-category'),
            'hierarchical' => true,
            'has_archive' => true
        )
    );
}
add_action('init', 'tr_create_my_video_taxonomy');

//Add Custom Metabox
function diwp_custom_metabox()
{

    add_meta_box('diwp-metabox', 'Youtube Video ID', 'diwp_custom_metabox_callback', 'videogallery', 'normal');
}

add_action('add_meta_boxes', 'diwp_custom_metabox');


function diwp_custom_metabox_callback()
{
    global $post;
?>
    <div class="row">
        <div class="label">Like: www.youtube.com/watch?v=hhNctIlXVsw...just Put"puthhNctIlXVsw" without ""</div>
        <div class="fields">
            <input type="text" name="_diwp_reading_time" value="<?php echo get_post_meta($post->ID, 'post_reading_time', true) ?>" />
        </div>
    </div>
    <?php

}

function diwp_save_custom_metabox()
{

    global $post;

    if (isset($_POST["_diwp_reading_time"])) :

        update_post_meta($post->ID, 'post_reading_time', $_POST["_diwp_reading_time"]);

    endif;
}

add_action('save_post', 'diwp_save_custom_metabox');

// To Support Custom Post Format iN dIffernetn Templae

// function namespace_add_custom_types($query)
// {
//     if (is_single() || is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
//         $query->set('post_type', array(
//             'post', 'nav_menu_item', 'photogallery','videogallery'
//         ));
//         return $query;
//     }
// }
// add_filter('pre_get_posts', 'namespace_add_custom_types');


function get_breadcrumb()
{
    echo '<a href="' . home_url() . '" rel="nofollow"><i style="color: #a94442;" class="fa fa-home"></i></a>';
    if (is_category()) {

        echo "<b>&nbsp;&nbsp;/&nbsp;&nbsp;</b>";
        $categories = get_queried_object();
        $category_id_cat = $categories->term_id;
        echo '<a href="' . get_category_link($category_id_cat) . '">' . get_the_category_by_id($category_id_cat) . '</a>';
    } elseif (is_single()) {
        echo "<b>&nbsp;&nbsp;/&nbsp;&nbsp;</b>";
        $categories = get_the_category();
        $category_id = $categories[0]->cat_ID;
        $child = get_category($category_id);
        $parent = $child->parent;
        if ($parent) {
            $parent_name = get_category($parent);
            $parent_cat = $parent_name->cat_ID;
            echo '<a href="' . get_category_link($parent_cat) . '">' . get_the_category_by_id($parent_cat) . '</a>';
        } else {
            echo '<a href="' . get_category_link($category_id) . '">' . get_the_category_by_id($category_id) . '</a>';
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search photogallery for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

function wcr_share_buttons()
{
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

    include(locate_template('inc/share-template.php', false, false));
}

require get_template_directory() . '/inc/ajax.php';
require_once('inc/location_functions.php');