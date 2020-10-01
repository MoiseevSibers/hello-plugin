<?php

/**
 * Class Hello_World
 *
 * @author    Polvanov Igor <igor.polvanov@sibers.com>
 * @copyright 2020 (c) Sibers
 */
class Hello_World {


	protected $loader;

	protected $hello_world;

	protected $version;

	protected $logger;


	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->hello_world = 'hello-world';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}


	private function load_dependencies() {


		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-hello-world-loader.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-hello-world-i18n.php';

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-hello-world-logger.php';

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-hello-world-db.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-hello-world-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-hello-world-public.php';


		$this->loader = new Hello_World_Loader();
		$this->logger = new Hello_World_Logger();

	}


	private function set_locale() {

		$plugin_i18n = new Hello_World_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	private function define_admin_hooks() {

		$plugin_admin = new Hello_World_Admin( $this->get_hello_world(),
			$this->get_version
		());

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	private function define_public_hooks() {

		$plugin_public = new Hello_World_Public( $this->get_hello_world(),
			$this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'create_js_object' );
	}


	public function run() {
		$this->loader->run();
	}


	public function get_hello_world() {
		return $this->hello_world;
	}


	public function get_loader() {
		return $this->loader;
	}


	public function get_version() {
		return $this->version;
	}

}
