<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\Test\Unit;
use \ResponsiveImageCaption\Test\Cases;
use \ResponsiveImageCaption\Controller;

class TestCaptionShortcodeHandler extends Cases\BootstrapedTestCase {

	public function setUp() {

		$this->maybe_bootstrap();
		$this->load_mock( 'shortcode_atts' );
		$this->load_mock( 'do_shortcode' );
	}

	/**
	 * @dataProvider attributeProvider
	 * @param array $attributes
	 * @param string $content
	 */
	public function test_parse_shortcode_attributes( Array $attributes, $content ) {

		$defaults  = array(
			'id'      => '',
			'align'   => 'alignnone',
			'width'   => '',
			'caption' => '',
			'class'   => ''
		);
		$model_mock = $this->getMockBuilder( '\ResponsiveImageCaption\Model\CaptionShortcodeAttributes' )
			->getMock();
		foreach ( $defaults as $key => $default_value ) {
			if ( 'class' == $key )
				continue;

			$method = 'set_' . $key;
			$value = isset( $attributes[ $key ] )
				? $attributes[ $key ]
				: $default_value;
			$model_mock->expects( $this->exactly( 1 ) )
				->method( $method )
				->with( $value );
		}

		// mock set_class separate
		$class = 'wp-caption ';
		if ( isset( $attributes[ 'align' ] ) )
			$class .= $attributes[ 'align' ] . ' ';
		elseif ( isset( $defaults[ 'align' ] ) )
			$class .= $defaults[ 'align' ];

		if ( isset( $attributes[ 'class' ] ) )
			$class .= $attributes[ 'class' ];
		elseif ( $defaults[ 'class' ] )
			$class .= $defaults[ 'class' ];

		$model_mock->expects( $this->exactly( 1 ) )
			->method( 'set_class' )
			->with( trim( $class ) );

		$model_mock->expects( $this->exactly( 1 ) )
			->method( 'set_content' )
			->with( $content );

		$testee = new Controller\CaptionShortcodeHandler( $model_mock );
		$this->assertTrue(
			$testee->parse_shortcode_attributes( $attributes, $content )
		);
	}

	/**
	 * @return array
	 */
	public function attributeProvider() {

		return array(
			array(
				array(
					'id'    => 'wp-caption-123',
					'align' => 'center',
					'width' => '640',
					'caption' => 'What a picture!',
					'class' => 'foo'
				),
				'Shortcode Content'
			),
			array(
				array(
					'id'    => '',
					'align' => '',
					'width' => 0,
					'caption' => '',
					'class' => ''
				),
				''
			),
			array(
				array(),
				''
			)
		);
	}
}
 