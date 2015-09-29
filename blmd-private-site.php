<?php
/*
Plugin Name: BLMD Private Site
Plugin URI: https://github.com/blmd/blmd-private-site
Description: Require login in order to view site
Author: blmd
Author URI: https://github.com/blmd
Version: 0.2

GitHub Plugin URI: https://github.com/blmd/blmd-private-site
*/

!defined( 'ABSPATH' ) && die;
define( 'BLMD_PRIVATE_SITE_VERSION', '0.2' );
define( 'BLMD_PRIVATE_SITE_URL', plugin_dir_url( __FILE__ ) );
define( 'BLMD_PRIVATE_SITE_DIR', plugin_dir_path( __FILE__ ) );
define( 'BLMD_PRIVATE_SITE_BASENAME', plugin_basename( __FILE__ ) );

add_filter( 'pre_option_blog_public', '__return_zero' );
add_action( "parse_request", function() {
	global $pagenow;
	( $pagenow != 'wp-login.php' && is_user_logged_in() ) || auth_redirect();
} );
