<?php
/*
Plugin Name: BLMD Private Site
Plugin URI: http://github.com/blmd/blmd-private-site
Description: Require login in order to view site
Author: blmd
Author URI: http://github.com/blmd
Version: 0.1
*/

add_filter( 'pre_option_blog_public', '__return_zero' );
add_action( "parse_request", function() {
	global $pagenow;
	( $pagenow != 'wp-login.php' && is_user_logged_in() ) || auth_redirect();
} );
