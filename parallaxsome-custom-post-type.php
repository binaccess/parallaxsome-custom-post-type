<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 * Plugin Name: Parallaxsome Custom Post Types
 * Plugin URI: 
 * Description: The Plugin Creates a custom post types for blogs and teams.
 * Author: Access Keys
 * Author URI:  http://accesspressthemes.com/
 * Version: 1.0.0
 * Text Domain: parallaxsome-custom-post-type
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/** Registering Post Type for Team **/

function parallaxsome_add_post_type_team(){
    register_post_type('team_type',array(
        'labels' => array(
            'name' => esc_html__( 'Teams','parallaxsome-custom-post-type' ),
            'singular_name' => esc_html__( 'Team','parallaxsome-custom-post-type' )
        ),
        'description'   => 'Posts For Team Member',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title','editor','thumbnail'),
        'has_archive'   => true,
        'menu_icon' => 'dashicons-groups',
        'publicly_queryable'  => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
    )
 ); 
}

add_action('init','parallaxsome_add_post_type_team');

/** Registering post type for blog **/

function parallaxsome_add_post_type_blog(){
    register_post_type( 'our_blog',array(
      'labels' => array(
        'name' => esc_html__( 'Blogs','parallaxsome-custom-post-type' ),
        'singular_name' => esc_html__( 'blog','parallaxsome-custom-post-type' )
      ),
        'description'   => 'Posts For Blogs',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title','editor','thumbnail','comments'),
        'has_archive'   => true,
        'menu_icon' => 'dashicons-edit',
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        
    )
  );
  $labels = array(
        'name'              => esc_html__( 'Blog Categories', 'parallaxsome-custom-post-type' ),
        'singular_name'     => esc_html__( 'Blogs Category', 'parallaxsome-custom-post-type' ),
        'search_items'      => esc_html__( 'Search Blog Categories', 'parallaxsome-custom-post-type' ),
        'all_items'         => esc_html__( 'All Blog Categories', 'parallaxsome-custom-post-type' ),
        'parent_item'       => esc_html__( 'Parent Blog Category', 'parallaxsome-custom-post-type' ),
        'parent_item_colon' => esc_html__( 'Parent Blog Category:', 'parallaxsome-custom-post-type' ),
        'edit_item'         => esc_html__( 'Edit Blogs Category', 'parallaxsome-custom-post-type' ),
        'update_item'       => esc_html__( 'Update Blogs Category', 'parallaxsome-custom-post-type' ),
        'add_new_item'      => esc_html__( 'Add New Blogs Category', 'parallaxsome-custom-post-type' ),
        'new_item_name'     => esc_html__( 'New Blogs Category', 'parallaxsome-custom-post-type' ),
        'menu_name'         => esc_html__( 'Blogs Categories', 'parallaxsome-custom-post-type' ),
        
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        
    );
    register_taxonomy( 'blog-category', 'our_blog', $args );
}

 add_action('init','parallaxsome_add_post_type_blog');

 /** Making Plugin Translation Ready **/
function load_text_domain() {
    load_plugin_textdomain('parallaxsome-custom-post-type', false, basename(dirname(__FILE__)) . '/languages');
}

 add_action('init', 'load_text_domain');