<?php

if ( ! class_exists( 'CentirePostTypes' ) ) {

	/**
	 * Class CentirePostTypes
	 *
	 * Register Post types
	 */
	class CentirePostTypes{

		function __construct() {

			add_action('after_setup_theme',[$this, 'register_post_types_and_register_taxonomy']);
		}

		public function register_post_types_and_register_taxonomy() {

			$this->register_facility_post_type();
			$this->register_testimonial_post_type();
			$this->register_facility_category();
		}

		function register_facility_post_type() {
			$labels = array(
				'name'               => _x( 'Facilities', 'post type general name', 'hendragym' ),
				'singular_name'      => _x( 'Facility', 'post type singular name', 'hendragym' ),
				'menu_name'          => _x( 'Facilities', 'admin menu', 'hendragym' ),
				'name_admin_bar'     => _x( 'Facility', 'add new on admin bar', 'hendragym' ),
				'add_new'            => _x( 'Add New', 'facility', 'hendragym' ),
				'add_new_item'       => __( 'Add New Facility', 'hendragym' ),
				'new_item'           => __( 'New Facility', 'hendragym' ),
				'edit_item'          => __( 'Edit Facility', 'hendragym' ),
				'view_item'          => __( 'View Facility', 'hendragym' ),
				'all_items'          => __( 'All Facilities', 'hendragym' ),
				'search_items'       => __( 'Search Facilities', 'hendragym' ),
				'parent_item_colon'  => __( 'Parent Facilities:', 'hendragym' ),
				'not_found'          => __( 'No facility found.', 'hendragym' ),
				'not_found_in_trash' => __( 'No facility found in Trash.', 'hendragym' )
			);

			$args = array(
				'labels'             => $labels,
				'description'        => __( 'Description.', 'hendragym' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'classes' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor','page-attributes')
			);

			register_post_type( 'hhw_facility', $args );
		}
		function register_testimonial_post_type() {
			$labels = array(
				'name'               => _x( 'Testimonials', 'post type general name', 'hendragym' ),
				'singular_name'      => _x( 'Testimonial', 'post type singular name', 'hendragym' ),
				'menu_name'          => _x( 'Testimonials', 'admin menu', 'hendragym' ),
				'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'hendragym' ),
				'add_new'            => _x( 'Add New', 'testimonial', 'hendragym' ),
				'add_new_item'       => __( 'Add New Testimonial', 'hendragym' ),
				'new_item'           => __( 'New Testimonial', 'hendragym' ),
				'edit_item'          => __( 'Edit Testimonial', 'hendragym' ),
				'view_item'          => __( 'View Testimonial', 'hendragym' ),
				'all_items'          => __( 'All Testimonials', 'hendragym' ),
				'search_items'       => __( 'Search Testimonials', 'hendragym' ),
				'parent_item_colon'  => __( 'Parent Testimonials:', 'hendragym' ),
				'not_found'          => __( 'No testimonial found.', 'hendragym' ),
				'not_found_in_trash' => __( 'No testimonial found in Trash.', 'hendragym' )
			);

			$args = array(
				'labels'             => $labels,
				'description'        => __( 'Description.', 'hendragym' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'testimonial' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor')
			);

			register_post_type( 'hhw_testimonial', $args );
		}

		function register_facility_category() {
			// Add new taxonomy, make it hierarchical (like categories)
			$labels = array(
				'name'              => _x( 'Categories', 'taxonomy general name', 'hendragym' ),
				'singular_name'     => _x( 'Category', 'taxonomy singular name', 'hendragym' ),
				'search_items'      => __( 'Search Categories', 'hendragym' ),
				'all_items'         => __( 'All Categories', 'hendragym' ),
				'parent_item'       => __( 'Parent Category', 'hendragym' ),
				'parent_item_colon' => __( 'Parent Category:', 'hendragym' ),
				'edit_item'         => __( 'Edit Category', 'hendragym' ),
				'update_item'       => __( 'Update Category', 'hendragym' ),
				'add_new_item'      => __( 'Add New Category', 'hendragym' ),
				'new_item_name'     => __( 'New Category Name', 'hendragym' ),
				'menu_name'         => __( 'Category', 'hendragym' ),
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'class' ),
			);

			register_taxonomy( 'hhw_facility_category', array( 'hhw_facility' ), $args );
		}
	}

	new CentirePostTypes();
}

