<?php
add_action( 'admin_menu', 'yoodule_admin_menu' );
if (!function_exists('yoodule_admin_menu')) {
	function yoodule_admin_menu() {
		$page_title = 'The yoodule Plugin';
		$menu_title = 'The yoodule Plugin';
		$capability = 'manage_options';
		$menu_slug  = 'yoodule-plugin';
		$function   = 'yoodule_settings';
		$icon_url   = 'dashicons-rest-api';
		$position   = 4;
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	}
}
