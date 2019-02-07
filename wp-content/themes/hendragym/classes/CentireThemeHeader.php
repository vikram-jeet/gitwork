<?php

if( !class_exists('CentireThemeHeader') ) {

	/**
	 * Class CentireThemeHeader
	 *
	 * Theme core functions here
	 */
	class CentireThemeHeader {

		function __construct() {

			// Get site logo
			$this->logoId = get_theme_mod('custom_logo');
			$this->logoURL = wp_get_attachment_image_url($this->logoId, 'full');
			$this->logoLink = get_site_url();
			$this->siteTitle = get_bloginfo('name');

		}

		function get_header() {

			$this->logo();
			$this->main_header_menu();
        }

		private function logo() {

			if($this->logoId) {

				// Logo Srcset HTML for retina logo
				$logoSrcSet = "{$this->logoURL} 1x";

				$logo2x = get_theme_mod( 'custom2x_logo' );

				if( $logo2x != '') {  // if there is a logo img

					$logoSrcSet .= ', '.$logo2x.' 2x';
				}

				$logoSrcSet = trim($logoSrcSet);

				echo <<<HTML
				<div class="logo"><a href="{$this->logoLink}"><img src="{$this->logoURL}" srcset="{$logoSrcSet}" alt="{$this->siteTitle}" /></a></div>
				
HTML;
			}

		}

		private function main_header_menu() {

			// Main menu
			if (has_nav_menu('main-menu')) {

				echo '<div class="menu-area">';
				echo '<a href="#" class="menu-bar"></a>';
				wp_nav_menu([
					'theme_location' => 'main-menu',
					'menu_class' => 'menu',
					'container' => 'ul',
				]);
				echo '</div>';
			}
		}

	}

	function hendragym_CentireThemeHeader_instance() {
		global $centireThemeHeader;
		$centireThemeHeader = new CentireThemeHeader();

	}
	hendragym_CentireThemeHeader_instance();

}