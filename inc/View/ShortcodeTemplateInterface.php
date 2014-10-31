<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\View;


interface ShortcodeTemplateInterface {

	/**
	 * @param array $attributes
	 * @param       $content
	 *
	 * @return string
	 */
	public function get_output( array $attributes, $content = NULL );
} 