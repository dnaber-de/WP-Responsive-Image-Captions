<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\Test\Unit;
use \ResponsiveImageCaption\Test\Cases;
use \ResponsiveImageCaption\ResponsiveImageCaptions;


class TestResponsiveImageCaptions extends Cases\BootstrapedTestCase {

	public function setUp() {

		$this->maybe_bootstrap();
		$this->load_mock( 'FunctionMocker' );
		$this->load_mock( 'add_filter' );
		$this->load_mock( 'apply_filters' );
		$this->load_mock( 'current_theme_supports' );
	}

	public function test_run() {

		$mock = $this->getMockBuilder( '\ResponsiveImageCaption\Test\Mocks\FunctionMocker' )
			->getMock();

		//mock add_filter() and test the call
		$mock->expects( $this->exactly( 1 ) )
			->method( 'add_filter' )
			->with(
				'img_caption_shortcode',
				$this->callback(
					function( $expected_callback ) {
						$args = func_get_args();
						if ( ! is_array( $args[ 0 ] ) )
							return FALSE;
						if ( ! is_a( $args[ 0 ][ 0 ], '\ResponsiveImageCaption\View\ShortcodeTemplateInterface' ) )
							return FALSE;

						return 'get_output' == $args[ 0 ][ 1 ];
					}
				),
				10,
				3
			)
			->willReturn( '' );
		$GLOBALS[ 'function_mock' ] = $mock;

		//Todo mock the apply_filters() function properly

		$testee = new ResponsiveImageCaptions( new \stdClass ); //plugin data not used yet
		$testee->run();
	}
}
 