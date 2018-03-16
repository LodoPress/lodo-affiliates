<?php
/**
 * Plugin Name:     LodoAffiliates
 * Description:     Affiliate CPT & Taxonomy
 * Author:          LodoPress
 * Text Domain:     lodo-affiliates
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Lodo_Affiliates
 */


function affiliate_init() {
	register_post_type( 'affiliate', array(
		'labels'            => array(
			'name'                => __( 'Affiliates', 'lodo-affiliates' ),
			'singular_name'       => __( 'Affiliate', 'lodo-affiliates' ),
			'all_items'           => __( 'All Affiliates', 'lodo-affiliates' ),
			'new_item'            => __( 'New Affiliate', 'lodo-affiliates' ),
			'add_new'             => __( 'Add New', 'lodo-affiliates' ),
			'add_new_item'        => __( 'Add New Affiliate', 'lodo-affiliates' ),
			'edit_item'           => __( 'Edit Affiliate', 'lodo-affiliates' ),
			'view_item'           => __( 'View Affiliate', 'lodo-affiliates' ),
			'search_items'        => __( 'Search Affiliates', 'lodo-affiliates' ),
			'not_found'           => __( 'No Affiliates Found', 'lodo-affiliates' ),
			'not_found_in_trash'  => __( 'No Affiliates Found in Trash', 'lodo-affiliates' ),
			'parent_item_colon'   => __( 'Parent Affiliate', 'lodo-affiliates' ),
			'menu_name'           => __( 'Affiliates', 'lodo-affiliates' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'affiliate',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'affiliate_init' );

function affiliate_type_init() {
	register_taxonomy( 'affiliate-type', array( 'affiliate' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Affiliate Types', 'lodo-affiliates' ),
			'singular_name'              => _x( 'Affiliate Type', 'taxonomy general name', 'lodo-affiliates' ),
			'search_items'               => __( 'Search Affiliate Types', 'lodo-affiliates' ),
			'popular_items'              => __( 'Popular Affiliate Types', 'lodo-affiliates' ),
			'all_items'                  => __( 'All Affiliate Types', 'lodo-affiliates' ),
			'parent_item'                => __( 'Parent Affiliate Type', 'lodo-affiliates' ),
			'parent_item_colon'          => __( 'Parent Affiliate Type:', 'lodo-affiliates' ),
			'edit_item'                  => __( 'Edit Affiliate Type', 'lodo-affiliates' ),
			'update_item'                => __( 'Update Affiliate Type', 'lodo-affiliates' ),
			'add_new_item'               => __( 'New Affiliate Type', 'lodo-affiliates' ),
			'new_item_name'              => __( 'New Affiliate Type', 'lodo-affiliates' ),
			'separate_items_with_commas' => __( 'Separate Affiliate Types with commas', 'lodo-affiliates' ),
			'add_or_remove_items'        => __( 'Add or Remove Affiliate Types', 'lodo-affiliates' ),
			'choose_from_most_used'      => __( 'Choose from the most used affiliate types', 'lodo-affiliates' ),
			'not_found'                  => __( 'No Affiliate Types Found.', 'lodo-affiliates' ),
			'menu_name'                  => __( 'Affiliate Types', 'lodo-affiliates' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'affiliate-type',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'affiliate_type_init' );
