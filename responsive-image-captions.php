<?php # -*- coding: utf-8 -*-

namespace ResponsiveImageCaption;

/**
 * Plugin Name: Responsive Image Captions
 * Author: David Naber
 * Author URI: http://dnaber.de/
 * Version: 2014.10.31
 */

require_once __DIR__ . '/inc/functions.php';

add_action( 'wp_loaded', __NAMESPACE__ . '\init', 11 );



