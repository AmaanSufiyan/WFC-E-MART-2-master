document.addEventListener('DOMContentLoaded', function () {
    const shopByCategory = document.getElementById('shop-by-category');
    const sortBy = document.getElementById('sort-by');

    // Add event listeners
    shopByCategory.addEventListener('change', updateProducts);
    sortBy.addEventListener('change', updateProducts);

    // Initial load of products
    updateProducts();
});

function updateProducts() {
    const category = document.getElementById('shop-by-category').value;
    const sortBy = document.getElementById('sort-by').value;

    // Make an AJAX request to fetch products based on category and sorting criteria
    fetchProducts(category, sortBy).then(products => {
        // Update the DOM to display the fetched products
        displayProducts(products);
    }).catch(error => {
        console.error('Error fetching products:', error);
    });
}

function fetchProducts(category, sortBy) {
    // Construct the URL for fetching products with the given category and sorting criteria
    const url = `../Includes/fetch_products.php?category=${category}&sortBy=${sortBy}`;

    // Make an AJAX request to fetch products
    return fetch(url).then(response => {
        if (!response.ok) {
            throw new Error('Failed to fetch products');
        }
        return response.json();
    });
}

function displayProducts(products) {
    const productsContainer = document.querySelector('.products');
    // Clear existing product list
    productsContainer.innerHTML = '';

    // Iterate over fetched products and display them
    products.forEach(product => {
        // Create HTML elements to display product details
        const productElement = document.createElement('div');
        productElement.classList.add('box');
        productElement.innerHTML = `
            <div class="icons">
                <a href="../User pages/cart.php" class="fas fa-shopping-cart"></a>
                <a href="../User pages/wishlist.php" class="fas fa-heart"></a>
                <a href="../User pages/product.php" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="${product.image_url}" alt="">
            </div>
            <div class="content">
                <h3>${product.product_name}</h3>
                <div class="price">Rs ${product.price}/-</div>
            </div>
        `;
        productsContainer.appendChild(productElement);
    });
}
