<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Modules
 * @package StaxAddons
 */
class Modules {

	/**
	 * @var null
	 */
	public static $instance;

	/**
	 * @return Modules|null
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * StaxAddons constructor.
	 */
	public function __construct() {

	}

}

Modules::instance();
