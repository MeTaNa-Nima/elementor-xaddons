<?php


/*
 * Plugin Name:       Header and Text Widget for Elementor
 * Plugin URI:        https://github.com/MeTaNa-Nima/elementor-xaddons/
 * Description:       Custom Elementor widget combining a header and text box.
 * Version:           1.0.8
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nima Amani MeTaNa <metananima@gmail.com>
 * Author URI:        https://nimaamani.ir/en/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/MeTaNa-Nima/elementor-xaddons/
 */

define('XADDONS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('XADDONS_VERSION', '1.0.8');

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


function xaddons_admin_notice()
{
	$user = wp_get_current_user();
	if ($user->has_cap('manage_options')) {
		echo '<div class="notice notice-warning is-dismissible">';
		echo '<p>xAddons for Elementor v' . XADDONS_VERSION . ' is installed.</p>';
		echo '<p>Please notice that this plugin is in use in pages, posts and templates, uninstalling it may break them.</p>';
		echo '<p>For more details, please visit <a href="https://github.com/MeTaNa-Nima/elementor-xaddons/" target="_blank">https://github.com/MeTaNa-Nima/elementor-xaddons/</a></p>';
		echo '</div>';
	}
}
add_action('admin_notices', 'xaddons_admin_notice');
