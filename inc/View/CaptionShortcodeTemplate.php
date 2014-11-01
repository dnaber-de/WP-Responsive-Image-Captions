<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\View;
use \ResponsiveImageCaption\Controller;
use \ResponsiveImageCaption\Model;


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
	 * @param string $void
	 * @param array $attributes
	 * @param       $content
	 *
	 * @return string
	 */
	public function get_output( $void, array $attributes, $content = NULL ) {

		$this->controller->parse_shortcode_attributes( $attributes, $content );

		$id    = esc_attr( $this->attributes->get_id() );
		$class = esc_attr( $this->attributes->get_class() );
		$content = $this->attributes->get_content(); // don't escape HTML inside
		$caption = $this->attributes->get_caption();
		$additional_attributes = '';
		foreach ( $this->attributes->get_additional_attributes() as $name => $value ) {
			$name = esc_attr( $name );
			$value = esc_attr( $value );
			$additional_attributes .= " $name=\"$value\"";
		}
		$output = <<<HTML
<div id="{$id}" class="{$class}"{$additional_attributes}>
	{$content}
	<p class="wp-caption-text">{$caption}</p>
</div>
HTML;

		return $output;
	}

}