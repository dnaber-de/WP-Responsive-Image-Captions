<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\Test\Cases;


class BootstrapedTestCase extends \PHPUnit_Framework_TestCase {

	/**
	 * @type bool
	 */
	private static $bootstraped = FALSE;

	public function maybe_bootstrap() {

		if ( self::$bootstraped )
			return;

		$plugin_dir = dirname( dirname( __DIR__ ) );

		if ( ! class_exists( '\Requisite\SPLAutoloader' ) )
			require_once $plugin_dir . '/lib/Requisite/Requisite.php';

		\Requisite\Requisite::init();

		$loader = new \Requisite\SPLAutoLoader;
		$loader->addRule(
			new \Requisite\Rule\NamespaceDirectoryMapper(
				$plugin_dir . '/inc',
				'ResponsiveImageShortcode'
			)
		);
	}
} 