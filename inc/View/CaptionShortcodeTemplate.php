<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\View;
use \ResponsiveImageShortcode\Controller;
use \ResponsiveImageShortcode\Model;


class CaptionShortcodeTemplate implements ShortcodeTemplateInterface {

	/**
	 * @type Model\CaptionShortcodeAttributesInterface
	 */
	private $attributes;

	/**
	 * @type Controller\ShortcodeHandlerInterface
	 */
	private $controller;

	/**
	 * @param Model\CaptionShortcodeAttributesInterface $attributes
	 * @param Controller\ShortcodeHandlerInterface     $controller
	 */
	function __construct(
		Model\CaptionShortcodeAttributesInterface $attributes,
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

		$this->controller->parse_shortcode_attributes( $attributes, $content );

		$id    = esc_attr( $this->attributes->get_id() );
		$class = esc_attr( $this->attributes->get_class() );
		$content = $this->attributes->get_content(); // don't escape HTML inside
		$caption = $this->attributes->get_caption();

		$output = <<<HTML
<div id="{$id}" class="{$class}">
	{$content}
	<p class="wp-caption-text">{$caption}</p>
</div>
HTML;

		return $output;
	}

}