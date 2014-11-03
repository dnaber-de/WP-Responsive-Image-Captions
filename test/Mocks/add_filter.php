<?php # -*- coding: utf-8 -*-

if ( ! function_exists( 'add_filter' ) ) {

	function add_filter() {

		if ( isset( $GLOBALS[ 'function_mock' ] ) )
			return call_user_func_array(
				array( $GLOBALS[ 'function_mock' ], __FUNCTION__ ),
				func_get_args()
			);

	}
}