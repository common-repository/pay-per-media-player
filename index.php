<?php

/*
Plugin Name: Pay Per Media Player
Plugin URI: http://html5.svnlabs.com/pay-per-plugin-for-html5-media/
Description: The Pay Per Media Plugin is embedded stand-alone, e-commerce-powered JavaScript and iFramed widget.
Date: 2012, April, 18
Author: Sandeep Verma
Author URI: http://www.svnlabs.com/
Version: 1.24

*/

/*
Author: Sandeep Verma
Website: http://www.svnlabs.com
Copyright 2012 SVN Labs Softwares, Jaipur, India All Rights Reserved.

*/


//Database table versions
global $payper_player_db_table_version;
$payper_player_db_table_version = "1.0";

//Create database tables
function payper_db_create () {
    payper_create_table_player();
}


/*wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'jquery-ui-core' );
wp_enqueue_script( 'jquery-ui-tabs' );*/



function payper_create_table_player(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name_playlist = $wpdb->prefix . "payper_playlist";
	$table_name_items = $wpdb->prefix . "payper_sales";
	
    global $payper_player_db_table_version;
    $installed_ver = get_option( "payper_player_db_table_version" );
     
	//Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name_playlist'") != $table_name_playlist ||  $installed_ver != $payper_player_db_table_version ) {
        $sql = "CREATE TABLE " . $table_name_playlist . " (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`size` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
					`xml` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
					`sandbox` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
					`adddate` datetime NOT NULL,
					PRIMARY KEY (`id`)	
            );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
		
		$sql1 = "INSERT INTO `". $table_name_playlist ."` (`id`, `url`, `size`, `xml`, `sandbox`, `adddate`) VALUES (1, 'localhost', 'full', 'sample.xml', '1', '2012-09-20 08:51:41'); ";
		
		$wpdb->query($sql1);
		
		
		}
		
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_items'") != $table_name_items ||  $installed_ver != $payper_player_db_table_version ) {
        $sql = "CREATE TABLE " . $table_name_items . " (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`pid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
					`uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
					`email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
					`amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
					`currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
					`saledate` datetime NOT NULL,
					`transactionid` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
					PRIMARY KEY (`id`)
            );";

        //require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);		
		
        update_option( "payper_player_db_table_version", $payper_player_db_table_version );
        }
		
    //Add database table versions to options
    add_option("payper_player_db_table_version", $payper_player_db_table_version);
}

register_activation_hook( __FILE__, 'payper_db_create' );


add_action( 'admin_menu', 'payper_plugin_menu' );


function payper_plugin_menu() {
	add_menu_page( 'Pay Per Media', 'Pay Per Media', 'payper_playlist', 'payper-options', 'wp_payper_options',plugin_dir_url( __FILE__ )."/html5mp3.png" );
	/*add_submenu_page('payper-options','','','manage_options','payper-options','wp_payper_options');*/
	add_submenu_page('payper-options', 'Manage Playlist', 'Manage Playlist', 'manage_options', 'payper_playlist', 'wp_payper_playlist' );
	add_submenu_page('payper-options', 'Saved Playlist', 'Saved Playlist', 'manage_options', 'payper_saved_playlist', 'wp_payper_saved_playlist' );
	add_submenu_page('payper-options', 'PayPal', 'PayPal', 'manage_options', 'payper_paypal', 'wp_add_payper_paypal' );	
	add_submenu_page('payper-options','Help','Help','manage_options','payper_help','wp_payper_help');
	
}


add_action( 'admin_init', 'register_paypersettings' );

function register_paypersettings() {
	/*register_setting( 'baw-settings-group', 'buy_text' );
	register_setting( 'baw-settings-group', 'color' );
	register_setting( 'baw-settings-group', 'showlist' );
	register_setting( 'baw-settings-group', 'showbuy' );
	register_setting( 'baw-settings-group', 'payper_description' );
	register_setting( 'baw-settings-group', 'currency' );
	register_setting( 'baw-settings-group', 'tracks' );
	register_setting( 'baw-settings-group', 'tcolor' );*/
}



