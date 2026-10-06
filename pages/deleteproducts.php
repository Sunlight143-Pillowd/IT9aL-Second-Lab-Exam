<?php
include '../db.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM products WHERE Product_ID = $product_id");

    if ($delete) {
        echo "<script>alert('Product deleted successfully!'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Failed to delete product.'); window.location.href='../index.php';</script>";
    }
}
?>