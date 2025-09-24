// This file contains the JavaScript functionality for the plugin, handling user interactions and AJAX requests.

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('quotation-form');
    
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            calculateQuotation();
        });
    }

    function calculateQuotation() {
        const formData = new FormData(form);
        
        fetch(quotation_ajax.ajax_url, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayResult(data.result);
            } else {
                alert('Error calculating quotation: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function displayResult(result) {
        const resultContainer = document.getElementById('quotation-result');
        resultContainer.innerHTML = `<h3>Quotation Result</h3><p>${result}</p>`;
    }
});