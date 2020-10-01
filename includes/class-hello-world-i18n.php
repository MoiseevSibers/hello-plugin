<?php

/**
 * Class Hello_World_i18n
 *
 * @author    Polvanov Igor <igor.polvanov@sibers.com>
 * @copyright 2020 (c) Sibers
 */
class Hello_World_i18n {


	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'hello-world',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}


}
