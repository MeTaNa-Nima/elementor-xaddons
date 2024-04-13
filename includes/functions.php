<?php
function xaddons_admin_notice()
{
    $user = wp_get_current_user();
    if ($user->has_cap('manage_options')) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p>xAddons for Elementor v' . XADDONS_VERSION . ' is installed.</p>';
        echo '<p>Please notice that this plugin is in use in pages, posts and templates, uninstalling it may break them.</p>';
        echo '<p>Before uninstalling, please check <a href="/wp-admin/admin.php?page=elementor-element-manager" target="_blank">Elements Manager</a>.</p>';
        echo '<p>For more details, please visit <a href="https://github.com/MeTaNa-Nima/elementor-xaddons/" target="_blank">https://github.com/MeTaNa-Nima/elementor-xaddons/</a></p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'xaddons_admin_notice');

function xaddons_dashboard_widget()
{
    wp_add_dashboard_widget(
        'xaddons_dashboard_widget',
        'xAddons Helper:',
        'xaddons_dashboard_widget_display'
    );
}
add_action('wp_dashboard_setup', 'xaddons_dashboard_widget');
function xaddons_dashboard_widget_display()
{
?>
    <p>check for updates at <a href="https://github.com/MeTaNa-Nima/elementor-xaddons/" target="_blank">https://github.com/MeTaNa-Nima/elementor-xaddons/</a></p>
    <div>Use <input type="text" readonly value="[currentYear]" onfocus="this.select()"> shortcode to display the current year, current year is <?php echo date('Y'); ?>.</div>
    <p>You can add custom CSS for admin area to the editor in the <a href="/wp-admin/admin.php?page=elementor-xaddons">xAddons Options Page</a></p>
<?php
}

if (!function_exists('currentYearShortcode')) {
    function currentYearShortcode($atts)
    {
        return date('Y');
    }
}
add_shortcode('current_year', 'currentYear');
