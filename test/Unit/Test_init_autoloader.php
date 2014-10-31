<?php # -*- coding: utf-8 -*-

namespace ResponsiveImageShortcode\Test\Unit;


class Test_init_autoloader extends \PHPUnit_Framework_TestCase {

	public function test_init_autoloader() {

		if ( class_exists( '\Requisite\SPLAutoLoader' ) )
			$this->markTestSkipped( 'Requisite\SPLAutoLoader already exists.' );

		$plugin_dir = dirname( dirname( __DIR__ ) );

		$loader = \ResponsiveImageShortcode\init_autoloader( $plugin_dir . '/lib' );
		$this->assertInstanceOf(
			'\Requisite\SPLAutoLoader',
			$loader
		);
		$this->assertTrue(
			interface_exists( '\Requisite\Loader\FileLoaderInterface' ),
			'Interface exists: \Requisite\Loader\FileLoaderInterface'
		);
		$this->assertTrue(
			interface_exists( '\Requisite\Rule\AutoLoadRuleInterface' ),
			'Interface exists: \Requisite\Rule\AutoLoadRuleInterface'
		);
	}

}
 