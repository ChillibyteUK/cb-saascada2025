<?php

function cb_register_post_types() {

$labels = [
    "name" => __( "Partners", "cb-saascada" ),
    "singular_name" => __( "Partner", "cb-saascada" ),
];

$args = [
    "label" => __( "Partners", "cb-saascada" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    // "rewrite" => [ "slug" => "partners", "with_front" => false ],
    "query_var" => true,
    "supports" => [ "title",  "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "partners", $args );

$labels = [
    "name" => __( "People", "cb-saascada" ),
    "singular_name" => __( "Person", "cb-saascada" ),
];

$args = [
    "label" => __( "People", "cb-saascada" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "people", "with_front" => false ],
    "query_var" => true,
    "supports" => [ "title", "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "people", $args );

}

add_action( 'init', 'cb_register_post_types' );

add_action( 'after_switch_theme', 'cb_rewrite_flush' );
function my_rewrite_flush() {
    cb_register_post_types();
    flush_rewrite_rules();
}

