<?php function get_breadcrumb(){
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
