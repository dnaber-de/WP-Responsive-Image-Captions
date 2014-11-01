<?php # -*- coding: utf-8 -*-

namespace ResponsiveImageCaption;

class ResponsiveImageCaptions {

	/**
	 * main plugin data
	 *
	 * @type \stdClass
	 */
	private $data;

	/**
	 * @param \stdClass $data
	 */
	function __construct( \stdClass $data ) {

		$this->data = $data;
	}

	function run() {

		$attributes = apply_filters(
			'ric_data_model',
			new Model\CaptionShortcodeAttributes
		);
		$handler = new Controller\CaptionShortcodeHandler( $attributes );
		$view = apply_filters(
			'ric_shortcode_view',
			current_theme_supports( 'html5', 'caption' )
				? new View\CaptionShortcodeHTML5Template( $attributes, $handler )
				: new View\CaptionShortcodeTemplate( $attributes, $handler )
		);

		add_filter('img_caption_shortcode', array( $view, 'get_output' ), 10, 3 );
	}

}