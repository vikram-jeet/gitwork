<?php

if( !class_exists('CentireThemeCustomize') ) {

	/**
	 * Class CentireThemeCustomize
	 *
	 * Theme core functions here
	 */
	class CentireThemeCustomize {


		function __construct() {
			add_action( 'customize_register', [$this,'register_all_customizations'] );
		}


		/**
		 * Register all customization
		 * @param $wp_customize
		 *
		 */
		public function register_all_customizations($wp_customize) {

			// Logo customization
			$this->logo2x($wp_customize);

			// Social share icons
			$this->social_share($wp_customize);
		}


	    public function logo2x($wp_customize) {

			//Site Logo
			$wp_customize->add_setting( 'custom2x_logo' );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,'custom2x_logo',array(
						'label' => 'Logo 2x',
						'section' => 'title_tagline',
						'settings' => 'custom2x_logo',
						'priority' => 9
					)
				)
			);
		}

		public function social_share($wp_customize) {

			// Social share icon
			$wp_customize->add_section( 'hendragym_social_share' , array(
				'title'      => __( 'Social', 'hendragym' ),
				'priority'   => 30,
			));

			// Facebook page URL
			$wp_customize->add_setting( 'hendragym_facebook_page', array(
				'capability' => 'edit_theme_options',
			));
			$wp_customize->add_control( 'hendragym_facebook_page', array(
				'type' => 'text',
				'section' => 'hendragym_social_share',
				'label' => __( 'Facebook Page URL' ),
			));

			// Instagram profile URL
			$wp_customize->add_setting( 'hendragym_instagram_profile_url', array(
				'capability' => 'edit_theme_options',
			));
			$wp_customize->add_control( 'hendragym_instagram_profile_url', array(
				'type' => 'text',
				'section' => 'hendragym_social_share',
				'label' => __( 'Instagram Profile URL' ),
			));

			// Email address
			$wp_customize->add_setting( 'hendragym_show_email_address', array(
				'capability' => 'edit_theme_options',
			));
			$wp_customize->add_control( 'hendragym_show_email_address', array(
				'type' => 'text',
				'section' => 'hendragym_social_share',
				'label' => __( 'Email' ),
				'description' => __( 'Enter email address'),
			));


			// Call Button
			$wp_customize->add_setting( 'hendragym_show_call_number', array(
				'capability' => 'edit_theme_options',
			));
			$wp_customize->add_control( 'hendragym_show_call_number', array(
				'type' => 'text',
				'section' => 'hendragym_social_share',
				'label' => __( 'Calling number' ),
				'description' => __( 'It will effect if show call is checked'),
			));

			// Enable facebook show in sticky
			$wp_customize->add_setting( 'hendragym_show_facebook', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => [$this,'sanitize_checkbox'],
			));

			$wp_customize->add_control( 'hendragym_show_facebook', array(
				'type' => 'checkbox',
				'section' => 'hendragym_social_share',
				'label' => __( 'Is Facebook show in Sticky' ),
				'description' => __( 'Checked to show Facebook in sticky buttons' ),
			));

			// Enable instgaram show in sticky
			$wp_customize->add_setting( 'hendragym_show_instagram', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => [$this,'sanitize_checkbox'],
			) );
			$wp_customize->add_control( 'hendragym_show_instagram', array(
				'type' => 'checkbox',
				'section' => 'hendragym_social_share',
				'label' => __( 'Is Instagram show sticky' ),
				'description' => __( 'Checked to show Instagram icon into sticky button' ),
			));

			// Enable Email to show in sticky
			$wp_customize->add_setting( 'hendragym_show_email', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => [$this,'sanitize_checkbox'],
			) );
			$wp_customize->add_control( 'hendragym_show_email', array(
				'type' => 'checkbox',
				'section' => 'hendragym_social_share',
				'label' => __( 'Is Email show sticky' ),
				'description' => __( 'Checked to show email icon into sticky button' ),
			));


			// Enable Calling option to show in sticky
			$wp_customize->add_setting( 'hendragym_show_call', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => [$this,'sanitize_checkbox'],
			));
			$wp_customize->add_control( 'hendragym_show_call', array(
				'type' => 'checkbox',
				'section' => 'hendragym_social_share',
				'label' => __( 'Show Call' ),
				'description' => __( 'Checked to show Call icon into sticky buttons' ),
			));

		}

		public function sanitize_checkbox( $checked ) {

			// Boolean check.
			return ( ( isset( $checked ) && true == $checked ) ? true : false );

		}

	}

	new CentireThemeCustomize();
}