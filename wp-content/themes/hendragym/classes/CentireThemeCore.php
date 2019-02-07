<?php

if( !class_exists('CentireThemeCore') ) {

	/**
	 * Class CentireThemeCore
	 *
	 * Theme core functions here
	 */
	class CentireThemeCore {

		function __construct() {

			add_action('after_setup_theme',[$this, 'theme_setup']);
			add_action( 'wp_enqueue_scripts', [ $this, 'add_style_scripts' ] );

		}

		function theme_setup() {

			// Add theme support
			add_theme_support( 'title-tag' );
			add_theme_support( 'custom-logo' );

			$this->register_nav_menu_areas();
		}

		function register_nav_menu_areas() {
			// Register theme menu locations
			register_nav_menus(
				array(
					'main-menu' => __( 'Main Menu', 'hendragym' ),
					'footer-menu' => __( 'Footer Menu', 'hendragym' ),
				)
			);
		}

		function add_style_scripts() {

			wp_enqueue_style( 'hendragym-flexslider-style', get_theme_file_uri( '/assets/style/flexslider.css' ) );
			wp_enqueue_style( 'hendragym-slick-style', get_theme_file_uri( '/assets/style/slick.css' ) );
			wp_enqueue_style( 'hendragym-slick-theme-style', get_theme_file_uri( '/assets/style/slick-theme.css' ), ['hendragym-slick-style'] );
			wp_enqueue_style( 'hendragym-flexslider-style', get_theme_file_uri( '/assets/style/flexslider.css' ) );
			wp_enqueue_style( 'hendragym-style', get_theme_file_uri( '/assets/style/style.css' ) );
			wp_enqueue_style( 'hendragym-main-style', get_theme_file_uri( '/style.css' ), array(
				'hendragym-style',
				'hendragym-flexslider-style'
			) );

			wp_enqueue_script( 'hendragym-flexslider-js', get_theme_file_uri( '/assets/js/jquery.flexslider.js' ), array( 'jquery' ), null, true );
			wp_enqueue_script( 'hendragym-slick-js', get_theme_file_uri( '/assets/js/slick.js' ), array( 'jquery','hendragym-flexslider-js' ), null, true );
			wp_enqueue_script( 'hendragym-common-js', get_theme_file_uri( '/assets/js/common.js' ), array(
				'jquery',
				'hendragym-flexslider-js'
			), null, true );

		}
	}

	new CentireThemeCore();
}

