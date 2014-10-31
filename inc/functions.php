<?php # -*- coding: utf-8 -*-

namespace ResponsiveImageShortcode;

/**
 * instantiate the front controller
 * and runs the plugin
 *
 * @wp-hook wp_loaded
 * @return void
 */
function init() {

}

/**
 * inits the autoloader
 *
 * @param string $dir (The path to the lib/ directory)
 * @return FALSE|\Requisite\SPLAutoLoader
 */
function init_autoloader( $dir ) {

	if ( class_exists( '\Requisite\SPLAutoloader' ) )
		return new \Requisite\SPLAutoLoader;

	$requisite = $dir . '/Requisite/Requisite.php';
	if ( ! is_readable( $requisite ) )
		return FALSE;

	require_once $requisite;
	\Requisite\Requisite::init();

	return new \Requisite\SPLAutoLoader;
}