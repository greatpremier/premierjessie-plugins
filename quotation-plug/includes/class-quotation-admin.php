<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class QuotationAdmin {
    
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
        add_action( 'admin_init', array( $this, 'settings_init' ) );
    }

    public function add_admin_menu() {
        add_menu_page( 'Quotation', 'Quotation', 'manage_options', 'quotation', array( $this, 'quotation_options_page' ) );
    }

    public function settings_init() {
        register_setting( 'pluginPage', 'quotation_settings' );

        add_settings_section(
            'quotation_pluginPage_section', 
            __( 'Settings', 'quotation' ), 
            array( $this, 'settings_section_callback' ), 
            'pluginPage'
        );

        add_settings_field( 
            'quotation_text_field_0', 
            __( 'Field 1', 'quotation' ), 
            array( $this, 'text_field_0_render' ), 
            'pluginPage', 
            'quotation_pluginPage_section' 
        );
    }

    public function text_field_0_render() {
        $options = get_option( 'quotation_settings' );
        ?>
        <input type='text' name='quotation_settings[quotation_text_field_0]' value='<?php echo $options['quotation_text_field_0']; ?>'>
        <?php
    }

    public function quotation_options_page() {
        ?>
        <form action='options.php' method='post'>
            <h2>Quotation</h2>
            <?php
            settings_fields( 'pluginPage' );
            do_settings_sections( 'pluginPage' );
            submit_button();
            ?>
        </form>
        <?php
    }

    public function settings_section_callback() {
        echo __( 'Configure your settings below:', 'quotation' );
    }
}
?>