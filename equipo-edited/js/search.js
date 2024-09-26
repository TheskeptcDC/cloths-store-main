const searchBar = document.getElementById('searchBar');
const productCards = document.querySelectorAll('.product-card');

searchBar.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();

    productCards.forEach(card => {
        const productName = card.getAttribute('data-name').toLowerCase();
        // const productCategory = card.getAttribute('data-category').toLowerCase();

        if (productName.includes(searchTerm) || productCategory.includes(searchTerm)) {
            card.classList.remove('hidden');
        } else {
            card.classList.add('hidden');
        }
    });
});
