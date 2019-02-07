<?php

/**
 * Theme Centire Template
 *
 * Template functions
 */

if ( ! class_exists( 'CentireThemeTemplate' ) ) {

	class CentireThemeTemplate {

		function __construct() {

			add_shortcode('HHW_SHOW_FACILITIES', [ $this, 'facilities'] );
			add_shortcode('HHW_FACILITIES_CHECKBOXES', [ $this, 'allFacilitesCheckboxes'] );
			add_shortcode('HHW_SHOW_TESTIMONIALS', [ $this, 'testimonials'] );
			add_shortcode('HHW_SHOW_OPENING_TIME',[$this,'officeHours']);
			add_shortcode('HHW_SHOW_MAP',[$this,'map']);
			add_shortcode('HHW_SHOW_FAQ',[$this,'faq']);
			add_shortcode('HHW_SHOW_BASIC_PLAN',[$this,'basicPlans']);
			add_shortcode('HHW_SHOW_FREE_TRIAL_FEATURES',[$this,'freeTrialFeatures']);
			add_shortcode('HHW_SHOW_CAREER_ROLES',[ $this,'careerRoles' ]);
			add_shortcode('HHW_YEAR',[$this,'year']);
			add_action( 'pre_get_posts', [$this,'change_posts_sort_order']);

		}

		public function year() {
			return date('Y');
		}

		public function slider($postId = '') {

			$sliderHTML = '';

			if(!$postId) {
				$postId = get_the_ID();
			}


			$numberOfBanner = count( get_field( 'slide_content', $postId ) );
			$containerClass = get_field('slide_container_class', $postId);

			if($numberOfBanner == 1) {

				$sliderHTML = $this->banner_content($containerClass, $postId);
			}

			if ( have_rows( 'slide_content', $postId ) &&  !$sliderHTML) {

				while( have_rows( 'slide_content',$postId )) {

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


					// Make slide
					$sliderHTML .= <<<HTML
					<li>
						{$image}
						<div class="slider-content">
							{$content}
						</div>
					</li>
HTML;

				}

				if ( $sliderHTML ) {

					$sliderHTML =<<<HTML
			<div class="slider-wrapper {$containerClass}">
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

		public function banner_content($containerClass , $postId ) {

			$bannerHTML = '';


			if ( have_rows( 'slide_content', $postId ) ) {
				while ( have_rows( 'slide_content', $postId ) ) {

					the_row();

					// Slide Image
					$image = get_sub_field( 'slide_image' );

					// If image is not available skip slide
					if ( ! $image ) {
						continue;
					} else {

						$image = <<<HTML
 <img src="{$image}" alt="HendraGym" />
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
					$bannerHTML .= <<<HTML
						 <div class="container">
						<div class="banner-content-area">
							{$content}
							{$claimLink}
							{$findLink}
						</div>
						</div>
						{$image}
					
HTML;


				}

				if ( $bannerHTML ) {

					$bannerHTML = <<<HTML
			<div class="banner-wrapper {$containerClass}">
        {$bannerHTML}
    </div>
HTML;

				}
			}

			return $bannerHTML;
		}

		public function sections($postId = '') {

			if(!$postId) {
				$postId = get_the_ID();
			}

			if ( have_rows( 'section',$postId ) ) {
				while ( have_rows( 'section',$postId ) ) {
					the_row();

					$sectionType = get_sub_field( 'section_type' );

					switch ( $sectionType ) {

						case 'bottomBanner':
							echo $this->bannerBottomAreaHomePage();
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

						case 'leftContentRightImage':
							echo $this->section_with_image();
							break;

						case 'reformer_slider':
							echo $this->reformerSlider();
							break;

						default:
							echo $this->normal_section();
							break;

					}
				}
			}
		}

		public function normal_section() {

			$sectionClass       = get_sub_field( 'section_class' );
			$sectionTitle       = get_sub_field( 'section_title' );

			$sectionTitle = $sectionTitle ? '<h1 class="section-title">'.$sectionTitle.'</h1>' : '';

			$sectionDescription = get_sub_field( 'section_description' );

			$sectionImage   = get_sub_field( 'section_image' );

			$sectionImage = $sectionImage ? 'background-image:url('.$sectionImage.')' : '';

			$sectionDescription = $sectionDescription ? apply_filters('the_content', $sectionDescription) : '';

			$normalSectionHTML = '';

			if($sectionTitle || $sectionDescription) {

				$normalSectionHTML = <<<HTML
<div class="{$sectionClass}" style="{$sectionImage}">
	<div class="container clear">
		{$sectionTitle}
		{$sectionDescription}
	</div>
</div>
HTML;
			}

			return $normalSectionHTML;
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

	    public function section_with_image() {

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

			$postQuery = $this->get_posts( 'hhw_facility', '8' , 1);


			if ( $postQuery->have_posts() ) {

				$upperIconListHTML = '';

				$facilitiesBlocksHTML = '';

				$croxImage = '<img alt="X" src="' . get_theme_file_uri( '/assets/images/close-icon.png' ) . '" srcset="' . get_theme_file_uri( '/assets/images/close-icon.png' ) . ' 1x, ' . get_theme_file_uri( '/assets/images/close-icon_2x.png' ) . '2x" />';

				$hide = '';
				$active = 'active-facility';

				$classURL = get_site_url(null, '/classes');

				while ( $postQuery->have_posts() ) {
					$postQuery->the_post();

					// Title
					$title = get_the_title();

					// Content
					$content = apply_filters( 'the_content', get_the_content() );

					// Icon Image
					$iconImage = get_field( 'facility_icon_image' );

					$iconHeadingImage = get_field( 'heading_icon' );	

					
					$iconImageHTML  = '';
					$blockIconImage = '';

					if ( $iconImage ) {

					    $blockIconImage = <<<HTML
<span class="facilities-content-icon" style="background-image: url('{$iconHeadingImage}')"></span>
HTML;

						$iconImageHTML = <<<HTML
<span class="facilities-icon" style="background-image: url('{$iconImage}')" ></span>
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
 					<li data-map-id="block-{$postId}" class="{$active}"><a href="#" >
 					{$iconImageHTML}
					{$title}
				</a></li>

HTML;
					}



					$facilitiesBlocksHTML .= <<<HTML
		<div data-block-id="block-{$postId}" class="facilities-block hhw-facilities-single-block {$hide}">
			{$mainImage}
			<div class="facilities-content">
				<a href="#" class="close-icon">{$croxImage}</a>
				{$blockTitle}
				{$content}
				<a href="{$classURL}" class="find-class-btn">find a class</a>
			</div>
		</div>
HTML;

					$active = '';
					$hide = 'hide';


				}

				if ( $upperIconListHTML ) {
					$upperIconListHTML = <<<HTML
<ul class="facilities clear">{$upperIconListHTML}</ul>
HTML;

				}

				$facilitiesHTML = <<<HTML
		{$upperIconListHTML}
		{$facilitiesBlocksHTML}
HTML;
				/* Restore original Post Data */
				wp_reset_postdata();
			}

			return $facilitiesHTML;
		}

		public function get_posts( $postType, $numberOfPost = - 1,$checkForFeatured = 0) {

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

			if($checkForFeatured) {
				$args['meta_key'] =  '_is_ns_featured_post';
				$args['meta_value'] =  'yes';
			}

			// The Query
			return new WP_Query( $args );
		}

		public function testimonials() {

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


			$image = get_sub_field( 'section_image' );
			$image = $image ? $image : get_field('try_for_free_background_image','option');

			$content = get_sub_field( 'section_description' );
			$content =  $content ? $content : get_field('try_for_free_content','option');
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

		public function faq() {

			$faqHTML = '';

			if(have_rows('hhw_faq','option')) {
				while (have_rows('hhw_faq','option')) {
					the_row();

					$question = get_sub_field('faq_question');
					$answer = get_sub_field('faq_answer');

					if($question) {
						$question =<<<HTML
<a href="#" class="accordian-link"><span class="icon"></span> {$question}</a>
HTML;

					} else {
						$question = '';
					}

					if($answer) {
						$answer =<<<HTML
<div class="accordian-content">{$answer}</div>
HTML;

					} else {
						$answer = '';
					}

					if($question || $answer) {
						$faqHTML .=<<<HTML
<div class="accordian-container">{$question}{$answer}</div>
HTML;

					}
				}

				if($faqHTML) {
					$faqHTML =<<<HTML
<div class="accordian-wrapper">{$faqHTML}</div>
HTML;


				}


			}

			return $faqHTML;

		}

		public function basicPlans() {

			$basicPlanHTML = '<div class="membership-plan-row">
                	<div class="plan-col">
                    	<div class="plan-title"><h1>Flexi</h1></div>
                        <div class="plan-center">
                        	<h3 class="plan-price"><span>24.95</span><span class="per">per <span class="week">week</span></span></h3>
                            <ul>
                            	<li>No lock in contracts</li>
                                <li>30 days notice to cancel</li>
                                <li>Enjoy full gym access*</li>
                            </ul>
                            <a href="#">join now</a>
                        </div>
                    </div>
                    <div class="plan-col">
                    	<div class="plan-title"><h1>18 Month <span>MOST AFFORDABLE</span></h1></div>
                        <div class="plan-center">
                        	<h3 class="plan-price"><span>$17.95</span><span class="per">per <span class="week">week</span></span></h3>
                            <ul>
                            	<li>Our most affordable membership option</li>
                                <li>Enjoy full gym access*</li>
                            </ul>
                            <a href="#">join now</a>
                        </div>
                    </div>
                    <div class="plan-col">
                    	<div class="plan-title"><h1>12 Month</h1></div>
                        <div class="plan-center">
                        	<h3 class="plan-price"><span>$19.95</span><span class="per">per <span class="week">week</span></span></h3>
                            <ul>
                            	<li>Our most flexible monthly membership option</li>
                                <li>Enjoy full gym access*</li>
                            </ul>
                            <a href="#">join now</a>
                        </div>
                    </div>
                </div>';

			return $basicPlanHTML;

		}

		public function freeTrialFeatures() {

			$freeTrialFeaturesHTML = '';

			if(have_rows('free-trial-features','option')) {
				$counter = 1;
				while (have_rows('free-trial-features','option')) {
					the_row();

					$title = get_sub_field('feature_title');

					$title = $title ? '<h3>'.$title.'</h3>': '';

					$description = get_sub_field('feature_description');

					if($description) {
						$description =<<<HTML
<p>{$description}</p>
HTML;

					} else {
						$description = '';
					}

					if($title || $description) {
						$freeTrialFeaturesHTML .=<<<HTML
<div class="free-trial-col"><div class="trial-number">{$counter}</div>{$title}{$description}</div>
HTML;



						$counter++;
					}


				}

				if($freeTrialFeaturesHTML) {
					$freeTrialFeaturesHTML =<<<HTML
<div class="clear">{$freeTrialFeaturesHTML}</div>
HTML;
				}

			}

			return $freeTrialFeaturesHTML;

		}

		public function careerRoles() {

			$jobSectionsHTML = '';

			if(have_rows('openings','option')) {

				$popupHTML = '';

				$counter = 1;

				$applyForm = do_shortcode('[contact-form-7 id="911" title="Apply for Job"]');

				while (have_rows('openings','option')) {
					the_row();

					$jobTitle = get_sub_field('opening_job_title');

					// For Popup
					$heading = get_sub_field('opening_heading') ;
					$description = get_sub_field('opening_description');


					$openingType = get_sub_field('opening_type');
					$joinType = get_sub_field('opening_join_type');

					$openingHTML = '';

					if(have_rows('opening_positions')) {
						while (have_rows('opening_positions')) {
							the_row();

							$positonName = get_sub_field('position_name');

							if($positonName) {
								$openingHTML .=<<<HTML
									<option value="{$positonName}">{$positonName}</option>
HTML;

							}
						}
					}




					if($heading) {

						$ximage = get_theme_file_uri('assets/images/close-red.png');
						$ximage2x = get_theme_file_uri('assets/images/close-red_2x.png');

						$srcSet = $this->image1x_and_2x($ximage,$ximage2x);


						$popupHTML .=<<<HTML
<div class="pop-wrapper hide" data-popup-id="current_opening_{$counter}">
    	<div class="pop-container">
        	<div class="pop-header clear">
            	<div class="pop-header-right">
                	<a href="#" class="close popup-close">Close <span><img alt="" src="{$ximage}" srcset="{$srcSet}" /></span></a>
                </div>
                <div class="pop-header-left">
                	<ul class="pop-breadcrumbs">
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">{$jobTitle}</a></li>
                    </ul>
                </div>	                
            </div>
            <div class="popup-job-details">
        	<h1 class="section-title">{$heading}</h1>
            {$description}
            <a href="" class="apply-now-btn " data-show-contact="1" data-job-title="{$jobTitle}" >apply now</a>
            </div>
            <div class="options-position hide">{$openingHTML}</div>
            <div class="pop-form hide">
            <h1 class="section-title">{$jobTitle} Apply Here</h1>
            {$applyForm}
			</div>
        </div>
    </div>
HTML;

					}
					$jobSectionsHTML .=<<<HTML
 <div class="role-col">
                    <h2>{$jobTitle}</h2>
                    <p>{$openingType} <br> {$joinType}</p>
                    <a href="" class="view-role-btn hhw_show_role_info" data-popup-id="current_opening_{$counter}">view role</a>
                </div>
HTML;

				$counter++;
				}

				if($jobSectionsHTML) {


					$jobSectionsHTML =<<<HTML
<div class="role-row">       
               {$jobSectionsHTML}
            </div>
HTML;

		add_action('wp_footer',function () use($popupHTML){
						echo $popupHTML;
					});
				}
			}


			return $jobSectionsHTML;
		}

		public function subsciptionTabs() {

			$subscriptionTabHTML =<<<HTML
<ul class="tabs">
				<li><a href="#choose-membership">choose membership</a></li>
				<li><a href="#additions">additions</a></li>
				<li><a href="#personal-detail">personal detail</a></li>
				<li><a href="#payment-details">payment details</a></li>
				<li><a href="#confirmation">confirmation</a></li>
			</ul>
HTML;


	return $subscriptionTabHTML;
			}

		public function reformerSlider() {

			$sliderContent = '';

			if(have_rows('reformer_images','option')) {

				while (have_rows('reformer_images','option')) {
					the_row();

					$image = get_sub_field('reformer_image');

					if($image) {

						$sliderContent .=<<<HTML
<div><img src="{$image}" alt=""></div>
HTML;
					}
				}

				if($sliderContent) {
					$sliderContent =<<<HTML
<div class="reformer-slider">{$sliderContent}</div>
HTML;

				}
			}

			return $sliderContent;
		}

	    function change_posts_sort_order($query){

			if(is_archive()):
				//If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
				//Set the order ASC or DESC
				$query->set( 'order', 'ASC' );
				//Set the orderby
				$query->set( 'orderby', 'menu_order' );
			endif;
		}

		function allFacilitesCheckboxes() {

			$checkBoxesHTML = '';

			$postQuery = $this->get_posts( 'hhw_facility');


			if( $postQuery->have_posts() ) {
				while ( $postQuery->have_posts() ) {
					$postQuery->the_post();

					$facilityTitle = get_the_title();

					$checkBoxesHTML =<<<HTML
<div class="interest-col-three">
<div class="custom-checkbox"><label class="custom-icon-box"><input data-type="facility-interest" name="interest" checked="" value="{$facilityTitle}" autocomplete="off" type="checkbox"><span class="custom-r"></span> {$facilityTitle}</label></div>
</div>
HTML;



				}

				if($checkBoxesHTML) {
					$checkBoxesHTML =<<<HTML
			<div class="clear"><div class="interest-col-three"><div class="custom-checkbox"><label class="custom-icon-box"><input data-type="interest" name="interest" checked="" autocomplete="off" type="checkbox"><span class="custom-r"></span> Classes/ Group Fitness</label></div></div></div>
HTML;
				}

			}


return $checkBoxesHTML;
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


