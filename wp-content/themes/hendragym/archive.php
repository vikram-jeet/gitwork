<?php

global $centireThemeTemplate;

get_header();




if(have_posts()) {

	echo $centireThemeTemplate->slider('option');

	$categories = get_terms([
		'taxonomy' => 'hhw_facility_category',
		'hide_empty' => false,
	]);

	$currentId = get_queried_object()->term_id;

	if($categories) {

		$seeAll = get_site_url(null,'/classes');

		$categorySectionHTML = '<li class="'.( !$currentId ? 'active' : '').'"><a href="'.$seeAll.'">SEE ALL CLASSES</a></li>';

		foreach ( $categories as $category ) {

			if ( ! $category->name ) {
				continue;
			}

			$active = '';

			if( $currentId == $category->term_id ) {
			    $active = 'active';
            }

			// Category Link
			$categoryLink = get_term_link( $category );

			$categoryLinkText = $category->name;

			$categorySectionHTML .= <<<HTML
<li class="{$active}"><a href="{$categoryLink}">{$categoryLinkText}</a></li>
HTML;

		}


		?>

		<!-- class wrapper -->
		<div class="class-wrapper classes-wrapper">
			<div class="container clear">
				<h1 class="section-title">I’d like to...</h1>
				<ul>
					<?php echo $categorySectionHTML; ?>
				</ul>
			</div>
		</div>
		<!-- class wrapper -->
		<?php
	}

	$classesHTML = '';

	while (have_posts()) {
		the_post();

		// Class title
		$classTitle = get_the_title();


		// Class Content
		$classContent = get_the_content();

		// Selected Class type
		$selectedTypes = wp_get_post_terms(get_the_ID(),'hhw_facility_category');

		$selectedTypeHTML = '';

		if($selectedTypes) {

			foreach ($selectedTypes as $selectedType) {

				if( !$selectedType->name ) {
					continue;
				}

				$selectedTypeLink = get_term_link($selectedType);

				$selectedTypeHTML .=<<<HTML
<li><a href="{$selectedTypeLink}">{$selectedType->name}</a></li>
HTML;



			}

			if($selectedTypeHTML) {

				$selectedTypeHTML =<<<HTML
  <div class="listing-bar">
                    	<ul>
                        	{$selectedTypeHTML}
                        </ul>
                    </div>
HTML;
			}
		}



		// Set icons
		//$iconImage = get_field('facility_icon_image');
		$headingIcon = get_field('heading_icon');

		if( $headingIcon ) {

			$headingIcon =<<<HTML
<span class="facilities-content-icon" style="background-image: url('{$headingIcon}')"></span>
HTML;
		}

		if($classTitle) {
			$classTitle =<<<HTML
<h2>{$headingIcon}<span>{$classTitle}</span></h2>
HTML;

		}

		// Main image of class
		$mainImage =  get_field('facility_main_image');
		$mainImage2x = get_field('facility_main_image_2x');

		if( $mainImage ) {

			$srcSet = $centireThemeTemplate->image1x_and_2x($mainImage,$mainImage2x);

			$mainImage =<<<HTML
<div class="listing-image"><img alt="" src="{$mainImage}" srcset="{$srcSet}" /></div>
HTML;

		}

		// Class Duration
		$classDuration = get_field('facility_duration');

		if($classDuration) {

			$classDuration =<<<HTML
<p class="duration"><strong>Class Duration</strong>: {$classDuration}</p>
HTML;

		}

		$classesHTML .=<<<HTML
<div class="listing-row">
            	{$mainImage}
                <div class="listing-content">
                	<div>
                        {$classTitle}  
                        {$classContent}
                        {$classDuration}    	
                        
                    </div>
                    {$selectedTypeHTML}
                </div>
            </div>
HTML;


	}

	if($classesHTML) {

		echo '<div class="listing-wrapper">
    	<div class="container clear">';
		echo $classesHTML;
		echo '<div class="listing-row pagination">';
		the_posts_pagination(
			array(
				'screen_reader_text' => 'Remove Text',
				'mid_size'  => 5,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					'',
					__( 'Newer', 'twentynineteen' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					__( 'Older', 'twentynineteen' ),''

				),
			)
		);

		echo '</div></div></div>';

	}




}


$centireThemeTemplate->sections('option');

get_footer();