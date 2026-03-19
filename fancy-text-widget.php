<?php
/**
 * Plugin Name: Fancy Text Widget
 * Description: Custom Elementor widget with animated text styles.
 * Version: 1.0
 * Author: Raju Shakya
 */

if (!defined('ABSPATH')) exit;

// Register Widget
function register_fancy_text_widget($widgets_manager) {
    require_once(__DIR__ . '/widget/fancy-text-widget.php');
    $widgets_manager->register(new \Fancy_Text_Widget());
}
add_action('elementor/widgets/register', 'register_fancy_text_widget');

// Enqueue Styles
function fancy_text_widget_scripts() {
    wp_enqueue_style('fancy-text-style', plugins_url('/assets/style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'fancy_text_widget_scripts');