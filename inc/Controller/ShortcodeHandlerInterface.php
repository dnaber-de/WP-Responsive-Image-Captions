<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\Controller;


interface ShortcodeHandlerInterface {

	/**
	 * @param array $attributes
	 * @param string $content
	 *
	 * @return bool|\WP_Error
	 */
	public function parse_shortcode_attributes( array $attributes, $content = NULL );
} 