<?php


/*
 * Plugin Name:       Header and Text Widget for Elementor
 * Plugin URI:        https://github.com/MeTaNa-Nima/elementor-xaddons/
 * Description:       Custom Elementor widget combining a header and text box.
 * Version:           1.0.9
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nima Amani MeTaNa <metananima@gmail.com>
 * Author URI:        https://nimaamani.ir/en/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/MeTaNa-Nima/elementor-xaddons/
 */

define('XADDONS_VERSION', '1.0.9');


define('XADDONS_PLUGIN_URL', plugin_dir_url(__FILE__));
require_once(__DIR__ . '/includes/admin-settings-page.php');
require_once(__DIR__ . '/includes/functions.php');


function xaddons_plugin_menu()
{
	add_menu_page(__('Elementor X Addons'), 'Elementor X Addons', 'manage_options', 'elementor-xaddons', 'xaddons_plugin_options_page');
}
add_action('admin_menu', 'xaddons_plugin_menu');

function xaddons_plugin_options_page()
{
	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
?>
	<div class="wrap">
		<h1>Elementor X Addons</h1>
		<p>Welcome to the Elementor X Addons page.</p>
		<?php xaddons_admin_settings_page(); ?>
	</div>
<?php
}

function register_header_text_widget($widgets_manager)
{
	require_once(__DIR__ . '/widgets/header-and-text-widget.php');
	$widgets_manager->register(new \Elementor_Header_And_Text_Widget());
}
add_action('elementor/widgets/register', 'register_header_text_widget');


function xaddons_enqueue_admin_script()
{
	if (current_user_can('administrator')) {
		wp_enqueue_script('xaddons-edit-post-script', XADDONS_PLUGIN_URL . 'js/edit-post.js', array('jquery'), null, true);
		wp_enqueue_style('xaddons-admin-style', XADDONS_PLUGIN_URL . 'css/styles.css');
	}
}
add_action('wp_enqueue_scripts', 'xaddons_enqueue_admin_script');
