<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Johm's Boutique</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <style>
    .header {
      padding: 20px 0;
      background-color: #f5f5f5;
    }
    .logo-container {
      display: flex;
      align-items: center;
    }
    .logo-image {
      width: 95px;
      height: 120px;
      margin-right: 15px;
      border-radius: 10px;
    }
    .logo-text {
      font-size: 28px;
      font-weight: bold;
      text-decoration: none;
      color: #000;
      line-height: 1.2;
    }
    .logo-text span {
      color: #007bff;
    }
    .tagline {
      font-size: 16px;
      color: #6c757d;
      margin-top: 5px;
    }
    .header-icons {
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }
    .header-icons a {
      margin-left: 20px;
      color: #333;
      font-size: 20px;
    }
    .search-container {
      display: flex;
      align-items: center;
      margin-left: 20px;
    }
    .search-container input {
      padding: 5px 10px;
      border: 1px solid #ccc;
      border-radius: 20px;
      margin-right: 10px;
    }
    .search-container .fa-search {
      cursor: pointer;
    }
    .product-item {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <div class="logo-container">
            <img src="/api/placeholder/95/120" alt="Johm's Boutique Logo" class="logo-image">
            <div>
              <a href="index.php" class="logo-text">JOHM'S <span>boutique</span></a>
              <div class="tagline">it all begins here</div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="header-icons">
            <a href="#cart" class="nav-link"><i class="fas fa-shopping-cart"></i></a>
            <a href="#account" class="nav-link"><i class="fas fa-user"></i></a>
            <div class="search-container">
              <input type="text" class="search" placeholder="Search" id="searchBar">
              <i class="fas fa-search" id="searchIcon"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-4">
    <div id="productContainer" class="row">
      <!-- Product items will be dynamically added here -->
    </div>
  </div>

  <script>
    // Sample product data
    const products = [
      { name: "T-Shirt", category: "Clothing", price: 19.99 },
      { name: "Jeans", category: "Clothing", price: 49.99 },
      { name: "Sneakers", category: "Footwear", price: 79.99 },
      { name: "Watch", category: "Accessories", price: 129.99 },
      { name: "Backpack", category: "Bags", price: 39.99 },
      { name: "Sunglasses", category: "Accessories", price: 29.99 }
    ];

    // Function to create product HTML
    function createProductHTML(product) {
      return `
        <div class="col-md-4 product-item">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">${product.name}</h5>
              <p class="card-text">${product.category}</p>
              <p class="card-text">$${product.price.toFixed(2)}</p>
            </div>
          </div>
        </div>
      `;
    }

    // Function to render products
    function renderProducts(productsToRender) {
      const productContainer = document.getElementById('productView');
      productContainer.innerHTML = productsToRender.map(createProductHTML).join('');
    }

    // Initial render
    renderProducts(products);

    // Search functionality
    const searchBar = document.getElementById('searchBar');
    searchBar.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const filteredProducts = products.filter(product => 
        product.name.toLowerCase().includes(searchTerm) ||
        product.category.toLowerCase().includes(searchTerm)
      );
      renderProducts(filteredProducts);
    });
  </script>
</body>
</html>