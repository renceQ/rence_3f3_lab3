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
    </style>
</head>
<body>
    <div class="category-container">
        <div class="category-buttons">
            <button id="womenButton" class="category-button">Women's</button>
            <button id="accessoriesButton" class="category-button">Accessories</button>
            <button id="mensButton" class="category-button">Men's</button>
        </div>

        <!-- Add containers for each category -->
        <div id="womenContainer"></div>
        <div id="accessoriesContainer"></div>
        <div id="mensContainer"></div>
    </div>

<script>
    // Get references to the buttons and containers
    const womenButton = document.getElementById('womenButton');
    const accessoriesButton = document.getElementById('accessoriesButton');
    const mensButton = document.getElementById('mensButton');

    const womenContainer = document.getElementById('womenContainer');
    const accessoriesContainer = document.getElementById('accessoriesContainer');
    const mensContainer = document.getElementById('mensContainer');

    // Function to hide all category containers except the specified one
    function hideOtherContainers(activeContainer) {
        const containers = [womenContainer, accessoriesContainer, mensContainer];
        containers.forEach(container => {
            if (container !== activeContainer) {
                container.style.display = 'none';
            }
        });
    }

    // Add event listeners for button clicks
    womenButton.addEventListener('click', () => {
        hideOtherContainers(womenContainer);
        loadAndDisplayCategory(2, womenContainer);
    });

    accessoriesButton.addEventListener('click', () => {
        hideOtherContainers(accessoriesContainer);
        loadAndDisplayCategory(3, accessoriesContainer);
    });

    mensButton.addEventListener('click', () => {
        hideOtherContainers(mensContainer);
        loadAndDisplayCategory(4, mensContainer);
    });

    // Function to load and display records for a specific category
    function loadAndDisplayCategory(categoryId, container) {
        // Use AJAX to fetch records based on categoryId and update the container
        fetch(`/get-products-by-category/${categoryId}`)
            .then(response => response.json())
            .then(products => {
                // Clear the container
                container.innerHTML = '';

                // Loop through the products and add them to the container
                products.forEach(product => {
                    const productDiv = document.createElement('div');
										productDiv.innerHTML = `
				    <p>Product Name: ${product.product_name}</p>
				    <p>Price: ${product.price}</p>
				    <img src="/uploads/${product.image_filename}" alt="Product Image" />
				    <!-- Add more fields as needed -->
				`;

                    container.appendChild(productDiv);
                });

                // Show the container after loading products
                container.style.display = 'block';
            })
            .catch(error => {
                console.error(error);
                container.innerHTML = 'Failed to load products.';
            });
    }
</script>

  </body>
</html>
