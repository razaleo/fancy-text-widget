<?php
if (!defined('ABSPATH')) exit;

class Fancy_Text_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'fancy_text_widget';
    }

    public function get_title() {
        return 'Fancy Text Widget';
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {

        // CONTENT
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Content',
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => 'Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Fancy Text',
            ]
        );

        $this->add_control(
            'animation',
            [
                'label' => 'Animation Style',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade',
                'options' => [
                    'fade' => 'Fade',
                    'slide' => 'Slide',
                    'zoom' => 'Zoom',
                    'rotate' => 'Rotate',
                    'blur' => 'Blur',
                    'glow' => 'Glow',
                    'wave' => 'Wave',
                    'bounce' => 'Bounce',
                    'flip' => 'Flip',
                    'neon' => 'Neon',
                ],
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => 'Loop Animation',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // STYLE
        $this->start_controls_section(
            'style_section',
            [
                'label' => 'Style',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => 'Text Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .fancy-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gradient',
            [
                'label' => 'Gradient Text',
                'type' => \Elementor\Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'font_size',
            [
                'label' => 'Font Size',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .fancy-text' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'font_family',
            [
                'label' => 'Font Family',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Arial',
                'selectors' => [
                    '{{WRAPPER}} .fancy-text' => 'font-family: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $loop_class = ($settings['loop'] === 'yes') ? 'loop' : '';

        echo '<div class="fancy-text ' . $settings['animation'] . ' ' . $loop_class . '">';
        echo esc_html($settings['text']);
        echo '</div>';
    }
}