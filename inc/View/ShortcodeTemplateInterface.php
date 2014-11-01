<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\View;


interface ShortcodeTemplateInterface {

	/**
	 * @param string $void
	 * @param array $attributes
	 * @param       $content
	 *
	 * @return string
	 */
	public function get_output( $void, array $attributes, $content = NULL );
} 