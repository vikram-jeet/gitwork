<?php

global $centireThemeFooter;
?>
<div class="footer-wrapper">
	<div class="container clear">
		<?php $centireThemeFooter->get_footer(); ?>
	</div>
</div>

<!-- sticky -->
<div class="sticky-social-media">
    <ul>
		<?php
		// Facebook
		$showFacebookInSticky = get_theme_mod('hendragym_show_facebook');
		$facebookPage = get_theme_mod('hendragym_facebook_page');

		if($facebookPage && $showFacebookInSticky) {
			echo '<li><a href="'.$facebookPage.'" target="_blank"><span><img alt="" src="'.get_template_directory_uri().'/assets/images/fb-sticky.png" srcset="'.get_template_directory_uri().'/assets/images/fb-sticky.png 1x, '.get_template_directory_uri().'/assets/images/fb-sticky_2x.png 2x" /></span><span class="sticky-name">Facebook</span></a></li>';
		}

		$showCallInSticky = get_theme_mod('hendragym_show_call');
		$instagramProfile = get_theme_mod('hendragym_instagram_profile_url');

		// Instagram
		if($instagramProfile) {
			echo '<li><a href="'.$instagramProfile.'" target="_blank"><span><img alt="" src="'.get_template_directory_uri().'/assets/images/insta-sticky.png" srcset="'.get_template_directory_uri().'/assets/images/insta-sticky.png 1x, '.get_template_directory_uri().'/assets/images/insta-sticky_2x.png 2x" /></span><span class="sticky-name">Instagram</span></a></li>';
		}

		$showEmailInSticky = get_theme_mod('hendragym_show_email');

		// Email
		if($showEmailInSticky) {

			$emailAddress = get_theme_mod('hendragym_show_email_address');
			if($emailAddress) {
				echo '<li><a href="mailto:'.$emailAddress.'"><span><img alt="" src="'.get_template_directory_uri().'/assets/images/email-sticky.png" srcset="'.get_template_directory_uri().'/assets/images/email-sticky.png 1x, '.get_template_directory_uri().'/assets/images/email-sticky_2x.png 2x" /></span><span class="sticky-name">Email Address</span></a></li>';
			}

		}

		//Contact Number
        $contactNumber = get_theme_mod('hendragym_show_call_number');
		if($contactNumber) {
			echo '<li><a href="#"><span><img alt="" src="'.get_template_directory_uri().'/assets/images/phone-sticky.png" srcset="'.get_template_directory_uri().'/assets/images/phone-sticky.png 1x, '.get_template_directory_uri().'/assets/images/phone-sticky_2x.png 2x" /></span><span class="sticky-name">'.$contactNumber.'</span></a></li>';
		}
		?>
    </ul>
</div>
<!-- sticky -->
<?php wp_footer(); ?>

</body>
</html>

