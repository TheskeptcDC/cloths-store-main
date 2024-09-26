$(document).ready(function() {
    // ... existing code ...

    // Event handler for checkout
    $('.btn-success').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'checkout.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(cart),
            success: function(response) {
                // Handle the response, e.g., redirect to a confirmation page
                window.location.href = 'confirmation.php';
            }
        });
    });

    // Initial display of the cart
    updateCartDisplay();
});
