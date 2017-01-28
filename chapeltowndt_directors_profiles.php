<?php
/**
 * @package Chapeltowndt directors profiles
 * @version 1.0
 */
/*
Plugin Name: Chapeltowndt directors profiles
Plugin URI: http://suesdesign.co.uk/
Description: List of directors profiles for Chapeltown Development Trust
Author: Sue Johnson
Version: 1.0
Author URI: http://suesdesign.co.uk/
Project: http://chapeltowndt.org.uk/directors-profiles/
Dependencies: Advanced Custom Fields https://www.advancedcustomfields.com/
*/

/*
 * register custom post type
*/
add_action( 'init', 'cdt_directors_register_post_type' );

function cdt_directors_register_post_type() {
	$labels = array( 
		'name' => 'Directors profiles',
		'singular name' => 'Directors profile',
		'add_new' => 'Add new directors profile',
		'add_new_item' => 'Add new directors profile',
		'edit_item' => 'Edit directors profile',
		'new_item' => 'New directors profile',
		'all_items' => 'All directors profiles',
		'view_item' => 'View directors profiles',
		'search_items' => 'Search directors profiles',
		'not_found' => 'No directors profiles',
		'not_found_in_trash' => 'No directors profiles found in trash'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has archive' => true,
		'supports' => array( 'title', 'author', 'thumbnail' )
	);
	
	register_post_type( 'cdt_directors', $args );
	}
	

/*
 * Get template from theme, if not in theme get template from plugin
*/	
add_filter( 'template_include', 'include_template_function', 1 );

function include_template_function( $template_path ) {
   
	if ( is_page('directors-profiles') ) {
	// checks if the file exists in the theme first,
	// otherwise serve the file from the plugin
		if ( $theme_file = locate_template( array ( 'page-directors_profiles.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path( __FILE__ ) . '/templates/page-directors_profiles.php';
			}
	}
   
	return $template_path;
}
