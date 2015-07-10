<?php
/**
 * @package DramaPress
 * @version 1.0
 */
/*
Plugin Name: DramaPress
Plugin URI: http://wordpress.org/plugins/dramapress/
Description: This is not just a plugin, it symbolizes the angst and ire of an entire generation summed up in a few words. When activated you will randomly see WordPress related drama spewing forth. More drama will be added as it becomes available.
Author: DramaPress
Version: 1.1
*/

function dramapress_get_drama() {
	/** spew */
	$spew = "The Customizer is so ugly!
I'm too old to use the Customizer!
I can't use the Customizer because I have glasses!
Oh no he didn't use 'wordpress' in a domain name!
My hosting company sucks because I run crappy code and they won't fix it!
HeroPress is so sexist because they couldn't get many females to participate!
I can't disable a part of WordPress, they're forcing their views on me!
(PROTIP: If you don't like something, don't use it.)
WP isn't abstract enough so the code sucks!
Jetpack is too bloated for me to understand that a deactivated module doesn't add any overhead!
I don't like Jetpack, so it MUST be breaking rules somehow!
Matt MUST be corrupt because he runs a company!
My patch didn't get into core so the core devs must hate me!
My hosting company sucks because they didn't stop me from installing an exploitable plugin!
How dare Automattic purchase a domain name!?";

	// Here we split it into lines
	$spew = explode( "\n", $spew );

	// And then randomly choose a line
	return wptexturize( $spew[ mt_rand( 0, count( $spew ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function dramapress() {
	$chosen = dramapress_get_drama();
	echo "<p id='drama'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'dramapress' );

// We need some CSS to position the paragraph
function drama_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#drama {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'drama_css' );

?>
