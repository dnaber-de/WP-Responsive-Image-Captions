<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\Model;


interface CaptionShortcodeAttributesInterface {

	/**
	 * @return string
	 */
	public function get_id();

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function set_id( $id );

	/**
	 * @return string
	 */
	public function get_align();

	/**
	 * @param string $align
	 *
	 * @return mixed
	 */
	public function set_align( $align );

	/**
	 * @return int
	 */
	public function get_width();

	/**
	 * @param string $width
	 *
	 * @return mixed
	 */
	public function set_width( $width );

	/**
	 * @return string
	 */
	public function get_caption();

	/**
	 * @param string $caption
	 *
	 * @return mixed
	 */
	public function set_caption( $caption );

	/**
	 * @return string
	 */
	public function get_class();

	/**
	 * @param string $class
	 *
	 * @return mixed
	 */
	public function set_class( $class );

	/**
	 * @return string
	 */
	public function get_content();

	/**
	 * @param string $content
	 *
	 * @return mixed
	 */
	public function set_content( $content );

	/**
	 * @return array
	 */
	public function get_additional_attributes();

	/**
	 * @param array $attributes
	 *
	 * @return mixed
	 */
	public function set_additional_attributes( Array $attributes );
} 