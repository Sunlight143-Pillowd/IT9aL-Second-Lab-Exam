<?php
include 'db.php';
$display = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convenience Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page-shell">
        <header class="dashboard-header">
            <h1>Convenience Store</h1>
            <a class="primary-btn" href="pages/addproducts.php">+ Add Product</a>
        </header>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($display)) {
                        echo "<tr>";
                        echo "<td>" . $row['Product_ID'] . "</td>";
                        echo "<td>" . $row['ProductName'] . "</td>";
                        echo "<td>" . $row['Categories'] . "</td>";
                        echo "<td>₱ " . $row['Price'] . "</td>";
                        echo "<td>" . $row['Quantity'] . "</td>";
                        echo "<td><div class='action-links'><a href='pages/editproducts.php?id=" . $row['Product_ID'] . "'>Edit</a><a href='pages/deleteproducts.php?id=" . $row['Product_ID'] . "'>Delete</a></div></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        if (mysqli_num_rows($display) == 0) {
            echo "<p class='empty-state'>No Product/s found</p>";
        }
        ?>
    </div>
</body>
</html>