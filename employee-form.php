<?php
/**
 * Plugin Name:       Employee From
 * Description:       For collection of employee data.
 * Version:           1.1.1.1
 * Author:            Codup
 * Author URI:        https://codup.co
 * Text Domain:       Employee-Form
 *
 * @package Employee-Form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'EF_PLUGIN_DIR' ) ) {
	define( 'EF_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'EF_PLUGIN_DIR_URL' ) ) {
	define( 'EF_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'EF_ABSPATH' ) ) {
	define( 'EF_ABSPATH', dirname( __FILE__ ) );
}
	require_once EF_ABSPATH . '/includes/class-ef-loader.php';

