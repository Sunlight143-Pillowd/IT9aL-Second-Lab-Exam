<?php
include '../db.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $edit = mysqli_query($conn, "SELECT * FROM products WHERE product_id = $product_id");
    $row = mysqli_fetch_array($edit);
}

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    $update = mysqli_query($conn, "UPDATE products SET ProductName='$product_name', Categories='$product_category', Price='$product_price', Quantity='$product_quantity' WHERE Product_ID=$product_id");

    if ($update) {
        echo "<script>alert('Product updated successfully!'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Failed to update product.'); window.location.href='../index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="page-shell">
        <div class="form-card">
            <h1>Edit Product</h1>
            <form method="POST" action="">
                <div>
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" value="<?php echo $row['ProductName']; ?>" required>
                </div>

                <div>
                    <label for="product_category">Product Category:</label>
                    <input type="text" id="product_category" name="product_category" value="<?php echo $row['Categories']; ?>" required>
                </div>

                <div>
                    <label for="product_price">Product Price:</label>
                    <input type="number" id="product_price" name="product_price" step="0.01" value="<?php echo $row['Price']; ?>" required>
                </div>

                <div>
                    <label for="product_quantity">Product Quantity:</label>
                    <input type="number" id="product_quantity" name="product_quantity" value="<?php echo $row['Quantity']; ?>" required>
                </div>

                <div class="form-actions">
                    <input type="submit" name="submit" value="Update Product">
                    <a class="secondary-btn" href="../index.php">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>