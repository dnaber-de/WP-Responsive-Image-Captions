<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\Test\Unit;
use \ResponsiveImageCaption\Test\Cases;
use \ResponsiveImageCaption\View;


class TestCaptionShortcodeHTML5Template extends Cases\BootstrapedTestCase {

	public function setUp() {

		$this->maybe_bootstrap();
		$this->load_mock( 'esc_attr' );
	}

	public function test_get_output() {

		$model_mock = $this->getMockBuilder( '\ResponsiveImageCaption\Model\CaptionShortcodeAttributes' )
			->getMock();

		$model_mock->expects( $this->any() )
			->method( 'get_id' )
			->willReturn( 'caption-1' );

		$model_mock->expects( $this->any() )
			->method( 'get_class' )
			->willReturn( 'wp-caption aligncenter' );

		$model_mock->expects( $this->any() )
			->method( 'get_content' )
			->willReturn( '<img src="img/photo.png" alt="" width="400" height="200" />' );

		$model_mock->expects( $this->any() )
			->method( 'get_caption' )
			->willReturn( 'This is the Caption' );

		$model_mock->expects( $this->any() )
			->method( 'get_align' )
			->willReturn( 'aligncenter' );

		$model_mock->expects( $this->any() )
			->method( 'get_additional_attributes' )
			->willReturn( array( 'style' => 'display: block;', 'title' => 'Caption Wrapper' ) );

		$controller_mock = $this->getMockBuilder( '\ResponsiveImageCaption\Controller\CaptionShortcodeHandler')
			->disableOriginalConstructor()
			->getMock();
		$controller_mock->expects( $this->exactly( 1 ) )
			->method( 'parse_shortcode_attributes' )
			->with( array(), NULL );

		$testee = new View\CaptionShortcodeHTML5Template(  $model_mock, $controller_mock );

		$result = $testee->get_output( '', array() );

		$dom = new \DOMDocument;
		// HTML5 Tags throws errors
		libxml_use_internal_errors( TRUE );
		$dom->loadHTML( $result );
		libxml_clear_errors();

		$outer_wrapper = $dom->getElementsByTagName( 'div' )->item( 0 );
		$wrapper_list = $dom->getElementsByTagName( 'figure' );

		// there's only one figure element
		$this->assertEquals(
			1,
			$wrapper_list->length
		);

		$wrapper = $wrapper_list->item( 0 );

		// check the class of the outer wrapper
		$this->assertEquals(
			'wp-caption-wrapper aligncenter',
			$outer_wrapper->getAttribute( 'class' )
		);
		// check the wrapper class
		$this->assertEquals(
			'wp-caption aligncenter',
			$wrapper->getAttribute( 'class' )
		);

		// check the content
		$img_list = $dom->getElementsByTagName( 'img' );
		$this->assertEquals(
			1,
			$img_list->length
		);
		$this->assertEquals(
			'img/photo.png',
			$img_list->item( 0 )->getAttribute( 'src' )
		);

		//check caption
		$p_list = $dom->getElementsByTagName( 'figcaption' );
		$this->assertEquals(
			1,
			$p_list->length
		);
		$this->assertEquals(
			'This is the Caption',
			$p_list->item( 0 )->nodeValue
		);

		// test additional attributes
		$this->assertEquals(
			'display: block;',
			$wrapper->getAttribute( 'style' )
		);
		$this->assertEquals(
			'Caption Wrapper',
			$wrapper->getAttribute( 'title' )
		);
	}
}
 