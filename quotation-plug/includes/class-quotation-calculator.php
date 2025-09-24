<?php
/**
 * Class QuotationCalculator
 *
 * This class handles the calculation of quotations for construction companies.
 */
class QuotationCalculator {

    /**
     * Calculate the quotation based on user input.
     *
     * @param array $data User input data for quotation calculation.
     * @return float Total calculated quotation.
     */
    public function calculateQuotation($data) {
        // Example calculation logic
        $total = 0;

        if (isset($data['labor_cost'])) {
            $total += floatval($data['labor_cost']);
        }

        if (isset($data['material_cost'])) {
            $total += floatval($data['material_cost']);
        }

        if (isset($data['overhead'])) {
            $total += floatval($data['overhead']);
        }

        return $total;
    }

    /**
     * Validate user input data.
     *
     * @param array $data User input data.
     * @return bool True if valid, false otherwise.
     */
    public function validateInput($data) {
        // Basic validation logic
        return isset($data['labor_cost']) && isset($data['material_cost']);
    }
}