<?php


/*
 * Plugin Name:       Header and Text Widget for Elementor
 * Plugin URI:        https://github.com/MeTaNa-Nima/elementor-xaddons/
 * Description:       Custom Elementor widget combining a header and text box.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nima Amani MeTaNa <metananima@gmail.com>
 * Author URI:        https://nimaamani.ir/en/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/MeTaNa-Nima/elementor-xaddons/
 */

define('XADDONS_PLUGIN_URL', plugin_dir_url(__FILE__));

function register_header_text_widget($widgets_manager)
{
	require_once(__DIR__ . '/widgets/header-and-text-widget.php');
	$widgets_manager->register(new \Elementor_Header_And_Text_Widget());
}
add_action('elementor/widgets/register', 'register_header_text_widget');