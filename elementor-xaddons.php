<?php

/**
 * Plugin Name: Elementor Header and Text Widget
 * Description: Custom Elementor widget combining a header and text box.
 * Version: 1.0.0
 * Author: Nima Amani MeTaNa <metananima@gmail.com>
 */

define('XADDONS_PLUGIN_URL', plugin_dir_url(__FILE__));

function register_header_text_widget($widgets_manager)
{
	require_once(__DIR__ . '/widgets/header-and-text-widget.php');
	$widgets_manager->register(new \Elementor_Header_And_Text_Widget());
}
add_action('elementor/widgets/register', 'register_header_text_widget');