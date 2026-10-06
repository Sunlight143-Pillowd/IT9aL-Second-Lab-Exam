<?php
 include '../db.php';
 if (isset($_POST['submit'])) {
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
    
        $insert = mysqli_query($conn, "INSERT INTO products (ProductName, Categories, Price, Quantity) VALUES ('$product_name', '$product_category', '$product_price', '$product_quantity')");
    
        if ($insert) {
            echo "<script>alert('Product added successfully!'); window.location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Failed to add product.'); window.location.href='../index.php';</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="page-shell">
        <div class="form-card">
            <h1>Add Product</h1>
            <form method="POST" action="">
                <div>
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" required>
                </div>

                <div>
                    <label for="product_category">Product Category:</label>
                    <input type="text" id="product_category" name="product_category" required>
                </div>

                <div>
                    <label for="product_price">Product Price:</label>
                    <input type="number" id="product_price" name="product_price" step="0.01" required>
                </div>

                <div>
                    <label for="product_quantity">Product Quantity:</label>
                    <input type="number" id="product_quantity" name="product_quantity" required>
                </div>

                <div class="form-actions">
                    <input type="submit" name="submit" value="Add Product">
                    <a class="secondary-btn" href="../index.php">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>