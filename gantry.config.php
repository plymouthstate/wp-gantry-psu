<?php
/**
 * @version   1.17 August 15, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('GANTRY_VERSION') or die();

add_theme_support( 'post-thumbnails' );

// The next four constants set supports custom headers.

// The default header text color
define( 'HEADER_TEXTCOLOR', '000' );

// By leaving empty, we allow for random image rotation.
define( 'HEADER_IMAGE', '' );

// The height and width of your custom header.
// Add a filter to twentyeleven_header_image_width and twentyeleven_header_image_height to change these values.
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'gantry_header_image_width', 960 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'gantry_header_image_height', 177 ) );

// We'll be using post thumbnails for custom header images on posts and pages.
// We want them to be the size of the header image that we just defined
// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

// Add Twenty Eleven's custom image sizes
add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images
add_image_size( 'small-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist

// Turn on random header image rotation by default.
add_theme_support( 'custom-header', array( 'random-default' => true ) );

// Add a way for the custom header to be styled in the admin panel that controls
// custom headers. See twentyeleven_admin_header_style(), below.
add_custom_image_header( 'twentyeleven_header_style', 'twentyeleven_admin_header_style', 'twentyeleven_admin_header_image' );

$gantry_config_mapping = array(
    'belatedPNG' => 'belatedPNG',
	'ie6Warning' => 'ie6Warning'
);

$gantry_presets = array(
	'presets' => array(
		'preset-standard' => array(
			'name' => 'Standard Page',
			'cssstyle' => 'page-standard',
			'mainbodyPosition' => '4,12',
		),
		'preset-landing' => array(
			'name' => 'Landing Page',
			'cssstyle' => 'page-landing',
		),
		'preset-filter' => array(
			'name' => 'Filter Page',
			'cssstyle' => 'page-filter',
		),
		'preset-events' => array(
			'name' => 'Event List Page',
			'cssstyle' => 'page-events',
		),
		'preset-event' => array(
			'name' => 'Event Detail Page',
			'cssstyle' => 'page-event',
		),
		'preset-collapsible' => array(
			'name' => 'Collapsible List Page',
			'cssstyle' => 'page-collapsible',
		),
		'preset-home' => array(
			'name' => 'Home Page',
			'cssstyle' => 'page-home',
			'mainbodyPosition' => '12,4',
		),
	),
);

$gantry_default_mainbodyschemas = array(
    16 => array(
        1 => array('mb'=>16),
        2 => array('mb'=>12, 'sa'=>4),
        3 => array('sa'=>4, 'mb'=>8, 'sb'=>4),
    )
);

$gantry_browser_params = array(
	'ie6' => array(
		'backgroundlevel' => 'low',
		'bodylevel' => 'low'
	)
);

$gantry_belatedPNG = array('.png', '#rt-logo');

$gantry_ie6Warning = "<h3>IE6 DETECTED: Currently Running in Compatibility Mode</h3><h4>This site is compatible with IE6, however your experience will be enhanced with a newer browser</h4><p>Internet Explorer 6 was released in August of 2001, and the latest version of IE6 was released in August of 2004.  By continuing to run Internet Explorer 6 you are open to any and all security vulnerabilities discovered since that date.  In March of 2009, Microsoft released version 8 of Internet Explorer that, in addition to providing greater security, is faster and more standards compliant than both version 6 and 7 that came before it.</p> <br /><a class='external'  href='http://www.microsoft.com/windows/internet-explorer/?ocid=ie8_s_cfa09975-7416-49a5-9e3a-c7a290a656e2'>Download Internet Explorer 8 NOW!</a>";
