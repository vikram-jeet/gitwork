<?php

if( !class_exists('CentireThemeOptionPage') ) {

	/**
	 * Class CentireThemeOptionPage
	 *
	 * Theme core functions here
	 */
	class CentireThemeOptionPage {

		function __construct() {

			if( function_exists('acf_add_options_page') ) {

				acf_add_options_page(array(
					'page_title' 	=> 'HHW Settings',
					'menu_title'	=> 'HHW Settings',
					'menu_slug' 	=> 'hhw-general-settings',
					'capability'	=> 'edit_posts',
					'redirect'		=> false
				));

				acf_add_options_sub_page(array(
					'page_title' 	=> 'Home Page',
					'menu_title'	=> 'Home',
					'parent_slug'	=> 'hhw-general-settings',
				));

				acf_add_options_sub_page(array(
					'page_title' 	=> 'Archive Page',
					'menu_title'	=> 'Archive',
					'parent_slug'	=> 'hhw-general-settings',
				));



				acf_add_options_sub_page(array(
					'page_title' 	=> 'Current Openings',
					'menu_title'	=> 'Current Openings',
					'parent_slug'	=> 'hhw-general-settings',
				));

				acf_add_options_sub_page(array(
					'page_title' 	=> 'Footer Settings',
					'menu_title'	=> 'Footer',
					'parent_slug'	=> 'hhw-general-settings',
				));

				acf_add_options_sub_page(array(
					'page_title' 	=> 'Other',
					'menu_title'	=> 'Other',
					'parent_slug'	=> 'others-general-settings',
				));

			}
		}
	}


	add_action('acf/init', function () {
		new CentireThemeOptionPage();
	});
}

