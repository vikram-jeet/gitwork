<?php

/**
 * Theme Centire Template
 *
 * Template functions
 */

if ( ! class_exists( 'CentireThemeTemplate' ) ) {

	class CentireThemeTemplate {

		function __construct() {
		}

		public function slider() {

			$sliderHTML = '';

			if ( have_rows( 'slide_content' ) ) {
				while ( have_rows( 'slide_content' ) ) {

					the_row();

					// Slide Image
					$image = get_sub_field( 'slide_image' );

					// If image is not available skip slide
					if ( ! $image ) {
						continue;
					} else {

						$image = <<<HTML
 <div class="slide-image"><img src="{$image}" alt="HendraGym" /></div>
HTML;

					}

					// Get content part
					$content = get_sub_field( 'slide_text' );

					// Get claim button
					$claimButtonTitle = get_sub_field( 'claim_button_title' );
					$claimButtonURL   = get_sub_field( 'claim_button_url' ) ? get_sub_field( 'claim_button_url' ) : '#';

					$claimLink = '';
					if ( $claimButtonTitle ) {

						$claimLink = <<<HTML
<a href="{$claimButtonURL}" class="slider-btn">{$claimButtonTitle}</a>
HTML;

					}


					// Get find button
					$findButtonTitle = get_sub_field( 'find_button_title' );
					$findButtonURL   = get_sub_field( 'find_button_url' ) ? get_sub_field( 'find_button_url' ) : '#';

					$findLink = '';
					if ( $findButtonTitle ) {

						$findLink = <<<HTML
<a href="{$findButtonURL}" class="slider-btn">{$claimButtonTitle}</a>
HTML;

					}


					// Make slide
					$sliderHTML .= <<<HTML
					<li>
						{$image}
						<div class="slider-content">
							{$content}
							{$claimLink}
							{$findLink}
						</div>
					</li>
HTML;


				}

				if ( $sliderHTML ) {

					$sliderHTML = <<<HTML
			<div class="slider-wrapper">
				<div class="flexslider main-slider">
				<ul class="slides">
					{$sliderHTML}
					</ul>
				</div>
			</div>
HTML;

				}
			}

			return $sliderHTML;
		}

		public function sections() {

			if ( have_rows( 'section' ) ) {
				while ( have_rows( 'section' ) ) {
					the_row();

					$sectionType = get_sub_field( 'section_type' );

					switch ( $sectionType ) {

						case 'bottomBanner':
							echo $this->bannerBottomAreaHomePage();
							break;

						case 'normal':
							echo $this->page_content_section();
							break;

						case 'facilities':
							echo $this->facilities();
							break;

						case 'joinnow':
							echo $this->joinNowSection();
							break;

						case 'video':
							echo $this->video();
							break;

						case 'testimonials':
							echo $this->testimonials();
							break;

						case 'instagramfeed':
							echo $this->insta_wrapper();
							break;

						case 'tryforfree':
							echo $this->try_for_free();
							break;

						case 'time_and_map':
							echo $this->officeHours_and_map();
							break;

						case 'sponsors':
							echo $this->sponsors();
							break;

						case 'contact':
							echo $this->contactForm();
							break;

					}
				}
			}
		}

		public function bannerBottomAreaHomePage() {

			$sectionTitle = get_field( 'banner_bottom_section_title', 'option' );

			$sectionTitle = $sectionTitle ? '<h1 class="section-title">' . $sectionTitle . '</h1>' : '';


			$buttonsHTML = '';
			if ( have_rows( 'banner_bottom_section_buttons', 'option' ) ) {
				while ( have_rows( 'banner_bottom_section_buttons', 'option' ) ) {
					the_row();


					$label = get_sub_field( 'banner_bottom_section_button_label' );
					$url   = get_sub_field( 'banner_bottom_section_button_url' );

					$buttonsHTML .= <<<HTML
<li><a href="{$url}">{$label}</a></li>
HTML;

				}
			}

			if ( $buttonsHTML ) {

				$buttonsHTML = <<<HTML
				<ul>{$buttonsHTML}</ul>
HTML;

			}

			if ( $sectionTitle || $buttonsHTML ) {

				$bannerBottomHTML = <<<HTML
<div class="class-wrapper">
	<div class="container clear">
		{$sectionTitle}
		{$buttonsHTML}
	</div>
</div>
HTML;
			}

			return $bannerBottomHTML;


		}

		public function joinNowSection() {

			$title       = get_field( 'join_now_section_title', 'option' );
			$description = get_field( 'join_now_section_description', 'option' );
			$buttonLabel = get_field( 'join_now_section_button_label', 'option' );
			$buttonURL   = get_field( 'join_now_section_button_url', 'option' );

			if ( $title ) {
				$title = <<<HTML
		<h1 class="section-title">{$title}</h1>
HTML;

			}

			if ( $buttonLabel ) {
				$buttonLabel = <<<HTML
<a href="{$buttonURL}" class="join-now-btn">{$buttonLabel}</a>
HTML;

			}

			$joinNowHTML = <<<HTML
<div class="join-now-wrapper">
	<div class="container clear">
		{$title}
		{$description}
		{$buttonLabel}
	</div>
</div>
HTML;

			return $joinNowHTML;

		}

		public function page_content_section() {

			$sectionClass       = get_sub_field( 'section_class' );
			$sectionTitle       = get_sub_field( 'section_title' );
			$sectionDescription = get_sub_field( 'section_description' );

			$sectionImage   = get_sub_field( 'section_image' );
			$sectionImage2x = get_sub_field( 'section_image_2x' );

			$sectionTitle       = $sectionTitle ? '<h1 class="section-title">' . $sectionTitle . '</h1>' : '';
			$sectionDescription = $sectionDescription ? apply_filters( 'the_content', $sectionDescription ) : '';

			$imageHTML = '';
			if ( $sectionImage ) {
				$srcSet = $sectionImage . ' 1x ';

				if ( $sectionImage2x ) {
					$srcSet = $sectionImage2x . ' 2x';
				}


				$imageHTML = <<<HTML
<div class="welcome-image-area"> <img src="{$sectionImage}" srcset="{$srcSet}" > </div>
HTML;


			}


			return <<<HTML
<div class="{$sectionClass}">				
		<div class="container clear">
			{$imageHTML}
			<div class="welcome-content-area">
				{$sectionTitle}
				{$sectionDescription}
			</div>
		</div>
</div>		
HTML;
		}

		public function facilities() {

			$facilitiesHTML = '';

			$sectionClass       = get_sub_field( 'section_class' );
			$sectionTitle       = get_sub_field( 'section_title' );
			$sectionDescription = get_sub_field( 'section_description' );

			$sectionTitle       = $sectionTitle ? '<h1 class="section-title">' . $sectionTitle . '</h1>' : '';
			$sectionDescription = $sectionDescription ? apply_filters( 'the_content', $sectionDescription ) : '';


			$postQuery = $this->get_posts( 'hhw_facility', '8' );

			if ( $postQuery->have_posts() ) {

				$upperIconListHTML = '';

				$facilitiesBlocksHTML = '';

				$croxImage = '<img alt="X" src="' . get_theme_file_uri( '/assets/images/close-icon.png' ) . '" srcset="' . get_theme_file_uri( '/assets/images/close-icon.png' ) . ' 1x, ' . get_theme_file_uri( '/assets/images/close-icon_2x.png' ) . '2x" />';

				while ( $postQuery->have_posts() ) {
					$postQuery->the_post();

					// Title
					$title = get_the_title();

					// Content
					$content = apply_filters( 'the_content', get_the_content() );

					// Icon Image
					$iconImage = get_field( 'facility_icon_image' );

					// Icon Image 2x
					$iconImage2 = get_field( 'facility_icon_image_2x' );


					$iconImageHTML  = '';
					$blockIconImage = '';

					if ( $iconImage ) {

						$srcSet = $iconImage . ' 1x ';

						if ( $iconImage2 ) {
							$srcSet = $iconImage2 . ' 2x';
						}

						$blockIconImage = <<<HTML
<span class="facilities-content-icon"><img alt="{$title}" src="{$iconImage}" srcset="{$srcSet}" /></span>
HTML;

						$iconImageHTML = <<<HTML
<span class="facilities-icon"><img alt="{$title}" src="{$iconImage}" srcset="{$srcSet}" /></span>
HTML;

					}

					$blockTitle = '';

					if ( $title ) {

						$blockTitle = <<<HTML
<H2>{$blockIconImage}<span>{$title}</span></H2>
HTML;

						$title = <<<HTML
<span class="facilities-name">{$title}</span>
HTML;

					} else {
						$title = '';
					}

					// Main Image
					$mainImage = get_field( 'facility_main_image' );

					// Main Image 2x
					$mainImage2x = get_field( 'facility_main_image_2x' );

					if ( $mainImage ) {

						$srcSet = $this->image1x_and_2x( $mainImage, $mainImage2x );

						$mainImage = <<<HTML
<div class="facilities-image">
				<img alt="" src="{$mainImage}" srcset="{$srcSet}" />
			</div>
HTML;

					} else {
						$mainImage = '';
					}

					$postId = get_the_ID();


					if ( $title || $iconImageHTML ) {

						$upperIconListHTML .= <<<HTML
 					<li data-map-id="block-{$postId}"><a href="#" >
 					{$iconImageHTML}
					{$title}
				</a></li>

HTML;
					}

					$facilitiesBlocksHTML .= <<<HTML
		<div data-block-id="{block-{$postId}}" class="facilities-block">
			{$mainImage}
			<div class="facilities-content">
				<a href="#" class="close-icon">{$croxImage}</a>
				{$blockTitle}
				{$content}
				<a href="/class/{$postId}" class="find-class-btn">find a class</a>
			</div>
		</div>
HTML;


				}

				if ( $upperIconListHTML ) {
					$upperIconListHTML = <<<HTML
<ul class="facilities clear">{$upperIconListHTML}</ul>
HTML;

				}

				$facilitiesHTML = <<<HTML
<div class="facilities-wrapper {$sectionClass}">
	<div class="container clear">
		{$sectionTitle}
		{$sectionDescription}
		{$upperIconListHTML}
		{$facilitiesBlocksHTML}
	</div>
</div>
HTML;
				/* Restore original Post Data */
				wp_reset_postdata();
			}

			return $facilitiesHTML;
		}

		public function get_posts( $postType, $numberOfPost = - 1 ) {

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}

			$args = [

				'post_type'      => $postType,
				'posts_per_page' => $numberOfPost,
				'paged'          => $paged
			];

			// The Query
			return new WP_Query( $args );
		}

		public function video() {


			$sectionTitle       = get_sub_field( 'section_title' );
			$sectionDescription = get_sub_field( 'section_description' );

			$sectionTitle       = $sectionTitle ? '<h1 class="section-title">' . $sectionTitle . '</h1>' : '';
			$sectionDescription = $sectionDescription ? apply_filters( 'the_content', $sectionDescription ) : '';

			$videoHTML = '';

			if ( $sectionDescription ) {
				$videoHTML = <<<HTML
<div class="video-wrapper">
	<div class="container">
	{$sectionTitle}
		<div class="video-block">
            {$sectionDescription}
		</div>
	</div>
</div>
HTML;
			}

			return $videoHTML;

		}

		public function testimonials() {

			$sectionTitle       = get_sub_field( 'section_title' );
			$sectionDescription = get_sub_field( 'section_description' );

			$sectionTitle       = $sectionTitle ? '<h1 class="section-title">' . $sectionTitle . '</h1>' : '';
			$sectionDescription = $sectionDescription ? apply_filters( 'the_content', $sectionDescription ) : '';


			$postQuery = $this->get_posts( 'hhw_testimonial', '10' );

			if ( $postQuery->have_posts() ) {

				$testimonialsHTML = '';

				$likeIcon   = get_theme_file_uri( '/assets/images/like-icon.png' );
				$likeIcon2x = get_theme_file_uri( '/assets/images/like-icon_2x.png' );

				$iconSrcSet = $this->image1x_and_2x( $likeIcon, $likeIcon2x );

				$likeIcon = <<<HTML
<img alt="" src="{$likeIcon}" srcset="{$iconSrcSet}" />
HTML;


				while ( $postQuery->have_posts() ) {
					$postQuery->the_post();


					$authorName    = get_field( 'testimonial_author_name' );
					$authorImage   = get_field( 'testimonial_author_image' );
					$authorImage2x = get_field( 'testimonail_author_name_2x' );


					if ( $authorImage ) {

						$srcSet = $this->image1x_and_2x( $authorImage, $authorImage2x );

						$authorImage = <<<HTML
<div class="member-image"><img alt="" src="{$authorImage}" srcset="{$srcSet}" /></div>
HTML;
					}

					$title = get_the_title();

					if ( $authorName ) {

						$authorName = <<<HTML
						<h3><span><strong>{$authorName}</strong></span><span class="like-icon">{$likeIcon}</span><span>{$title}</span></h3>
HTML;

					}

					$content = apply_filters( 'the_content', get_the_content() );

					$testimonialsHTML .= <<<HTML
				<li>
					<div class="member-block">
						{$authorImage}
						{$authorName}
						{$content}
					</div>
				</li>
HTML;

				}

				wp_reset_postdata();

				if ( $testimonialsHTML ) {

					$testimonialsHTML = <<<HTML
			<div class="flexslider member-slide">
				<ul class="slides">
				{$testimonialsHTML}
				</ul>
			</div>
HTML;


					$testimonialsHTML = <<<HTML
<div class="member-slider-wrapper">
	<div class="container clear">
		{$sectionTitle}
		{$sectionDescription}
		{$testimonialsHTML}
	</div>
</div>
HTML;

				}
			}

			return $testimonialsHTML;


		}

		public function image1x_and_2x( $image, $image2x ) {

			$srcSet = '';

			if ( $image ) {
				$srcSet = $image . ' 1x ';

				if ( $image2x ) {

					$srcSet = $image2x . ' 2x';
				}
			}

			return $srcSet;
		}

		public function try_for_free() {

			$image = get_field('try_for_free_background_image');
			$content = get_field('try_for_free_content');

			$content = $content ? apply_filters('the_content',$content) : '';


			if($image) {
				$image =<<<HTML
<img alt="" src="{$image}">
HTML;

			}

			if($content) {

				$content =<<<HTML
<div class="free-banner-content">
			{$content}
		</div>
HTML;

}

			$tryForFreeHTML =<<<HTML
<div class="try-banner-wrapper">
	{$image}
	<div class="container">
		{$content}
	</div>
</div>
HTML;


			return $tryForFreeHTML;
		}

		public function insta_wrapper() {

			$instaGramFeed = do_shortcode('[instagram-feed]');

			$instaWrapperHTML =<<<HTML
<div class="insta-wrapper">
	<div class="container clear">
		<div class="insta-row clear">
			<a href="#" class="hash-tag">#healthworkshendra</a>
			<a href="#" class="follow-btn">follow</a>
		</div>
		<ul class="insta-listing">
            {$instaGramFeed}
		</ul>
	</div>
</div>
HTML;
			return $instaWrapperHTML;

		}

		public function officeHours_and_map() {

			$officeHoursHTML =  $this->officeHours();
			$officeHoursHTML .= $this->map();


			if($officeHoursHTML) {

				$officeHoursHTML =<<<HTML
<div class="timming-wrapper"> {$officeHoursHTML}</div>
HTML;
			}

			return $officeHoursHTML;
		}


		public function officeHours() {

			//opening_hours

			if( have_rows('opening_hours','option') ) {

				$openingHoursHTML = '';

				while (have_rows('opening_hours','option')) {
					the_row();

					$openHoursHeading = get_sub_field('opening_hours_title');

					if($openHoursHeading) {

						$openingHoursHTML .=<<<HTML
					<h5>{$openHoursHeading}</h5>
HTML;
					}


					if(have_rows('open_timing')) {

						while (have_rows('open_timing')) {
							the_row();

							$label = get_sub_field('opening_hours_label');
							$timingHours = get_sub_field('opening_hours_timing');

							if($label || $timingHours ) {
								$openingHoursHTML .=<<<HTML
<div class="timming-row clear">
			<div class="timming-left">{$label}</div>
			<div class="timming-right">{$timingHours}</div>
		</div>
HTML;
							}

						}
					}

				}

if($openingHoursHTML) {

	$openingHoursHTML =<<<HTML
<div class="timming-area">
		{$openingHoursHTML}
	</div>
HTML;

}
			}


			return $openingHoursHTML;


		}

		public function map() {

			$embedMapCode = get_field('map_embed_code','option');

			$mapHTML = '';

			if( $embedMapCode ) {

				$mapHTML =<<<HTML
<div class="map">{$embedMapCode}</div>
HTML;
			}

			return $mapHTML;
		}

		public function sponsors() {

			$logoHTML = '';

			if(have_rows('sponsors','option')) {

				while (have_rows('sponsors','option')) {
				the_row();

				$logo = get_sub_field('sponsors_logo');
				$logo2x = get_sub_field('sponsors_logo_2x');
				$url = get_sub_field('sponsors_url');

				$srcSet = $this->image1x_and_2x($logo, $logo2x);

				if($logo) {

					$logoHTML .=<<<HTML
			<li><img alt="{$url}" src="{$logo}" srcset="{$srcSet}" /></li>
			
HTML;

				}

				}

				if($logoHTML) {

					$logoHTML =<<<HTML
<div class="sponsored-wrapper">
	<div class="container clear">
		<ul class="sponsored">
			{$logoHTML}
		</ul>
	</div>
</div>
HTML;
				}

			}

			return $logoHTML;
		}

		public function contactForm() {

			$contactForm = get_sub_field('contact_form');



			$contactFormHTML = '';
			if($contactForm) {

				$contactForm = do_shortcode('[contact-form-7 id="516" title="Contact form"]');

				$sectionTitle       = get_sub_field( 'section_title' );
				$sectionDescription = get_sub_field( 'section_description' );

				$sectionTitle       = $sectionTitle ? '<h1 class="section-title">' . $sectionTitle . '</h1>' : '';
				$sectionDescription = $sectionDescription ? apply_filters( 'the_content', $sectionDescription ) : '';



				$contactFormHTML =<<<HTML
<div class="contact-section">
	<div class="container clear">
		{$sectionTitle}
		{$sectionDescription}
		{$contactForm}
	</div>
</div>
HTML;

			}
			return $contactFormHTML;


		}
	}

	/**
	 * Template Functions class
	 */
	function hendragym_CentireThemeTemplate_instance() {
		global $centireThemeTemplate;
		$centireThemeTemplate = new CentireThemeTemplate();

	}

	hendragym_CentireThemeTemplate_instance();

}


