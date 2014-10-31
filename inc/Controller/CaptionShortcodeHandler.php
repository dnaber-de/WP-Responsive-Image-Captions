<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\Controller;
use \ResponsiveImageShortcode\Model;


class CaptionShortcodeHandler implements ShortcodeHandlerInterface {

	/**
	 * @type Model\CaptionShortcodeAttributes
	 */
	private $attributes;

	/**
	 * @param Model\CaptionShortcodeAttributesInterface $attributes
	 */
	public function __construct( Model\CaptionShortcodeAttributesInterface $attributes ) {

		$this->attributes = $attributes;
	}

	/**
	 * @param array  $attributes
	 * @param string $content
	 *
	 * @return bool|\WP_Error
	 */
	public function parse_shortcode_attributes( array $attributes, $content = NULL ) {

		$default_attributes = array(
			'id'      => '',
			'align'   => 'alignnone',
			'width'   => '',
			'caption' => '',
			'class'   => '',
		);
		$attributes = shortcode_atts(
			$default_attributes,
			$attributes,
			'caption'
		);

		foreach ( $attributes as $key => $value ) {
			if ( 'class' == $key )
				continue;
			$setter = "set_$key";
			$this->attributes->$setter( $value );
		}
		$this->attributes->set_class(
			trim( "wp-caption {$attributes[ 'align' ]} {$attributes[ 'class' ]}" )
		);
		$this->attributes->set_content( do_shortcode( $content ) );

		return TRUE;
	}
} 