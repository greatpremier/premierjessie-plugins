<?php
class QuotationFrontend {
    public function __construct() {
        add_shortcode('quotation_form', [$this, 'render_quotation_form']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function enqueue_scripts() {
        wp_enqueue_style('quotation-style', plugins_url('../assets/css/quotation.css', __FILE__));
        wp_enqueue_script('quotation-script', plugins_url('../assets/js/quotation.js', __FILE__), ['jquery'], null, true);
    }

    public function render_quotation_form() {
        ob_start();
        include plugin_dir_path(__FILE__) . '../templates/form.php';
        return ob_get_clean();
    }

    public function render_quotation_result($data) {
        ob_start();
        include plugin_dir_path(__FILE__) . '../templates/result.php';
        return ob_get_clean();
    }
}
?>