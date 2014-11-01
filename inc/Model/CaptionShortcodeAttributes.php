<?php # -*- coding: utf-8 -*-


namespace ResponsiveImageCaption\Model;

class CaptionShortcodeAttributes implements CaptionShortcodeAttributesInterface {

	/**
	 * @type string
	 */
	private $id = '';

	/**
	 * @type string
	 */
	private $align = '';

	/**
	 * @type int
	 */
	private $width = NULL;

	/**
	 * @type string
	 */
	private $caption = '';

	/**
	 * @type string
	 */
	private $class = '';

	/**
	 * @type string
	 */
	private $content = '';

	/**
	 * @type array
	 */
	private $additional_attributes = array();

	/**
	 * @return string
	 */
	public function get_id() {

		return $this->id;
	}

	/**
	 * @param $id
	 * @return void
	 */
	public function set_id( $id ) {

		$this->id = (string) $id;
	}

	/**
	 * @return mixed
	 */
	public function get_align() {

		return $this->align;
	}

	/**
	 * @param string $align
	 * @return void
	 */
	public function set_align( $align ) {

		$this->align = (string) $align;
	}

	/**
	 * @return mixed
	 */
	public function get_width() {

		return $this->width;
	}

	/**
	 * @param string $width
	 * @return void
	 */
	public function set_width( $width ) {

		$this->width = (int) $width;
	}

	/**
	 * @return mixed
	 */
	public function get_caption() {

		return $this->caption;
	}

	/**
	 * @param string $caption
	 * @return void
	 */
	public function set_caption( $caption ) {

		$this->caption = (string) $caption;
	}

	/**
	 * @return mixed
	 */
	public function get_class() {

		return $this->class;
	}

	/**
	 * @param string $class
	 * @return void
	 */
	public function set_class( $class ) {

		$this->class = (string) $class;
	}

	/**
	 * @return string
	 */
	public function get_content() {

		return $this->content;
	}

	/**
	 * @param string $content
	 * @return void
	 */
	public function set_content( $content ) {

		$this->content = (string) $content;
	}

	/**
	 * @return array
	 */
	public function get_additional_attributes() {

		return $this->additional_attributes;
	}

	/**
	 * @param array $attributes
	 *
	 * @return mixed
	 */
	public function set_additional_attributes( Array $attributes ) {

		$this->additional_attributes = $attributes;
	}

}