function wp_payper_help() {


include 'payper/help.php';

}



function wp_payper_options() {

 global $wpdb;
	$table		=	$wpdb->prefix.'payper_playlist';

//include 'player/settings.php';
include 'payper/formplus.php';

}



function wp_payper_playlist(){

global $wpdb;
$table		=	$wpdb->prefix.'payper_playlist';	
		
include('payper/index.php');
		
}


function wp_payper_saved_playlist(){

global $wpdb;
	$table		=	$wpdb->prefix.'payper_playlist';	
		
include('payper/playlist.php');
		
}




function wp_add_payper_playlist(){

global $wpdb;
$table		=	$wpdb->prefix.'payper_playlist';	
		
include('payper/index.php');
		
}


function wp_add_payper_paypal(){

global $wpdb;
	$table		=	$wpdb->prefix.'payper_playlist';	
		
include('payper/paypal.php');
		
}



function payper_player1($content){
	
	
    global $wpdb;
	$table		=	$wpdb->prefix.'payper_playlist';	
	  
	$pluginurl	=	plugin_dir_url( __FILE__ );

    //$regex = '/\[payper (.*?)]/i';
	
	$regex = '/\[payper(\s+id=([0-9]+))?(\s+type=([a-z]+))?\s*}(.*)\]/i';
    preg_match_all( $regex, $content, $matches );
	//echo "<pre>";
	//print_r($matches);

    //include('payper/html5.php');

    $player_div	=	'<div id="myplayer">'.$content.'</div>';
    return $player_div;

}


function wp_payper_player( $atts, $content = null ) {

   global $wpdb;
   $table		=	$wpdb->prefix.'payper_playlist';	
	  
   $pluginurl	=	plugin_dir_url( __FILE__ );

   extract( shortcode_atts( array(
		'id' => '1',
		'width' => '600',
		'height' => '250',
		'fcolor' => '343434',
		'bcolor' => 'ff0000',
		'tcolor1' => 'ffffff',
		'tcolor2' => 'a19b9b',
		'dlicon' => '',
		'dlpos' => '10',
		'links' => '0',
		'stitle' => '0',
		'size' => 'full',
	), $atts ) );

	
	
	/* Actual Player code */
	
	$host = $pluginurl.'payper/';
	
	
	include('payper/player.php');
		
	
	/* Actual Player code */

    return '<span>' . $content . '</span>';
}

add_shortcode('payper','wp_payper_player');

//add_filter('the_content','wp_payper_player');

/*function payper_styles_method() {

    wp_register_style( 'custom-style', plugins_url('/payper/css/ui.tabs.css', __FILE__) );
    wp_enqueue_style( 'custom-style' );
	
}    
 
add_action('wp_enqueue_styles', 'payper_styles_method');



function payper_scripts_method()
{
	
	wp_register_script( 'custom-script', plugins_url( '/payper/js/ui.tabs.pack.js', __FILE__ ) );
	
	wp_enqueue_script( 'custom-script' );
		
}

add_action( 'wp_enqueue_scripts', 'payper_scripts_method' );*/


function payper_scripts_method() {
	
	wp_register_style( 'custom-style', plugins_url('/payper/css/ui.tabs.css', __FILE__) );
    wp_enqueue_style( 'custom-style' );
	
	wp_register_style( 'custom-style1', plugins_url('/payper/css/default.css', __FILE__) );
    wp_enqueue_style( 'custom-style1' );
	
	wp_register_script( 'custom-script', plugins_url( '/payper/js/ui.tabs.js', __FILE__ ) );
    wp_enqueue_script( 'custom-script' );
	
	wp_register_script( 'custom-script1', plugins_url( '/payper/js/jscolor.js', __FILE__ ) );
    wp_enqueue_script( 'custom-script1' );
	
	wp_register_script( 'custom-script2', plugins_url( '/payper/js/core.js', __FILE__ ) );
    wp_enqueue_script( 'custom-script2' );
	
	
	
}    
 
add_action('wp_enqueue_scripts', 'payper_scripts_method');
