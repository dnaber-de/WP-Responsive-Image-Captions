<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\View;


interface ShortcodeTemplateInterface {

	/**
	 * @param array $attributes
	 * @param       $content
	 *
	 * @return string
	 */
	public function get_output( array $attributes, $content = NULL );
} 