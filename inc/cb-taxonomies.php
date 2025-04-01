<?php
/**
 * Custom Taxonomies Registration
 *
 * This file contains the code to register custom taxonomies
 * for the WordPress theme "cb-saascada2025".
 *
 * @package cb-saascada2025
 */

/**
 * Registers custom taxonomies for the theme.
 *
 * This function is used to define and register custom taxonomies
 * that are required for the theme's functionality.
 *
 * @return void
 */
function cb_register_taxes() {

    $args = array(
        'label'                 => __( 'Teams', 'cb-saascada' ),
        'labels'                => array(
        	'name'          => __( 'Teams', 'cb-saascada' ),
            'singular_name' => __( 'Team', 'cb-saascada' ),
		),
        'public'                => true,
        'publicly_queryable'    => false,
        'hierarchical'          => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'query_var'             => true,
        'rewrite'               => false,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'show_tagcloud'         => false,
        'rest_base'             => 'apis',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'show_in_quick_edit'    => true,
        'show_in_graphql'       => false,
    );
    register_taxonomy( 'teams', array( 'people' ), $args );

    $args = array(
        'label'                 => __( 'Partner Type', 'cb-saascada' ),
        'labels'                => array(
            'name'          => __( 'Partner Types', 'cb-saascada' ),
            'singular_name' => __( 'Partner Type', 'cb-saascada' ),
		),
        'public'                => true,
        'publicly_queryable'    => false,
        'hierarchical'          => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'query_var'             => true,
        'rewrite'               => false,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'show_tagcloud'         => false,
        'rest_base'             => 'apis',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'show_in_quick_edit'    => true,
        'show_in_graphql'       => false,
	);
    register_taxonomy( 'partner-type', array( 'partners' ), $args );
}
add_action( 'init', 'cb_register_taxes' );
