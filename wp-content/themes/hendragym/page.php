<?php
global $centireThemeTemplate;

get_header();


if(have_posts()) {

	echo $centireThemeTemplate->slider();

	while (have_posts()) {
		the_post();

		the_content();

	}

}


$centireThemeTemplate->sections();

get_footer();