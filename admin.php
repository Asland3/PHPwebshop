<?php
require_once "navbar.php";
require_once "includes/config_session.inc.php";

if ($_SESSION['user_role'] !== 'admin') {
    echo '<div class="container pt-5">';
    echo '<div class="alert alert-danger" role="alert">';
    echo 'You are not authorized to access this page.';
    echo '</div>';
    echo '<div class="d-flex justify-content-center">';
    echo '<a href="index.php" class="btn btn-primary btn-lg">Go to Home</a>';
    echo '</div>';
    echo '</div>';
    exit();
}

require_once "includes/dbh.inc.php";
require_once "includes/products/productsModel.php";

$products = getProducts($pdo);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Page</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Admin Page</h1>

        <form action="includes/admin/add-products.php" method="post" enctype="multipart/form-data" class="mb-5">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" placeholder="Product Name" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" placeholder="Price" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" placeholder="Description" required class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>

        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="card-img-top">
                        <div class="card-body">

                            <form method="post" action="includes/admin/edit-products.php" class="mb-3">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <input type="text" name="name" placeholder="Product Name" value="<?php echo $product['name']; ?>" required class="form-control">
                                <input type="number" name="price" placeholder="Price" value="<?php echo $product['price']; ?>" required class="form-control">
                                <textarea name="description" placeholder="Description" required class="form-control"><?php echo $product['description']; ?></textarea>
                                <div class="d-flex justify-content-between mt-2">
                                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                            </form>


                            <form method="post" action="includes/admin/delete-products.php">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    <?php endforeach; ?>
    </div>

    </div>
</body>

</html>