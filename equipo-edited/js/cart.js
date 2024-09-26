let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Convert existing cart items' prices to numbers
cart = cart.map(item => ({
    ...item,
    price: parseFloat(item.price)
}));

document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productName = this.getAttribute('data-name');
            const productPrice = parseFloat(this.getAttribute('data-id'));
            if (isNaN(productPrice)) {
                console.error(`Invalid price for product: ${productName}`);
                return;
            }
            addToCart(productName, productPrice);
        });
    });

    if (document.getElementById('cart-items')) {
        displayCart();
    }
});

function addToCart(name, price) {
    console.log(`Adding ${name} (Price: $${price}) to cart`);
    
    const existingItem = cart.find(item => item.name === name);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name, price: Number(price), quantity: 1 });
    }
    
    updateCart();
    alert(`${name} added to cart!`);
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
}

function clearCart() {
    cart = [];
    updateCart();
}

function updateCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
    if (document.getElementById('cart-items')) {
        displayCart();
    }
}

function displayCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    let total = 0;

    cartItems.innerHTML = '';
    cart.forEach((item, index) => {
        const price = Number(item.price);
        if (isNaN(price)) {
            console.error(`Invalid price for item: ${item.name}`);
            return;
        }
        const row = cartItems.insertRow();
        row.innerHTML = `
            <td>${item.name}</td>
            <td>$${price.toFixed(2)}</td>
            <td>${item.quantity}</td>
            <td>$${(price * item.quantity).toFixed(2)}</td>
            <td><button onclick="removeFromCart(${index})">Remove</button></td>
        `;
        total += price * item.quantity;
    });

    cartTotal.textContent = total.toFixed(2);
}

// Debug function to check cart contents
function debugCart() {
    console.log('Current cart contents:');
    console.log(JSON.stringify(cart, null, 2));
}