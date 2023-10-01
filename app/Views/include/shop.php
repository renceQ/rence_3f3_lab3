<!DOCTYPE html>
<html>
<head>
    <?= $this->include('include/link') ?>
    <?= $this->include('include/header') ?>

    <style>
        .category-buttons {
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .category-container {
            max-width: 600px; /* Set a maximum width for the container */
            margin: 0 auto; /* Center the container horizontally */
        }

        .category-button {
            background-color: #fff; /* White background */
            color: #555; /* Gray text */
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .category-button:hover {
            background-color: #ff0000; /* Red background on hover */
            color: #fff; /* White text on hover */
        }

        .product-list {
            display: flex; /* Use flexbox layout */
            flex-wrap: wrap; /* Allow items to wrap to the next row */
        }

        .product-list-item {
            width: calc(33.33% - 10px); /* 3 columns with some margin in between */
            margin-right: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="category-container">
        <div class="category-buttons">
            <button id="womenButton" class="category-button">Women's</button>
            <button id="accessoriesButton" class="category-button">Accessories</button>
            <button id="mensButton" class="category-button">Men's</button>
        </div>

        <!-- Add a single container for each category -->
        <div id="productContainer" class="product-list"></div>
    </div>

    <script>
        // Get references to the buttons and the product container
        const womenButton = document.getElementById('womenButton');
        const accessoriesButton = document.getElementById('accessoriesButton');
        const mensButton = document.getElementById('mensButton');

        const productContainer = document.getElementById('productContainer');

        // Function to hide all category containers except the specified one
        function hideOtherContainers() {
            productContainer.innerHTML = '';
        }

        // Add event listeners for button clicks
        womenButton.addEventListener('click', () => {
            hideOtherContainers();
            loadAndDisplayCategory(2, productContainer);
        });

        accessoriesButton.addEventListener('click', () => {
            hideOtherContainers();
            loadAndDisplayCategory(3, productContainer);
        });

        mensButton.addEventListener('click', () => {
            hideOtherContainers();
            loadAndDisplayCategory(4, productContainer);
        });

        function loadAndDisplayCategory(categoryId, container) {
            // Use AJAX to fetch records based on categoryId and update the container
            fetch(`/get-products-by-category/${categoryId}`)
                .then(response => response.json())
                .then(products => {
                    // Loop through the products and add them to the list
                    products.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.classList.add('product-list-item');
                        productDiv.innerHTML = `
                            <p>Product Name: ${product.product_name}</p>
                            <p>Price: ${product.price}</p>
                            <img src="${product.image_url}" alt="Product Image" width="150" />
                            <!-- Add more fields as needed -->
                        `;
                        container.appendChild(productDiv);
                    });
                })
                .catch(error => {
                    console.error(error);
                    container.innerHTML = 'Failed to load products.';
                });
        }
    </script>
</body>
</html>
