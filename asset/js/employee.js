/**
 * Js File for PDF and Update.
 *
 * @package Employee-Form.
 */

jQuery( document ).ready(
	function($){

		// For Update.
		$( '.abc' ).click(
			function(){
				var id1 = 'get-' + $( this ).attr( "id" ) + '-1';
				var id2 = 'get-' + $( this ).attr( "id" ) + '-2';
				var id3 = 'get-' + $( this ).attr( "id" ) + '-3';
				var id4 = 'get-' + $( this ).attr( "id" ) + '-4';

				var id5  = 'get-' + $( this ).attr( "id" ) + '-5';
				var id6  = 'get-' + $( this ).attr( "id" ) + '-6';
				var id7  = 'get-' + $( this ).attr( "id" ) + '-7';
				var id8  = 'get-' + $( this ).attr( "id" ) + '-8';
				var id9  = 'get-' + $( this ).attr( "id" ) + '-9';
				var id10 = 'get-' + $( this ).attr( "id" ) + '-10';

				$( '#first_name' ).val( $( '#' + id1 + '' ).text() )
				$( '#last_name' ).val( $( '#' + id2 + '' ).text() )
				$( '#email' ).attr( "readonly", "" );
				$( '#email' ).val( $( '#' + id3 + '' ).text() )
				$( '#image' ).val( $( '#' + id4 + '' ).text() )
				$( '#jdate' ).val( $( '#' + id5 + '' ).text() )
				$( '#mobile' ).val( $( '#' + id6 + '' ).text() )
				$( '#designation' ).val( $( '#' + id7 + '' ).text() )

				// Checkbox.
				var Checkbox          = $( 'input:checkbox[name=agree]' );
				var selected_checkbox = ($( '#' + id9 + '' ).text())
				if (selected_checkbox == '—') {
					Checkbox.filter( '[value=agree]' ).prop( 'checked', false );
				} else {
					Checkbox.filter( '[value=agree]' ).prop( 'checked', true );
				}

				// Multi selection.
				var get_multi_value = ( $( '#' + id10 + '' ).text() );
				var abc             = get_multi_value.split( ', ' )
				$( '#multiple_select_skill' ).val( abc )
				$( '#multiple_select_skill' ).trigger( 'change' )

				// Radio Buttons.
				var $radios         = $( 'input:radio[name=gender]' );
				var selected_gender = ($( 'td#' + id8 + '' ).text())
				$radios.filter( '[value=' + selected_gender + ']' ).prop( 'checked', true );
			}
		);

		// Print PDF.
		$( '.pdf' ).click(
			function () {
				id = $( this ).attr( "id" );

				var pid1 = 'get-' + id + '-1';
				var pid2 = 'get-' + id + '-2';
				var pid3 = 'get-' + id + '-3';
				var pid4 = 'get-' + id + '-4';
				var pid5 = 'get-' + id + '-5';
				var pid6 = 'get-' + id + '-6';
				var pid7 = 'get-' + id + '-7';
				var pid8 = 'get-' + id + '-8';
				var pid9 = 'get-' + id + '-10';

				var fname = document.getElementById( pid1 ).innerText
				var lname = document.getElementById( pid2 ).innerText
				var email = document.getElementById( pid3 ).innerText
				var img   = document.getElementById( pid4 ).firstChild.src

				var joing_date  = document.getElementById( pid5 ).innerText
				var phone       = document.getElementById( pid6 ).innerText
				var designation = document.getElementById( pid7 ).innerText
				var skills      = document.getElementById( pid9 ).innerText
				var gender      = document.getElementById( pid8 ).innerText

				to_be_print = window.open( "" );

				to_be_print.document.write(
					` <div style = "padding:50px" >
						<h3> Employee Details </h3>
						<img src = "${img}" width = "100" height = "100" />
						<p> <b> Name : </b> ${fname} ${lname} <br> </p>
						<p> <b> E - mail : </b> ${email} <b style = "margin-left:20px;" > Joining Date : </b> ${joing_date} <br>
						<p><b> Phone Number : </b> ${phone} <br></p>
						<p> <b> Designation : </b> ${designation} <b style = "margin-left:20px;" > Gender : </b> ${gender} <br>
						<p> <b> Skills : </b> ${skills} </p>
					</div> `
				);

				to_be_print.print();
				to_be_print.close();

			}
		);

		// Search bar.
		$( "#search_input" ).on(
			"keyup",
			function() {
				var value = $( this ).val().toLowerCase();
				$( "#seacrh_table tr" ).filter(
					function() {
						$( this ).toggle( $( this ).text().toLowerCase().indexOf( value ) > -1 )
					}
				);
			}
		);

		// multi Drop Down.
		$( '#multiple_select_skill' ).select2( {} );

	}
);
