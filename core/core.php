<?php

// Subpackage namespace
namespace LittleBizzy\DisableCustomizer\Core;

// Aliased namespaces
use \LittleBizzy\DisableCustomizer\Helpers;

/**
 * Core class
 *
 * @package WordPress Plugin
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {
	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {
		$this->plugin->factory = new Factory( $this->plugin );
		$this->hooks();
	}

	/**
	 * WordPress Admin panel hooks
	 */
	protected function hooks() {
		add_action( 'admin_menu', array( $this, 'remove_customizer' ), 10 );
		add_action( 'admin_menu', array( $this, 'redirect_from_customizer_page' ), 10 );
	}

	/**
	 * Remove 'Customize' menu item from dashboard sidebar.
	 */
	public function remove_customizer() {
		global $submenu;

		if ( isset( $submenu['themes.php'] ) ) {
			foreach ( $submenu['themes.php'] as $index => $menu_item ) {
				if ( ! empty( $menu_item ) ) {
					foreach ( $menu_item as $item ) {
						if ( 'customize' === $item ) {
							unset( $submenu['themes.php'][ $index ] );
						}
					}
				}
			}
		}
	}

	/**
	 * Redirect from customizer page to dashboard.
	 */
	public function redirect_from_customizer_page() {
		if ( is_customize_preview() ) {
			wp_safe_redirect( admin_url() );
			exit;
		}
	}
}
