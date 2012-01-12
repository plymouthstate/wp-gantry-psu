<?php
/**
 * @version   1.17 August 15, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
$active_plugins = get_option('active_plugins');
if (!in_array('gantry/gantry.php', $active_plugins)) {
    if (!is_admin()){
        add_filter('template_include', 'gantry_missing_nag', -10, 0);
    } else {
        add_action( 'admin_notices', 'gantry_admin_missing_nag' );
    }
}

function gantry_admin_missing_nag(){
    $msg = __('The active theme requires the Gantry Framework Plugin to be installed and active');
	echo "<div class='update-nag'>$msg</div>";
}

function gantry_missing_nag(){
    echo "This theme requires the Gantry Framework Plugin to be installed and active.";
    die(0);
}


wp_enqueue_script('hover-intent', get_bloginfo('stylesheet_directory') . '/js/jquery.hoverIntent.js', array('jquery'), false, true);
wp_enqueue_script('mega-menu', get_bloginfo('stylesheet_directory') . '/js/jquery.dcmegamenu.1.3.3.min.js', array('hover-intent'), false, true);
wp_enqueue_script('behavior', get_bloginfo('stylesheet_directory') . '/js/behavior.js', array('mega-menu'), false, true);
