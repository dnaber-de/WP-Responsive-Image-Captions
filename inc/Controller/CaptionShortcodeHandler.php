<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\Controller;
use \ResponsiveImageShortcode\Model;


class CaptionShortcodeHandler implements ShortcodeHandlerInterface {

	/**
	 * @type Model\CaptionShortcodeAttributes
	 */
	private $attributes;

	/**
	 * @param Model\CaptionShortcodeAttributeInterface $attributes
	 */
	public function __construct( Model\CaptionShortcodeAttributeInterface $attributes ) {

		$this->attributes = $attributes;
	}

	/**
	 * @param array  $attributes
	 * @param string $content
	 *
	 * @return bool|\WP_Error
	 */
	public function parse_shortcode_attributes( array $attributes, $content = NULL ) {
		// TODO: Implement parse_shortcode_attributes() method.

		return TRUE;
	}

} 