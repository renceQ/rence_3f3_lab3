<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
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

        /* Display the current image */
        .current-image {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .current-image img {
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="container" style="width: 600px; height: 600px;">
        <h2>Update Product</h2>
        <form action="/update/<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product['product_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= ($category['id'] == $product['category_id']) ? 'selected' : '' ?>><?= $category['category_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image_url">Image:</label>
                <input type="file" class="form-control-file" id="image_url" name="image_url" accept="image/*">
            </div>
            <!-- Display the current image -->
            <div class="form-group current-image">
                <label for="current_image">Current Image:</label>
                <img src="<?= base_url() . '/' . $product['image_url'] ?>" alt="Product Image">
                <!-- Store the current image URL in a hidden input field -->
                <input type="hidden" name="current_image" value="<?= $product['image_url'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
