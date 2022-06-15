<?php
add_action('init', function(){
    add_rewrite_rule( 'posts/([^/]*)?$', 'index.php?posts=$matches[1]', 'top' );
    add_rewrite_rule( 'posts/([^/]+)/page/?([0-9]{1,})/?$', 'index.php?posts=$matches[1]&paged=$matches[2]', 'top' );
});

add_filter( 'query_vars', function( $query_vars ) {
    $query_vars[] = 'posts';
    return $query_vars;
} );

add_action( 'template_include', function( $template ) {
    if ( get_query_var( 'posts' ) == false || get_query_var( 'posts' ) == '' ) {
        return $template;
    }
    return get_template_directory() . '/inc/_all_posts.php';
} );

function get_all_post_page_link(){
    $slug = 'all';
    return site_url('/posts/'. $slug);
}