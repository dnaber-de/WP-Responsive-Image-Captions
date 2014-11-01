<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\Test\Unit;
use \ResponsiveImageCaption\Test\Cases;
use \ResponsiveImageCaption\View;


class TestCaptionShortcodeTemplate extends Cases\BootstrapedTestCase {

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

		$controller_mock = $this->getMockBuilder( '\ResponsiveImageCaption\Controller\CaptionShortcodeHandler')
			->disableOriginalConstructor()
			->getMock();
		$controller_mock->expects( $this->exactly( 1 ) )
			->method( 'parse_shortcode_attributes' )
			->with( array(), NULL );

		$testee = new View\CaptionShortcodeTemplate(  $model_mock, $controller_mock );

		$result = $testee->get_output( '', array() );

		$dom = new \DOMDocument;
		$dom->loadHTML( $result );

		$wrapper = $dom->getElementById( 'caption-1' );

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
		$p_list = $dom->getElementsByTagName( 'p' );
		$this->assertEquals(
			1,
			$p_list->length
		);
		$this->assertEquals(
			'This is the Caption',
			$p_list->item( 0 )->nodeValue
		);
	}
}
 