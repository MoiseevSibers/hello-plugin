<?php

/**
 * Class Hello_World_Public
 *
 * @author    Polvanov Igor <igor.polvanov@sibers.com>
 * @copyright 2020 (c) Sibers
 */
class Hello_World_Public {


	private $hello_world;


	private $version;


	public function __construct( $hello_world, $version ) {

		$this->hello_world = $hello_world;
		$this->version     = $version;

	}


	public function enqueue_styles() {

		wp_enqueue_style( $this->hello_world,
			plugin_dir_url( __FILE__ ) . 'css/hello-world-public.css',
			[],
			$this->version,
			'all' );

	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->hello_world,
			plugin_dir_url( __FILE__ ) . 'js/hello-world-public.js',
			[ 'jquery' ],
			$this->version,
			true );

	}


	public function create_js_object() {
		global $post;

		wp_register_script( 'hello_world_script',
			plugin_dir_url( __FILE__ ) . 'js/hello-world-public-ajax.js',
			[ 'jquery' ],
			$this->version,
			true );

		wp_localize_script( 'hello_world_script',
			'obj_params',
			[
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'postId'  => $post->ID,
				'isPage'  => is_single(),
			] );

		wp_enqueue_script( 'hello_world_script' );
	}

}
