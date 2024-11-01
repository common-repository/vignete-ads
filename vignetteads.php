<?php
/**
 * @package Vignette Ads for WordPress
 * @version 0.3
 */
/*
Plugin Name: Vignette Ads
Plugin URI: https://www.mainspot.net/google-adsense-vignete-anchoroverlay-ads/
Description: Add your Vignette Ads and Anchor/Overlay Ads code from Adsense to the header of your website.
Author: CodyCross Solutions
Version: 0.2
Author URI: https://www.codycrosssolutions.com/
*/

function HCMenu()
{
echo "<br />
<br />
<strong>Vignette Ads for Wordpress</strong><br /><br />";	   
include('Admin.php');
}

function HCadmin_actions()
{
    add_options_page("Vignette Ads", "Vignette Ads", 1,"Vignette Ads", "HCMenu");
}

add_action('admin_menu', 'HCadmin_actions');
add_option( "headcodes", "", '0', "yes" ); 
function hookhead() {
	
	echo html_entity_decode(get_option('headcodes',htmlentities($my_default_value)));
}
add_action('wp_head','hookhead');
?>