<?php # -*- coding: utf-8 -*-

namespace ResponsiveImageCaption\Test\Unit;


class Test_init_autoloader extends \PHPUnit_Framework_TestCase {

	public function test_init_autoloader() {

		if ( class_exists( '\Requisite\SPLAutoLoader' ) )
			$this->markTestSkipped( 'Requisite\SPLAutoLoader already exists.' );

		$plugin_dir = dirname( dirname( __DIR__ ) );
		$invalid_dir = __DIR__ . '/no_exist';

		// test with an invalid directory
		$this->assertFalse(
			\ResponsiveImageCaption\init_autoloader( $invalid_dir )
		);
		$this->assertFalse(
			class_exists( '\Requisite\Requisite' )
		);

		$loader = \ResponsiveImageCaption\init_autoloader( $plugin_dir . '/lib' );
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

		//after that, the function should return a valid Instance even with a wrong parameter type
		$this->assertInstanceOf(
			'\Requisite\SPLAutoLoader',
			\ResponsiveImageCaption\init_autoloader( $invalid_dir )
		);
	}

}
 