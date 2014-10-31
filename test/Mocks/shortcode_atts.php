<?php # -*- coding: utf-8 -*-

if ( ! function_exists( 'shortcode_atts' ) ) {

	function shortcode_atts(
		Array $default_attributes,
		Array $attributes,
		$shortcode = ''
	) {

		return array_merge( $default_attributes, $attributes );
	}
}