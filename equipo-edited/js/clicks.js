<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.carousel').slick({
            slidesToShow: 4,         // Number of slides to show at once
            slidesToScroll: 1,       // Number of slides to scroll at once
            autoplay: true,          // Enable autoplay
            autoplaySpeed: 2000,     // Autoplay speed in milliseconds
            arrows: true,            // Show next/prev arrows
            dots: true               // Show dots for navigation
        });
    });

    // Sidebar functionality
    document.addEventListener('DOMContentLoaded', function() {
        const cartButton = document.getElementById('cart-button');
        const cartSidebar = document.getElementById('cart-sidebar');
        const closeCartButton = document.getElementById('close-cart-button');

        cartButton.addEventListener('click', function() {
            cartSidebar.style.display = 'block';
        });

        closeCartButton.addEventListener('click', function() {
            cartSidebar.style.display = 'none';
        });

        // Event listener to close the cart sidebar when clicking outside of it
        document.addEventListener('click', function(event) {
            if (!cartSidebar.contains(event.target) && !cartButton.contains(event.target)) {
                cartSidebar.style.display = 'none';
            }
        });
    });

    // Learn More and Privacy Policy toggle functionality
    const learnMoreBtn = document.getElementById('learnMoreBtn');
    const privacyPolicyBtn = document.getElementById('privacyPolicyBtn');
    const learnMoreContents = document.querySelector('.learn');
    const privacyPolicyContents = document.querySelector('.privacy');

    learnMoreBtn.addEventListener('click', () => {
        // Toggle the visibility of the Learn More content
        learnMoreContents.style.display = learnMoreContents.style.display === 'none' || learnMoreContents.style.display === '' ? 'block' : 'none';
    });

    privacyPolicyBtn.addEventListener('click', () => {
        // Toggle the visibility of the Privacy Policy content
        privacyPolicyContents.style.display = privacyPolicyContents.style.display === 'none' || privacyPolicyContents.style.display === '' ? 'block' : 'none';
        console.log(privacyPolicyContents);
    });
</script>
