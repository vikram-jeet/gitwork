<?php
/**
 * Functions.php
 */

require_once 'classes/CentireThemeCore.php';
require_once 'classes/CentirePostTypes.php';
require_once 'classes/CentireTimeTable.php';
require_once 'classes/CentirePlans.php';
require_once 'classes/CentireThemeCustomize.php';
require_once 'classes/CentireThemeOptionPage.php';
require_once 'classes/CentireThemeHeader.php';
require_once 'classes/CentireThemeTemplate.php';
//require_once 'classes/CentireFacilities.php';
require_once 'classes/CentireThemeFooter.php';

function pr($object) {
	echo '<pre>';
	print_r($object);
	echo '</pre>';
	die;
}

// Apply filter
add_filter('body_class', 'hhw_include_body_classes');

function hhw_include_body_classes($classes) {


	if(is_page_template('template-join-now.php') || is_page_template('template-purple-color.php')) {
		$classes[] = 'template2';
	}

	return $classes;
}

//instagram-feed.php

function hhw_prevent_to_update_plugin( $value ) {

	if(isset($value->response['instagram-feed/instagram-feed.php'])) {
		unset( $value->response['instagram-feed/instagram-feed.php']);
	}

	if(isset($value->response['mp-timetable/mp-timetable.php'])){
		unset( $value->response['mp-timetable/mp-timetable.php']);
	}


    return $value;
}
add_filter( 'site_transient_update_plugins', 'hhw_prevent_to_update_plugin' );