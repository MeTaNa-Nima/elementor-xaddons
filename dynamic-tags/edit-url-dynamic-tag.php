<?php
// Ensure the namespace is correct. Uncomment if using within a namespace.
// namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Dynamic_Edit_Url_Tag extends \Elementor\Core\DynamicTags\Tag
{
    public function get_name()
    {
        return 'dynamic-edit-url';
    }

    public function get_title()
    {
        return 'Edit Post URL';
    }

    public function get_group()
    {
        return 'x-addons-dynamic-tag';
    }

    public function get_categories()
    {
        return [
            \Elementor\Modules\DynamicTags\Module::URL_CATEGORY,
        ];
    }

    protected function _register_controls()
    {
        // Control for selecting the editor type
        $this->add_control(
            'editor_type',
            [
                'label' => 'Editor Type',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => 'Default',
                    'elementor' => 'Elementor',
                    'classic' => 'Classic',
                    'block' => 'Block',
                ],
                'default' => 'default',
                'description' => 'Select the editor type.'
            ]
        );
    }

    public function render()
    {
        $editor_type = $this->get_settings('editor_type');
        $post_id = get_the_ID();

        if (!$post_id) {
            return;
        }

        $base_url = admin_url("post.php?post={$post_id}&action=");

        switch ($editor_type) {
            case 'elementor':
                $edit_url = $base_url . 'elementor';
                break;
            case 'classic':
                $edit_url = $base_url . 'edit';
                break;
            case 'block':
                $edit_url = $base_url . 'edit';
                break;
            default:
                $edit_url = $base_url . 'edit';
                break;
        }

        echo esc_url($edit_url);
    }
}
