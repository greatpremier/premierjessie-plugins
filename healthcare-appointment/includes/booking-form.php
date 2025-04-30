<?php
// Display booking form via shortcode
function has_display_booking_form() {
    ob_start();

    // Handle form submission
    if (isset($_POST['has_submit_booking']) && wp_verify_nonce($_POST['has_booking_nonce'], 'has_book_appointment')) {
        global $wpdb;

        $name       = sanitize_text_field($_POST['has_name']);
        $email      = sanitize_email($_POST['has_email']);
        $specialist = intval($_POST['has_specialist']);
        $datetime   = sanitize_text_field($_POST['has_datetime']);

        $table = $wpdb->prefix . 'has_appointments';

        $wpdb->insert($table, [
            'patient_name'     => $name,
            'patient_email'    => $email,
            'specialist_id'    => $specialist,
            'appointment_time' => $datetime,
            'status'           => 'pending',
            'created_at'       => current_time('mysql')
        ]);

        echo "<p class='has-success-message'>Appointment successfully booked! You'll receive a confirmation email shortly.</p>";
    }

    ?>

    <form method="post" class="has-booking-form">
        <label for="has_name">Your Name</label><br>
        <input type="text" name="has_name" id="has_name" required><br><br>

        <label for="has_email">Email</label><br>
        <input type="email" name="has_email" id="has_email" required><br><br>

        <label for="has_specialist">Choose Specialist</label><br>
        <select name="has_specialist" id="has_specialist" required>
            <option value="">Select a specialist</option>
            <?php
            $specialists = get_posts(['post_type' => 'specialist', 'numberposts' => -1]);
            foreach ($specialists as $specialist) {
                echo "<option value='{$specialist->ID}'>" . esc_html($specialist->post_title) . "</option>";
            }
            ?>
        </select><br><br>

        <label for="has_datetime">Date & Time</label><br>
        <input type="datetime-local" name="has_datetime" id="has_datetime" required><br><br>

        <?php wp_nonce_field('has_book_appointment', 'has_booking_nonce'); ?>
        <input type="submit" name="has_submit_booking" value="Book Appointment">
    </form>

    <?php

    return ob_get_clean();
}
add_shortcode('has_booking_form', 'has_display_booking_form');
