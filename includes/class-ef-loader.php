<?php
	/**
	 * Main Loader File.
	 *
	 * @package Employee-Form
	 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'EF_Loader' ) ) {

	/**
	 * Class EF_Loader
	 */
	class EF_Loader {

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->includes();
			add_action( 'admin_enqueue_scripts', array( $this, 'mmp_admin_enqueue_scripts' ) );
			add_action( 'init', array( $this, 'create_table' ) );
		}

		/**
		 * Function for Including Files and Classes.
		 */
		public function includes() {
			include_once 'class-ef-tab.php';
		}

		/**
		 * Enqueue File For Admin.
		 */
		public function mmp_admin_enqueue_scripts() {
			wp_register_style( 'select2css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', false, wp_rand(), 'all' );
			wp_register_script( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array( 'jquery' ), wp_rand(), true );
			wp_enqueue_style( 'select2css' );
			wp_enqueue_script( 'select2' );
			wp_enqueue_script( 'ef_admin_script', plugin_dir_url( __DIR__ ) . 'asset/js/employee.js', array( 'jquery' ), wp_rand() );
			wp_enqueue_style( 'ef_admin_style', plugin_dir_url( __DIR__ ) . 'asset/css/employee-form.css' );
		}

		/**
		 * Function for make a table of employees.
		 */
		public function create_table() {

			global $wpdb;

			$table_name = $wpdb->prefix . 'employee';

			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			  id bigint(20) NOT NULL AUTO_INCREMENT,
			  fname varchar(50) NOT NULL,
			  lname varchar(50) NOT NULL,
			  email varchar(50) NOT NULL,
			  img varchar(350) NOT NULL,
			  joining_date DATE NOT NULL,
			  phone_no BIGINT NOT NULL,
			  desgination varchar(150) NOT NULL,
			  gender varchar(50) NOT NULL,
			  checking varchar(20) NOT NULL,
			  skill varchar(150) NOT NULL,
			  PRIMARY KEY id (id)
			) $charset_collate;";

			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}
	}
}
new EF_Loader();

