<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageShortcode\Model;


interface CaptionShortcodeAttributesInterface {

	/**
	 * @return mixed
	 */
	public function get_id();

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function set_id( $id );

	/**
	 * @return mixed
	 */
	public function get_align();

	/**
	 * @param string $align
	 *
	 * @return mixed
	 */
	public function set_align( $align );

	/**
	 * @return mixed
	 */
	public function get_width();

	/**
	 * @param string $width
	 *
	 * @return mixed
	 */
	public function set_width( $width );

	/**
	 * @return mixed
	 */
	public function get_caption();

	/**
	 * @param string $caption
	 *
	 * @return mixed
	 */
	public function set_caption( $caption );

	/**
	 * @return mixed
	 */
	public function get_class();

	/**
	 * @param string $class
	 *
	 * @return mixed
	 */
	public function set_class( $class );
} 