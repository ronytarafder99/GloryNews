<?php function create__video_posttype(){
    register_post_type(
        'videogallery',
        array(
            'labels' => array(
                'name' => __('Video gallery'),
                'singular_name' => __('videogallery')
            ),
            'public' => true,
            'menu_position'       => 5,
            'supports'            => array('title', 'thumbnail', 'editor'),
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
        <input type="text" name="_diwp_reading_time"
            value="<?php echo get_post_meta($post->ID, 'post_reading_time', true) ?>" />
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