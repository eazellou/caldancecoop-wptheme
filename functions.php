<?php
function my_theme_enqueue_styles() {

    $parent_style = 'ashe-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// // order lists of events from newest to oldest
// add_filter('posts_orderby','my_eventorganiser_sort_events',20,2);
// function my_eventorganiser_sort_events( $orderby, $query ){
//     global $wpdb;
//     if( empty($query->query_vars['orderby']) ){
//         if( eventorganiser_is_event_query( $query, true ) ){
//             $orderby = " {$wpdb->eo_events}.StartDate DESC, {$wpdb->eo_events}.StartTime DESC";
//         }
//     }
//     return $orderby;
// }

?>