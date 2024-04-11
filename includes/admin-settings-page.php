<?php

function xaddons_admin_settings_page()
{
    if (isset($_POST['elementor_xaddons_save_styles'])) {
        if (check_admin_referer('elementor_xaddons_save_styles_action', 'elementor_xaddons_save_styles_nonce')) {
            update_option('elementor_xaddons_styles', sanitize_textarea_field($_POST['elementor_xaddons_styles']));
        }
    }

    $codeMirrorSettings = [
        'codeMirrorTextArea' => 'elementor_xaddons_styles_editor',
        'codeMirrorSettings' => [
            'mode' => 'css',
            'theme' => 'default',
            'lineNumbers' => true,
            'autoRefresh' => true,
        ]
    ];
    wp_enqueue_code_editor($codeMirrorSettings);
?>
    <div class="wrap">
        <h1>Elementor X Addons</h1>
        <form method="post" action="">
            <?php wp_nonce_field('elementor_xaddons_save_styles_action', 'elementor_xaddons_save_styles_nonce'); ?>
            <h2>CSS Styles</h2>
            <textarea id="elementor_xaddons_styles_editor" name="elementor_xaddons_styles" style="width: 100%;"><?php echo esc_textarea(get_option('elementor_xaddons_styles')); ?></textarea>
            <input type="submit" name="elementor_xaddons_save_styles" value="Save Styles" />
        </form>
    </div>
    <script>
        jQuery(document).ready(function($) {
            wp.codeEditor.initialize($('#elementor_xaddons_styles_editor'), <?php echo wp_json_encode($codeMirrorSettings['codeMirrorSettings']); ?>);
        });
    </script>
<?php
}

function xaddons_admin_enqueue_styles()
{
    $custom_css = get_option('elementor_xaddons_styles');
    if (!empty($custom_css)) {
        wp_add_inline_style('wp-admin', $custom_css);
    }
}
add_action('admin_enqueue_scripts', 'xaddons_admin_enqueue_styles');
