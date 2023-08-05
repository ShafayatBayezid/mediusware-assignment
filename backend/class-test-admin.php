<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('TestAdmin')) {
    class TestAdmin
    {
        public function __construct()
        {
            add_filter('woocommerce_general_settings', array($this, 'custom_woocommerce_settings'));
            add_action('woocommerce_update_options_general', array($this, 'save_custom_woocommerce_settings'));
        }

        function custom_woocommerce_settings($settings) {
            $settings[] = array(
                'title' => __('Test Plugin', 'test'),
                'desc' => __('Enable or disable the custom product variation display feature.', 'test'),
                'id' => 'test_p_checkbox',
                'type' => 'checkbox',
                'desc_tip' => true,
            );
            return $settings;

        }

        function save_custom_woocommerce_settings() {
            $custom_checkbox_value = isset($_POST['test_p_checkbox']) ? 'yes' : 'no';
            update_option('test_p_checkbox', $custom_checkbox_value);
        }
    }
}

if (is_admin()) {
    new TestAdmin();
}