<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Result</title>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . '../assets/css/quotation.css'; ?>">
</head>
<body>
    <div class="quotation-result">
        <h1>Quotation Result</h1>
        <?php if (isset($quotation)) : ?>
            <p>Your estimated quotation is: <strong><?php echo esc_html($quotation); ?></strong></p>
        <?php else : ?>
            <p>No quotation available. Please fill out the form to calculate a quotation.</p>
        <?php endif; ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="button">Go Back</a>
    </div>
</body>
</html>