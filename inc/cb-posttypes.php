<?php
/**
 * Custom Post Types Registration
 *
 * This file contains the code to register custom post types
 * for the theme, including "Partners" and "People".
 *
 * @package cb-saascada2025
 */

/**
 * Registers custom post types for the theme.
 *
 * This function defines and registers the "Partners" and "People" post types
 * with their respective labels, arguments, and settings.
 */
function cb_register_post_types() {

	$labels = array(
		'name'          => __( 'Partners', 'cb-saascada' ),
		'singular_name' => __( 'Partner', 'cb-saascada' ),
	);

	$args = array(
		'label'                 => __( 'Partners', 'cb-saascada' ),
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_base'             => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => false,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'delete_with_user'      => false,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'query_var'             => true,
		'supports'              => array( 'title', 'thumbnail' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'partners', $args );

	$labels = array(
		'name'          => __( 'People', 'cb-saascada' ),
		'singular_name' => __( 'Person', 'cb-saascada' ),
	);

	$args = array(
		'label'                 => __( 'People', 'cb-saascada' ),
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_base'             => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'delete_with_user'      => false,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => array(
			'slug'       => 'people',
			'with_front' => false,
		),
		'query_var'             => true,
		'supports'              => array( 'title', 'thumbnail' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'people', $args );
}

add_action( 'init', 'cb_register_post_types' );

/**
 * Flushes rewrite rules after registering custom post types.
 *
 * This function ensures that the rewrite rules are properly flushed
 * whenever the theme is switched, so that the custom post types
 * are correctly registered and accessible.
 */
function cb_rewrite_flush() {
	cb_register_post_types();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'cb_rewrite_flush' );
