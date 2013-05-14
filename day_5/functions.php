<?php
// a helper function to display error for form
function display_error ( $array, $key){
	if (isset($array[$key]) ){
		$message = $array[$key];
		echo "<div class='error_message'>$message</div>";
	}	
}

//keep form fields
function sticky_field( $field ){
	if (isset($field)) {
		echo $field;
	}

}

//for sticky checkbox
function checked( $expected, $actual ){
	if( $actual == $expected ){
		echo 'checked="checked"';
	}
}

//no close php

