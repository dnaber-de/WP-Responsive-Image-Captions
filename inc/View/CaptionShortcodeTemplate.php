<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\View;
use \ResponsiveImageShortcode\Controller;
use \ResponsiveImageShortcode\Model;


class CaptionShortcodeTemplate implements ShortcodeTemplateInterface {

	/**
	 * @type Model\CaptionShortcodeAttributeInterface
	 */
	private $attributes;

	/**
	 * @type Controller\ShortcodeHandlerInterface
	 */
	private $controller;

	/**
	 * @param Model\CaptionShortcodeAttributeInterface $attributes
	 * @param Controller\ShortcodeHandlerInterface     $controller
	 */
	function __construct(
		Model\CaptionShortcodeAttributeInterface $attributes,
		Controller\ShortcodeHandlerInterface $controller
	) {

		$this->attributes = $attributes;
		$this->controller = $controller;
	}

	/**
	 * @param array $attributes
	 * @param       $content
	 *
	 * @return string
	 */
	public function get_output( array $attributes, $content = NULL ) {
		// TODO: Implement get_output() method.

		return '';
	}

}