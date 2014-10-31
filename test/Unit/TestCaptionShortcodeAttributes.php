<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\Test\Unit;
use \ResponsiveImageShortcode\Test\Cases;
use \ResponsiveImageShortcode\Model;

class CaptionShortcodeAttributesTest extends Cases\BootstrapedTestCase {

	/**
	 * @type Model\CaptionShortcodeAttributes
	 */
	private $testee;


	public function setUp() {

		$this->maybe_bootstrap();
		$this->testee = new Model\CaptionShortcodeAttributes;
	}

	/**
	 * @dataProvider stringProvider
	 * @param $value
	 * @param $expected
	 */
	public function test_id( $value, $expected ) {

		$this->testee->set_id( $value );
		$this->assertEquals(
			$expected,
			$this->testee->get_id()
		);
	}

	/**
	 * @dataProvider stringProvider
	 * @param $value
	 * @param $expected
	 */
	public function test_align( $value, $expected ) {

		$this->testee->set_align( $value );
		$this->assertEquals(
			$expected,
			$this->testee->get_align()
		);
	}

	/**
	 * @dataProvider intProvider
	 * @param $value
	 * @param $expected
	 */
	public function test_width( $value, $expected ) {

		$this->testee->set_width( $value );
		$this->assertEquals(
			$expected,
			$this->testee->get_width()
		);
	}

	/**
	 * @dataProvider stringProvider
	 * @param $value
	 * @param $expected
	 */
	public function test_caption( $value, $expected ) {

		$this->testee->set_caption( $value );
		$this->assertEquals(
			$expected,
			$this->testee->get_caption()
		);
	}

	/**
	 * @dataProvider stringProvider
	 * @param $value
	 * @param $expected
	 */
	public function test_class( $value, $expected ) {

		$this->testee->set_class( $value );
		$this->assertEquals(
			$expected,
			$this->testee->get_class()
		);
	}

	/**
	 * @return array
	 */
	public function stringProvider() {

		return array(
			array(
				'Test',
				'Test'
			),
			array(
				123,
				'123'
			),
			array(
				FALSE,
				(string) FALSE
			),
			array(
				array(),
				(string) array()
			),
			array(
				NULL,
				(string) NULL
			)
		);
	}

	/**
	 * @return array
	 */
	public function intProvider() {

		return array(
			array(
				42,
				42
			),
			array(
				'013',
				13
			),
			array(
				'-1',
				-1
			),
			array(
				TRUE,
				(int) TRUE
			),
			array(
				NULL,
				(int) NULL
			)
		);
	}
}
 