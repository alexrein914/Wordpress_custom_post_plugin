<?php
/**
 * Alex Plugin
 *
 * Plugin Name:       Alex Plugin
 * Plugin URI:        
 * Description:       University
 * Version:           1.0
 * Author:            
 * Author URI:        
 * Update URI:        
 * Text Domain:       
 * Domain Path:       
 * Requires PHP:      7.4
 * Requires at least: 6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function prog_create_custom_post_type() {

  $labels = array(
      'name'          => 'Progs',
      'singular_name' => 'Prog'
  );


  $supports = array(
      'title',
  );

  $args = array(
      'labels'              => $labels,
      'supports'            => $supports,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,   
      'menu_icon'           => true,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
  );

  register_post_type('prog', $args);
}
add_action('init', 'prog_create_custom_post_type');

function add_custom_taxonomies() {
  register_taxonomy('p_name', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Names', 'taxonomy general name' ),
      'singular_name' => _x( 'Name', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Names' ),
      'all_items' => __( 'All Names' ),
      'parent_item' => __( 'Parent Name' ),
      'parent_item_colon' => __( 'Parent Name:' ),
      'edit_item' => __( 'Edit Name' ),
      'update_item' => __( 'Update Name' ),
      'add_new_item' => __( 'Add New Name' ),
      'new_item_name' => __( 'New Name' ),
      'menu_name' => __( 'Names' ),
    ),
    'rewrite' => array(
      'slug' => 'name',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_prog_description', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Categories', 'taxonomy general Program Description' ),
      'singular_name' => _x( 'Category', 'taxonomy singular Program Description' ),
      'search_items' =>  __( 'Search Program Description' ),
      'all_items' => __( 'All Program Description' ),
      'parent_item' => __( 'Parent Program Description' ),
      'parent_item_colon' => __( 'Parent Program Description:' ),
      'edit_item' => __( 'Edit Program Description' ),
      'update_item' => __( 'Update Program Description' ),
      'add_new_item' => __( 'Add New Program Description' ),
      'new_item_name' => __( 'New Program Description' ),
      'menu_name' => __( 'Program Description' ),
    ),
    'rewrite' => array(
      'slug' => 'prog_description',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
  
  register_taxonomy('p_category', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Categories', 'taxonomy general name' ),
      'singular_name' => _x( 'Category', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Categories' ),
      'all_items' => __( 'All Categories' ),
      'parent_item' => __( 'Parent Category' ),
      'parent_item_colon' => __( 'Parent Category:' ),
      'edit_item' => __( 'Edit Category' ),
      'update_item' => __( 'Update Category' ),
      'add_new_item' => __( 'Add New Category' ),
      'new_item_name' => __( 'New Category' ),
      'menu_name' => __( 'Categories' ),
    ),
    'rewrite' => array(
      'slug' => 'category',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_curriculum', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Curriculums', 'taxonomy general name' ),
      'singular_name' => _x( 'Curriculum', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'All Locations' ),
      'edit_item' => __( 'Edit Curriculum' ),
      'update_item' => __( 'Update Curriculum' ),
      'add_new_item' => __( 'Add New Curriculum' ),
      'new_item_name' => __( 'New Curriculum Name' ),
      'menu_name' => __( 'Curriculums' ),
    ),
    'rewrite' => array(
      'slug' => 'curriculum',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_requirements', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Entry Requirements', 'taxonomy general name' ),
      'singular_name' => _x( 'Requirements', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Requirements' ),
      'all_items' => __( 'All Requirements' ),
      'edit_item' => __( 'Edit Requirement' ),
      'update_item' => __( 'Update Requirement' ),
      'add_new_item' => __( 'Add New Requirement' ),
      'new_item_name' => __( 'New Requirement Name' ),
      'menu_name' => __( 'Requirements' ),
    ),
    'rewrite' => array(
      'slug' => 'Requirement',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_duration', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Entry Durations', 'taxonomy general name' ),
      'singular_name' => _x( 'Durations', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Durations' ),
      'all_items' => __( 'All Durations' ),
      'edit_item' => __( 'Edit Duration' ),
      'update_item' => __( 'Update Duration' ),
      'add_new_item' => __( 'Add New Duration' ),
      'new_item_name' => __( 'New Duration Name' ),
      'menu_name' => __( 'Durations' ),
    ),
    'rewrite' => array(
      'slug' => 'Duration',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_opportunities', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Entry Opportunities', 'taxonomy general name' ),
      'singular_name' => _x( 'Opportunities', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Opportunities' ),
      'all_items' => __( 'All Opportunities' ),
      'edit_item' => __( 'Edit Opportunity' ),
      'update_item' => __( 'Update Opportunity' ),
      'add_new_item' => __( 'Add New Opportunity' ),
      'new_item_name' => __( 'New Opportunity Name' ),
      'menu_name' => __( 'Opportunities' ),
    ),
    'rewrite' => array(
      'slug' => 'Opportunity',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_tuition', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Entry Tuition', 'taxonomy general name' ),
      'singular_name' => _x( 'Tuition', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Tuition' ),
      'all_items' => __( 'All Tuition' ),
      'edit_item' => __( 'Edit Tuition' ),
      'update_item' => __( 'Update Tuition' ),
      'add_new_item' => __( 'Add New Tuition' ),
      'new_item_name' => __( 'New Tuition Name' ),
      'menu_name' => __( 'Tuition' ),
    ),
    'rewrite' => array(
      'slug' => 'Tuition',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_process', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Entry Process', 'taxonomy general name' ),
      'singular_name' => _x( 'Process', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Process' ),
      'all_items' => __( 'All Process' ),
      'edit_item' => __( 'Edit Process' ),
      'update_item' => __( 'Update Process' ),
      'add_new_item' => __( 'Add New Process' ),
      'new_item_name' => __( 'New Process Name' ),
      'menu_name' => __( 'Process' ),
    ),
    'rewrite' => array(
      'slug' => 'Process',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_testinomials', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Entry Testinomials', 'taxonomy general name' ),
      'singular_name' => _x( 'Testinomials', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Testinomials' ),
      'all_items' => __( 'All Testinomials' ),
      'edit_item' => __( 'Edit Testinomials' ),
      'update_item' => __( 'Update Testinomials' ),
      'add_new_item' => __( 'Add New Testinomials' ),
      'new_item_name' => __( 'New Testinomials Name' ),
      'menu_name' => __( 'Testinomials' ),
    ),
    'rewrite' => array(
      'slug' => 'Testinomials',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_accrediation', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Entry Accrediation', 'taxonomy general name' ),
      'singular_name' => _x( 'Accrediation', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Accrediation' ),
      'all_items' => __( 'All Accrediation' ),
      'edit_item' => __( 'Edit Accrediation' ),
      'update_item' => __( 'Update Accrediation' ),
      'add_new_item' => __( 'Add New Accrediation' ),
      'new_item_name' => __( 'New Accrediation Name' ),
      'menu_name' => __( 'Accrediation' ),
    ),
    'rewrite' => array(
      'slug' => 'Accrediation',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_university_name', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Categories', 'taxonomy general University name' ),
      'singular_name' => _x( 'Category', 'taxonomy singular University name' ),
      'search_items' =>  __( 'Search University name' ),
      'all_items' => __( 'All University name' ),
      'parent_item' => __( 'Parent University name' ),
      'parent_item_colon' => __( 'Parent University name:' ),
      'edit_item' => __( 'Edit University name' ),
      'update_item' => __( 'Update University name' ),
      'add_new_item' => __( 'Add New University name' ),
      'new_item_name' => __( 'New University name' ),
      'menu_name' => __( 'University name' ),
    ),
    'rewrite' => array(
      'slug' => 'university_name',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_university_major', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Majors', 'taxonomy general name' ),
      'singular_name' => _x( 'Major', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Majors' ),
      'all_items' => __( 'All Majors' ),
      'parent_item' => __( 'Parent Major' ),
      'parent_item_colon' => __( 'Parent Major:' ),
      'edit_item' => __( 'Edit Major' ),
      'update_item' => __( 'Update Major' ),
      'add_new_item' => __( 'Add New Major' ),
      'new_item_name' => __( 'New Major Name' ),
      'menu_name' => __( 'Majors' ),
    ),
    'rewrite' => array(
      'slug' => 'major',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));

  register_taxonomy('p_university_location', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Locations', 'taxonomy general name' ),
      'singular_name' => _x( 'Location', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'All Locations' ),
      'parent_item' => __( 'Parent Location' ),
      'parent_item_colon' => __( 'Parent Location:' ),
      'edit_item' => __( 'Edit Location' ),
      'update_item' => __( 'Update Location' ),
      'add_new_item' => __( 'Add New Location' ),
      'new_item_name' => __( 'New Location Name' ),
      'menu_name' => __( 'Locations' ),
    ),
    'rewrite' => array(
      'slug' => 'locations',
      'with_front' => false,
      'hierarchical' => true
    )
  ));

  register_taxonomy('p_university_description', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Descriptions', 'taxonomy general name' ),
      'singular_name' => _x( 'Description', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'All Locations' ),
      'edit_item' => __( 'Edit Description' ),
      'update_item' => __( 'Update Description' ),
      'add_new_item' => __( 'Add New Description' ),
      'new_item_name' => __( 'New Description Name' ),
      'menu_name' => __( 'Descriptions' ),
    ),
    'rewrite' => array(
      'slug' => 'description',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
  
  register_taxonomy('p_university_contact_info', 'prog', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Categories', 'taxonomy general Contact Info' ),
      'singular_name' => _x( 'Category', 'taxonomy singular Contact Info' ),
      'search_items' =>  __( 'Search Contact Info' ),
      'all_items' => __( 'All Contact Info' ),
      'parent_item' => __( 'Parent Contact Info' ),
      'parent_item_colon' => __( 'Parent Contact Info:' ),
      'edit_item' => __( 'Edit Contact Info' ),
      'update_item' => __( 'Update Contact Info' ),
      'add_new_item' => __( 'Add New Contact Info' ),
      'new_item_name' => __( 'New Contact Info' ),
      'menu_name' => __( 'Contact Info' ),
    ),
    'rewrite' => array(
      'slug' => 'contact_info',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

function alex_university_widgets_dependencies() {
	wp_register_script( 'alex-university-script', plugins_url( 'assets/js/widget-script.js', __FILE__ ) );
	wp_register_style( 'alex-university-style', plugins_url( 'assets/css/widget-style.css', __FILE__ ) );
}
function alex_program_widgets_dependencies() {
	wp_register_script( 'alex-program-script', plugins_url( 'assets/js/widget-script.js', __FILE__ ) );
	wp_register_style( 'alex-program-style', plugins_url( 'assets/css/program-widget-style.css', __FILE__ ) );
}
function alex_program_info_widgets_dependencies() {
	wp_register_script( 'alex-program-info-script', plugins_url( 'assets/js/widget-script.js', __FILE__ ) );
	wp_register_style( 'alex-program-info-style', plugins_url( 'assets/css/widget-style.css', __FILE__ ) );
}


add_action( 'wp_enqueue_scripts', 'alex_university_widgets_dependencies' );
add_action( 'wp_enqueue_scripts', 'alex_program_widgets_dependencies' );
add_action( 'wp_enqueue_scripts', 'alex_program_info_widgets_dependencies' );


function register_alex_university_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/alex-university-widget.php' );

	$widgets_manager->register( new \Elementor_Alex_University_Widget() );

}
function register_alex_program_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/alex-program-widget.php' );

	$widgets_manager->register( new \Elementor_Alex_Program_Widget() );

}
function register_alex_program_info_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/alex-program-info-widget.php' );

	$widgets_manager->register( new \Elementor_Alex_Program_Info_Widget() );

}
add_action( 'elementor/widgets/register', 'register_alex_university_widget' );
add_action( 'elementor/widgets/register', 'register_alex_program_widget' );
add_action( 'elementor/widgets/register', 'register_alex_program_info_widget' );