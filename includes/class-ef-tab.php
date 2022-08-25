<?php
/**
 * Employee Form in Setting Tab.
 *
 * @package Employee-Form.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EF_Tab' ) ) {
	/**
	 * Class EF_Tab
	 */
	class EF_Tab {

		/**
		 * Construct
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'wpdocs_register_my_custom_menu_page' ) );
			$this->save_employees_data();
			$this->delete_employee_data();
		}
		/**
		 * Create a tab in setting menu page.
		 */
		public function wpdocs_register_my_custom_menu_page() {
			add_submenu_page(
				'options-general.php',
				'Employees',
				'Employee Form',
				'administrator',
				'employee-form',
				array( $this, 'my_custom_menu_page' ),
				null
			);
		}

		/**
		* Display a Form and Table of Employees
		*/
		public function my_custom_menu_page() {
			global $wpdb;
			$employees = $wpdb->prefix . 'employee';
			$result    = $wpdb->get_results( "SELECT * FROM $employees" );
			include_once dirname( __DIR__ ) . '/templates/employee-form.php';
			include_once dirname( __DIR__ ) . '/templates/data.php';

		}

		/**
		* Save the data of employees form.
		*/
		public function save_employees_data() {
			global $wpdb;
			$employees = $wpdb->prefix . 'employee';
			$result    = $wpdb->get_results( "SELECT email FROM $employees" );
			$proceed   = '';
			$profile   = '';
			if ( isset( $_POST['submit'] ) ) {
				$fname    = $_POST['fname'];
				$lastname = $_POST['lastname'];
				$email    = $_POST['email'];
				$image    = $_FILES['image'];

				$jdate       = $_POST['jdate'];
				$mobile      = $_POST['mobile'];
				$designation = $_POST['designation'];
				$gender      = $_POST['gender'];
				$skill       = implode( ', ', $_POST['skills'] );
				if ( isset( $_POST['agree'] ) == true ) {
					$check = $_POST['agree'];
				} else {
					$check = '—';
				}

				// For Image.
				require_once ABSPATH . '/wp-includes/pluggable.php';
				require_once ABSPATH . 'wp-admin/includes/file.php';

				$upload = wp_handle_upload(
					$image,
					array( 'test_form' => false )
				);

				if ( ! empty( $upload['error'] ) ) {
					wp_die( $upload['error'] );
				}

				// it is time to add our uploaded image into WordPress media library.
				$attachment_id = wp_insert_attachment(
					array(
						'guid'           => $upload['url'],
						'post_mime_type' => $upload['type'],
						'post_title'     => basename( $upload['file'] ),
						'post_content'   => '',
						'post_status'    => 'inherit',
					),
					$upload['file']
				);

				$profile = $upload['url'];

				if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
					wp_die( 'Upload error.' );
				}

				// update medatata, regenerate image sizes.
				require_once ABSPATH . 'wp-admin/includes/image.php';

				wp_update_attachment_metadata(
					$attachment_id,
					wp_generate_attachment_metadata( $attachment_id, $upload['file'] )
				);

				// For Update.
				foreach ( $result as $key => $value ) {
					foreach ( $value as $nested_key => $nested_value ) {
						if ( $nested_key != 'email' ) {
							continue;
						} elseif ( $email == $nested_value ) {
							$proceed = 'to_update';
							break;
						}
					}

					if ( $proceed == 'to_update' ) {
						break;
					}
				}
				if ( 'to_update' == $proceed ) {
					$wpdb->update(
						$employees,
						array(
							'fname'        => $fname,
							'lname'        => $lastname,
							'email'        => $email,
							'img'          => $profile,
							'joining_date' => $jdate,
							'phone_no'     => $mobile,
							'desgination'  => $designation,
							'gender'       => $gender,
							'checking'     => $check,
							'skill'        => $skill,
						),
						array(
							'email' => $email,
						)
					);
				} else {
					$wpdb->insert(
						$employees,
						array(
							'fname'        => $fname,
							'lname'        => $lastname,
							'email'        => $email,
							'img'          => $profile,
							'joining_date' => $jdate,
							'phone_no'     => $mobile,
							'desgination'  => $designation,
							'gender'       => $gender,
							'checking'     => $check,
							'skill'        => $skill,
						)
					);
				}
			}
		}

		/**
		* Delete a Employee details.
		*/
		public function delete_employee_data() {

			global $wpdb;
			$employees = $wpdb->prefix . 'employee';
			if ( isset( $_GET['dlt'] ) ) {
				$dlt_id = $_GET['dlt'];
				// echo $dlt_id;
				$wpdb->delete(
					$employees,
					array(
						'id' => $dlt_id,
					)
				);
			}
		}
	}
}

new EF_Tab();
