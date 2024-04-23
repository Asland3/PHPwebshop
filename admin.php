<?php

session_start(); // Start the session if not already started

if (!isset($_SESSION['user_isAdmin']) || $_SESSION['user_isAdmin'] != 1) {
    echo "Error: You are not authorized to view this page.";
    exit; // Stop further execution of the script
}


require_once "includes/dbh.inc.php";
require_once "includes/products/productsModel.php";
require_once "navbar.php";

$products = getProducts($pdo);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <h1>Admin Page</h1>

    <!-- Form for adding a new product -->
    <form action="includes/admin/add-products.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="file" name="image" required>
        <input type="number" name="price" placeholder="Price" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Add Product</button>
    </form>

    <!-- List of existing products -->
    <?php foreach ($products as $product) : ?>
        <div>
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['price']; ?></p>

            <!-- Form for editing an existing product -->
            <form method="post" action="includes/admin/edit-products.php">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <input type="text" name="name" placeholder="Product Name" value="<?php echo $product['name']; ?>" required>
                <input type="number" name="price" placeholder="Price" value="<?php echo $product['price']; ?>" required>
                <textarea name="description" placeholder="Description" required><?php echo $product['description']; ?></textarea>
                <button type="submit" name="edit">Edit</button>
            </form>

            <form method="post" action="includes/admin/delete-products.php">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <button type="submit" name="delete">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>

</body>

</html>