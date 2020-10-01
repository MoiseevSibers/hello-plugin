<?php

/**
 * Class Hello_World_Admin
 *
 * @author    Polvanov Igor <igor.polvanov@sibers.com>
 * @copyright 2020 (c) Sibers
 */
class Hello_World_Admin {

	/**
	 * @var string
	 */
	private $hello_world;

	/**
	 * @var string
	 */
	private $version;

	/**
	 * Hello_World_Admin constructor.
	 *
	 * @param $hello_world
	 * @param $version
	 */
	public function __construct( $hello_world, $version ) {

		$this->hello_world = $hello_world;
		$this->version     = $version;

	}


	public function enqueue_styles() {

		wp_enqueue_style( $this->hello_world,
			plugin_dir_url( __FILE__ ) . 'css/hello-world-admin.css',
			[],
			$this->version,
			'all' );

	}


	public function enqueue_scripts() {

		wp_enqueue_script( $this->hello_world,
			plugin_dir_url( __FILE__ ) . 'js/hello-world-admin.js',
			[ 'jquery' ],
			$this->version,
			false );

	}

}
