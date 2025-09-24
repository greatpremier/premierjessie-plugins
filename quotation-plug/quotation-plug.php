<?php
/**
 * Plugin Name: Quotation
 * Description: A plugin to help construction companies calculate quotations for plumbing, electrical, and building services.
 * Version: 1.0.0
 * Author: Your Name
 * License: GPL2
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants.
define( 'QUOTATION_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'QUOTATION_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include necessary files.
require_once QUOTATION_PLUGIN_DIR . 'includes/class-quotation-calculator.php';
require_once QUOTATION_PLUGIN_DIR . 'includes/class-quotation-admin.php';
require_once QUOTATION_PLUGIN_DIR . 'includes/class-quotation-frontend.php';

// Initialize the plugin.
function quotation_init() {
    // Load text domain for translations.
    load_plugin_textdomain( 'quotation', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

    // Initialize admin and frontend classes.
    $quotation_admin = new QuotationAdmin();
    $quotation_frontend = new QuotationFrontend();
}
add_action( 'plugins_loaded', 'quotation_init' );

// Register activation hook.
function quotation_activate() {
    // Activation code here (if needed).
}
register_activation_hook( __FILE__, 'quotation_activate' );

// Register deactivation hook.
function quotation_deactivate() {
    // Deactivation code here (if needed).
}
register_deactivation_hook( __FILE__, 'quotation_deactivate' );
?>