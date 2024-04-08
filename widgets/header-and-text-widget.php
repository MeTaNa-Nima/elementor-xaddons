<?php
// namespace Elementor;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Utils;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use ElementorPro\Base\Base_Widget;
// use ElementorPro\Plugin;
// use Elementor\Control_Media;
// use Elementor\Icons_Manager;
// use Elementor\Group_Control_Image_Size;





/**
 * Elementor Header & Text widget.
 *
 * Elementor widget that displays a Header and a text.
 *
 */
class Elementor_Header_And_Text_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Header & Text widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'header-text';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Header & Text widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Header & Text', 'elementor');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Header & Text widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-t-letter';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords()
	{
		return ['header', 'text', 'description', 'title', 'box'];
	}

	/**
	 * Register Header & Text widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls()
	{
		$this->start_controls_section(
			'section_header_text',
			[
				'label' => esc_html__('Header & Text', 'elementor'),
			]
		);

		$this->add_control(
			'sub_header_text',
			[
				'label' => esc_html__('Sub Header', 'elementor'),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__('This is the sub header', 'elementor'),
				'placeholder' => esc_html__('Enter your sub header', 'elementor'),
				'label_block' => true,
				'separator' => 'none',
			]
		);

		$this->add_control(
			'sub_header_size',
			[
				'label' => esc_html__('Sub Header HTML Tag', 'elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => esc_html__('Title', 'elementor'),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__('This is the title', 'elementor'),
				'placeholder' => esc_html__('Enter your title', 'elementor'),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_size',
			[
				'label' => esc_html__('Title HTML Tag', 'elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h3',
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => esc_html__('Description', 'elementor'),
				'type' => Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor'),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_size',
			[
				'label' => esc_html__('Description HTML Tag', 'elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'div' => 'div',
				],
				'default' => 'div',
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__('Link', 'elementor'),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'separator' => 'before',
			]
		);



		$this->add_control(
			'view',
			[
				'label' => esc_html__('View', 'elementor'),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		// Style Tab: Box
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => esc_html__('Box', 'elementor'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_vertical_alignment',
			[
				'label' => esc_html__('Vertical Alignment', 'elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => esc_html__('Top', 'elementor'),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__('Middle', 'elementor'),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__('Bottom', 'elementor'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'top',
				'toggle' => false,
				'prefix_class' => 'elementor-vertical-align-',
				'condition' => [
					'position!' => 'top',
				],
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__('Alignment', 'elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'elementor'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'elementor'),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justified', 'elementor'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__('Padding', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%', 'vw', 'vh'],
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .elementor-header-text-wrapper .elementor-header-text-description' => 'margin: 0;',
				]
			]
		);

		// Box Fx Start
		$this->start_controls_tabs('box_effects');

		$this->start_controls_tab(
			'box_normal',
			[
				'label' => esc_html__('Hover', 'elementor'),
			]
		);

		$this->add_control(
			'background_color_normal',
			[
				'label' => esc_html__('Background Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-wrapper' => 'background-color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border_normal',
				'selector' => '{{WRAPPER}} .elementor-header-text-wrapper',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow_normal',
				'selector' => '{{WRAPPER}} .elementor-header-text-wrapper',
			]
		);

		$this->add_control(
			'box_background_hover_transition',
			[
				'label' => esc_html__('Transition Duration', 'elementor'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-wrapper' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_hover',
			[
				'label' => esc_html__('Normal', 'elementor'),
			]
		);

		$this->add_control(
			'background_color_hover',
			[
				'label' => esc_html__('Background Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-wrapper:hover' => 'background-color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border_hover',
				'selector' => '{{WRAPPER}} .elementor-header-text-wrapper:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow_hover',
				'selector' => '{{WRAPPER}} .elementor-header-text-wrapper:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		// Box Fx End

		$this->add_responsive_control(
			'content_border_radius',
			[
				'label' => esc_html__('Border Radius', 'elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab: Subheader
		$this->start_controls_section(
			'section_style_subheader',
			[
				'label' => esc_html__('Subheader', 'elementor'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_responsive_control(
			'subheader_bottom_space',
			[
				'label' => esc_html__('Spacing', 'elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-subheader' => 'margin: 0 0 {{SIZE}}{{UNIT}} 0;',
				],
			]
		);

		$this->add_control(
			'subheader_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-subheader' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subheader_typography',
				'selector' => '{{WRAPPER}} .elementor-header-text-subheader',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'subheader_stroke',
				'selector' => '{{WRAPPER}} .elementor-header-text-subheader',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subheader_shadow',
				'selector' => '{{WRAPPER}} .elementor-header-text-subheader',
			]
		);

		$this->end_controls_section();

		// Style Tab: Title
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__('Title', 'elementor'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => esc_html__('Spacing', 'elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-title' => 'margin: 0 0 {{SIZE}}{{UNIT}} 0;',

				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-header-text-title a' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elementor-header-text-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'title_stroke',
				'selector' => '{{WRAPPER}} .elementor-header-text-title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .elementor-header-text-title',
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__('Hover Animation', 'elementor'),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->start_controls_tabs('header_effects');

		$this->start_controls_tab(
			'normal',
			[
				'label' => esc_html__('Normal', 'elementor'),
			]
		);

		$this->add_control(
			'header_opacity',
			[
				'label' => esc_html__('Opacity', 'elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-title' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'background_hover_transition',
			[
				'label' => esc_html__('Transition Duration', 'elementor'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-title' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'hover',
			[
				'label' => esc_html__('Hover', 'elementor'),
			]
		);

		$this->add_control(
			'header_opacity_hover',
			[
				'label' => esc_html__('Opacity', 'elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}}:hover .elementor-header-text-title' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-title:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-header-text-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Style Tab: Description
		$this->start_controls_section(
			'section_style_description',
			[
				'label' => esc_html__('Description', 'elementor'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => esc_html__('Description', 'elementor'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-header-text-description' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .elementor-header-text-description',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_shadow',
				'selector' => '{{WRAPPER}} .elementor-header-text-description',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render Header & Text widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$has_content = !Utils::is_empty($settings['sub_header_text']) || !Utils::is_empty($settings['title_text']) || !Utils::is_empty($settings['description_text']);

		$html = '<div class="elementor-header-text-wrapper">';

		if (!empty($settings['link']['url'])) {
			$this->add_link_attributes('link', $settings['link']);
		}

		if ($has_content) {
			$html .= '<div class="elementor-header-text-content">';

			if (!Utils::is_empty($settings['sub_header_text'])) {
				$this->add_render_attribute('sub_header_text', 'class', 'elementor-header-text-subheader');

				$this->add_inline_editing_attributes('sub_header_text');

				$sub_header_html = $settings['sub_header_text'];

				$html .= sprintf('<%1$s %2$s>%3$s</%1$s>', Utils::validate_html_tag($settings['sub_header_size']), $this->get_render_attribute_string('sub_header_text'), $sub_header_html);
			}

			if (!Utils::is_empty($settings['title_text'])) {
				$animation_class = !empty($settings['hover_animation']) ? 'elementor-animation-' . $settings['hover_animation'] : '';
				$this->add_render_attribute('title_text', 'class', 'elementor-header-text-title' . $animation_class);

				$this->add_inline_editing_attributes('title_text', 'none');

				$title_html = $settings['title_text'];

				if (!empty($settings['link']['url'])) {
					$title_html = '<a ' . $this->get_render_attribute_string('link') . '>' . $title_html . '</a>';
				}

				$html .= sprintf('<%1$s %2$s>%3$s</%1$s>', Utils::validate_html_tag($settings['title_size']), $this->get_render_attribute_string('title_text'), $title_html);
			}

			if (!Utils::is_empty($settings['description_text'])) {
				$this->add_render_attribute('description_text', 'class', 'elementor-header-text-description');

				$this->add_inline_editing_attributes('description_text');

				$description_html = $settings['description_text'];

				$html .= sprintf('<%1$s %2$s>%3$s</%1$s>', Utils::validate_html_tag($settings['description_size']), $this->get_render_attribute_string('description_text'), $description_html);
			}

			$html .= '</div>';
		}

		$html .= '</div>';

		Utils::print_unescaped_internal_string($html);
	}

	/**
	 * Render Header & Text widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */
	protected function content_template()
	{
?>
		<# var html='<div class="elementor-header-text-wrapper">' ; var hasContent=!!(settings.sub_header_text || settings.title_text || settings.description_text); if (hasContent) { html +='<div class="elementor-header-text-content">' ; if (settings.sub_header_text) { var sub_header_html=settings.sub_header_text, subHeaderSizeTag=elementor.helpers.validateHTMLTag(settings.sub_header_size); view.addRenderAttribute("sub_header_text", "class" , "elementor-header-text-subheader" ); view.addInlineEditingAttributes("sub_header_text", "none" ); html +="<" + subHeaderSizeTag + " " + view.getRenderAttributeString("sub_header_text") + ">" + sub_header_html + "</" + subHeaderSizeTag + ">" ; } if (settings.title_text) { var title_html=settings.title_text, titleSizeTag=elementor.helpers.validateHTMLTag(settings.title_size), animationClass=settings.hover_animation ? " elementor-animation-" + settings.hover_animation : "" ; if (settings.link.url) { title_html='<a href="' + _.escape(settings.link.url) + '">' + title_html + "</a>" ; } view.addRenderAttribute("title_text", "class" , "elementor-header-text-title" + animationClass); view.addInlineEditingAttributes("title_text", "none" ); html +="<" + titleSizeTag + " " + view.getRenderAttributeString("title_text") + ">" + title_html + "</" + titleSizeTag + ">" ; } if (settings.description_text) { var description_html=settings.description_text, descriptionSizeTag=elementor.helpers.validateHTMLTag(settings.description_size); view.addRenderAttribute("description_text", "class" , "elementor-header-text-description" ); view.addInlineEditingAttributes("description_text", "none" ); html +="<" + descriptionSizeTag + " " + view.getRenderAttributeString("description_text") + ">" + description_html + "</" + descriptionSizeTag + ">" ; } html +="</div>" ; } html +="</div>" ; print(html); #>
	<?php
	}
}
