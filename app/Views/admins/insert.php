<!DOCTYPE html>
<html>
<head>
    <title>Insert Product</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            padding: 30px 20px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px #888888;
        }

        h2 {
            color: #333333;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            color: #333333;
        }

        .form-control {
            background-color: #f2f2f2;
            border: 1px solid #dddddd;
            color: #333333;
        }

        .btn-primary {
            background-color: #333333;
            border: 1px solid #333333;
            color: #ffffff;
        }

        /* Compact table style */
        .compact-table {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Insert into Products Table</h2>
        <form action="/insert" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image_url">Image:</label>
                <input type="file" class="form-control-file" id="image_url" name="image_url" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Insert</button>
        </form>
    </div>

    <div class="container" style="width: 700px;">
        <h2>Products Table</h2>
        <table class="table table-striped table-bordered compact-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr data-product-id="<?= $product['id'] ?>">
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['category_id'] ?></td>
                        <td><img src="<?= base_url() . '/' . $product['image_url'] ?>" alt="Product Image" width="50"></td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteProduct(<?= $product['id'] ?>)">Delete</button>
                            <a class="btn btn-warning" href="/update/<?= $product['id'] ?>">Update</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add this script at the end of your HTML file, just before the closing </body> tag -->
    <script>
        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                // Send an AJAX request to delete the product
                fetch(`/delete/${productId}`, {
                    method: 'DELETE',
                })
                .then(response => {
                    if (response.status === 200) {
                        // Product deleted successfully, remove it from the table
                        const row = document.querySelector(`tr[data-product-id="${productId}"]`);
                        if (row) {
                            row.remove();
                        }
                    } else {
                        alert('Failed to delete the product.');
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('An error occurred while deleting the product.');
                });
            }
        }
    </script>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
