<?php

if( !class_exists('CentireThemeFooter') ) {

	/**
	 * Class CentireThemeFooter
	 *
	 * Theme core functions here
	 */
	class CentireThemeFooter {


		function __construct() {

			// Get site logo
			$this->logoId = get_theme_mod('custom_logo');
			$this->logoURL = wp_get_attachment_image_url($this->logoId, 'full');
			$this->logoLink = get_site_url();
			$this->siteTitle = get_bloginfo('name');

		}

		public function get_Footer() {


			$logoHTML = $this->logo();

			if($logoHTML) {
				echo '<div class="footer-left">';
				echo $logoHTML;
				echo '</div>';
			}

			$copyRightText  = get_field('copy_right_text','option');
			//var_dump($copyRightText);die;

			echo '<div class="footer-center">';
			if($copyRightText) {
				echo '<span class="copy-right-message">'.$copyRightText.'</span>';
			}

			$this->main_footer_menu();
			echo '</div>';

			$socialIcons = $this->social_icons();

			if($socialIcons) {
				echo '<div class="footer-right">';
				echo $socialIcons;
				echo '</div>';
			}
		}

		private function logo() {

			$logoHTML = '';

			if($this->logoId) {

				// Logo Srcset HTML for retina logo
				$logoSrcSet = "{$this->logoURL} 1x";

				$logo2x = get_theme_mod( 'custom2x_logo' );

				if( $logo2x != '') {  // if there is a logo img

					$logoSrcSet .= ', '.$logo2x.' 2x';
				}

				$logoSrcSet = trim($logoSrcSet);

				$logoHTML = <<<HTML
				<img src="{$this->logoURL}" srcset="{$logoSrcSet}" alt="{$this->siteTitle}" />
				
HTML;
			}

			return $logoHTML;

		}

		private function main_footer_menu() {

			if (has_nav_menu('footer-menu')) {
				wp_nav_menu([
					'theme_location' => 'footer-menu',
					'menu_class' => 'footer',
					'container' => 'ul',
				]);
			}
		}

		public function social_icons() {

			$socialHTML = '';

			// Instagram
			$instagramProfile = get_theme_mod('hendragym_instagram_profile_url');
			if($instagramProfile) {
				$socialHTML .= '<li><a href="'.$instagramProfile.'" target="_blank"><img alt="" src="'.get_template_directory_uri().'/assets/images/insta-icon.png" srcset="'.get_template_directory_uri().'/assets/images/insta-icon.png 1x, '.get_template_directory_uri().'/assets/images/insta-icon_2x.png 2x" /></a></li>';
			}

			// Facebook
			$facebookPage = get_theme_mod('hendragym_facebook_page');
			if($facebookPage) {
				$socialHTML .= '<li><a href="'.$facebookPage.'" target="_blank" ><img alt="" src="'.get_template_directory_uri().'/assets/images/fb-icon.png" srcset="'.get_template_directory_uri().'/assets/images/fb-icon.png 1x, '.get_template_directory_uri().'/assets/images/fb-icon_2x.png 2x" /></a></li>';
			}

			//Contact Number
			$contactNumber = get_theme_mod('hendragym_show_call_number');
	        if($contactNumber) {
				$socialHTML .= '<li><a href="#">'.$contactNumber.'</a></li>';
			}

			if($socialHTML) {
				$socialHTML =<<<HTML
			<ul class="social-icon"> {$socialHTML}</ul>
HTML;

			}

			return $socialHTML;
		}

	}

	function hendragym_CentireThemeFooter_instance() {
		global $centireThemeFooter;
		$centireThemeFooter = new CentireThemeFooter();

	}
	hendragym_CentireThemeFooter_instance();

}