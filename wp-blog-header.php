<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( !isset($wp_did_header) ) {

	echo(dirname(__FILE__) . '/wp-load.php');
	$wp_did_header = true;

	require_once( dirname(__FILE__) . '/wp-load.php' );

	wp();

	require_once( ABSPATH . WPINC . '/template-loader.php' );

}else{
	echo "else";
}

?>