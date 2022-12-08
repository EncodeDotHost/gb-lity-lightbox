<?php
/**
 * Plugin Name: GB Lity Lightbox Plugin
 * Plugin URI: https://github.com/EncodeDotHost/gb-lity-lightbox
 * Description: A WordPress plugin, specifically for GenerateBlock Pro, to add a simple lightbox to a container link
 * Author: EncodeDotHost
 * Author URI: https://encode.host
 * Version: 1.0.0
 * Requires at least: 5.6
 * Requires PHP: 5.6
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Scripts and Styles for the Lightbox */
function gb_enqueue_lily(){
  wp_enqueue_style('lity-styles', plugin_dir_url( __FILE__ ). 'assets/css/lity.min.css', array(), '2.4.1', 'all');
  wp_enqueue_script( 'lity-script', plugin_dir_url( __FILE__ ). 'assets/js/lity.min.js', array(), '2.4.1', true );
  wp_enqueue_script( 'lity-youtube-script', plugin_dir_url( __FILE__ ). 'assets/js/youtube.min.js', array(), '2.4.1', true );
  wp_enqueue_script( 'lity-vimeo-script', plugin_dir_url( __FILE__ ). 'assets/js/vimeo.min.js', array(), '2.4.1', true );
  wp_enqueue_script( 'lity-googlemaps-script', plugin_dir_url( __FILE__ ). 'assets/js/googlemaps.min.js', array(), '2.4.1', true );
}
add_action( 'wp_enqueue_scripts', 'gb_enqueue_lily', 100 );

add_filter( 'render_block', function( $block_content, $block ) {
  if ( !is_admin() && ! empty( $block['attrs']['className'] ) && strpos( $block['attrs']['className'], 'gb-lity-lightbox' ) !== false ) {
  $myreplace1 = '<a';
  $myinsert1 = '<a data-lity';
      $block_content = str_replace( $myreplace1, $myinsert1 , $block_content );
  }

  return $block_content;
}, 10, 2 );