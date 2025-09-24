<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Form</title>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . '../assets/css/quotation.css'; ?>">
</head>
<body>
    <div class="quotation-form-container">
        <h1><?php _e('Get Your Quotation', 'quotation'); ?></h1>
        <form id="quotation-form" method="post">
            <label for="service-type"><?php _e('Service Type', 'quotation'); ?></label>
            <select id="service-type" name="service_type" required>
                <option value="plumbing"><?php _e('Plumbing', 'quotation'); ?></option>
                <option value="electrical"><?php _e('Electrical', 'quotation'); ?></option>
                <option value="building"><?php _e('Building', 'quotation'); ?></option>
            </select>

            <label for="description"><?php _e('Description of Work', 'quotation'); ?></label>
            <textarea id="description" name="description" required></textarea>

            <label for="budget"><?php _e('Budget', 'quotation'); ?></label>
            <input type="number" id="budget" name="budget" required>

            <button type="submit"><?php _e('Calculate Quotation', 'quotation'); ?></button>
        </form>
        <div id="quotation-result"></div>
    </div>
    <script src="<?php echo plugin_dir_url(__FILE__) . '../assets/js/quotation.js'; ?>"></script>
</body>
</html>