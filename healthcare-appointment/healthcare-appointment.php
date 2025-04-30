<?php
/**
 * Plugin Name: Healthcare Appointment Scheduler
 * Description: Appointment scheduling system for healthcare specialists.
 * Version: 1.0
 * Author: Your Name
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once plugin_dir_path(__FILE__) . 'includes/booking-form.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin-dashboard.php';

function has_register_custom_post_type() {
    register_post_type('specialist',
        array(
            'labels' => array('name' => __('Specialists')),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'custom-fields')
        )
    );
}
add_action('init', 'has_register_custom_post_type');
