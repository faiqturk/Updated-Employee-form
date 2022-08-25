<?php
/**
 * Table for Display Details of Employees.
 *
 * @package Employee-Form.
 */

?>

<div class="container">
	<h2>All Employees</h2>
	<label>Search</label>
	<input id="search_input" type="text" placeholder="Search.." >
	<br><br>          
	<table class="wp-list-table widefat fixed striped table-view-list posts">
		<thead>
		<tr>
			<th>S.No</th>
			<th>Image</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
			<th>joining date</th>
			<th>Mobile No.</th>
			<th>Designation</th>
			<th>Gender</th>
			<th>Terms</th>
			<th>skill</th>
			<th>Actions<th>
		</tr>
		</thead>
		<tbody id="seacrh_table">
		<?php
		$i = 1;
		foreach ( $result as $row ) {
			$id = $row->id;
			?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-4"><img src="<?php echo esc_html( __( $row->img, 'Employee-Form' ) ); ?>" style="width:40px;height:40px;border-radius:25px;;"></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-1" class ="capital_first_letter"><?php echo esc_html( __( $row->fname, 'Employee-Form' ) ); ?></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-2" class ="capital_first_letter"><?php echo esc_html( __( $row->lname, 'Employee-Form' ) ); ?></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-3"><?php echo esc_html( __( $row->email, 'Employee-Form' ) ); ?></td>

			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-5"><?php echo esc_html( __( $row->joining_date, 'Employee-Form' ) ); ?></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-6"><?php echo esc_html( __( $row->phone_no, 'Employee-Form' ) ); ?></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-7" class ="capital_first_letter"><?php echo esc_html( __( $row->desgination, 'Employee-Form' ) ); ?></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-8" class ="capital_first_letter"><?php echo esc_html( __( $row->gender, 'Employee-Form' ) ); ?></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-9"><?php echo esc_html( __( $row->checking, 'Employee-Form' ) ); ?></td>
			<td id="get-<?php echo esc_html_e( $id, 'Employee-Form' ); ?>-10"><?php echo esc_html( __( $row->skill, 'Employee-Form' ) ); ?></td>

			<form method="GET">
			<td>
				<a href="<?php echo admin_url() . 'options-general.php?page=employee-form&dlt=' . $id; ?>" style="text-decoration: none;color: #b32d2e;"> Delete </a>
			</form>
			<b>|</b>
			<a id ="<?php echo esc_html_e( $id, 'Employee-Form' ); ?>" class="abc" style="text-decoration: none;cursor:pointer"> Update</button>
			<b>|</b>
			<a id ="<?php echo esc_html_e( $id, 'Employee-Form' ); ?>" class="pdf" style="text-decoration: none;cursor:pointer"> PDF</a>  
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

