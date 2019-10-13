<?php
/*
Plugin Name: Circle Audio Player
Plugin URI: https://github.com/shaif-uddin/circleaudioplayer
Description: Play Circle Audio Player for WordPress
Version: 1.0
Author: Shaif Uddin Ahamed
Author URI: http://tech.sugrihini.com
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: circleaudioplayer
Domain Path: /languages
*/
add_action('wp_enqueue_scripts','circleaudioplayer_assets');
function circleaudioplayer_assets(){
    wp_register_style( 'progres-bar', plugins_url( '/progres-bar.css' , __FILE__ ));
	wp_register_script( 'player', plugins_url( '/player.js' , __FILE__ ),array("jquery"),'0.0.1',true);
    wp_register_script( 'main', plugins_url( '/main.js' , __FILE__ ), array("jquery","player") ,'1.0.2',true);
}

function circleaudioplayer( $atts ) {
	$a = shortcode_atts( array(
		'src' => ''
	), $atts );

	return '<div class="mediPlayer">
    <audio class="listen" preload="none" data-size="250" src="' . $a['src'] . '"></audio></div></div>';

}

add_shortcode( 'circleaudio', 'circleaudioplayer' );