<?php

/**
 * Template Name: Purple Color Template
 */

get_header(); 

global $centireThemeTemplate;
global $centirePlans;

echo $centireThemeTemplate->slider();


if(have_posts()) {
	while (have_posts()) {
		the_post();

		the_content();

	}

}


$centireThemeTemplate->sections();

get_footer();