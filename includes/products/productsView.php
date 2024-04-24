<?php
require_once "productsController.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<div class="container pt-5">
    <div class="row">
        <div class="col-md-4">
            <form method="get" action="productsView.php">
                <select name="category" onchange="this.form.submit()">
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <?php if (isset($_GET['category'])) : ?>
                <form method="get" action="productsView.php">
                    <input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
                    <select name="subcategory" onchange="this.form.submit()">
                        <option value="">Select Subcategory</option>
                        <?php foreach ($subcategories as $subcategory) : ?>
                            <?php if ($subcategory['category'] == $_GET['category']) : ?>
                                <option value="<?php echo $subcategory['name']; ?>"><?php echo $subcategory['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </form>
            <?php endif; ?>
        </div>
        <div class="col-md-8">
            <?php if (isset($_GET['subcategory'])) : ?>
                <div class="row">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                    <p class="card-text"><?php echo $product['price']; ?></p>
                                    <form method="post" action="includes/cart/cartController.php" class="d-flex justify-content-between">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                        <input type="number" name="quantity" min="1" max="99" value="1" class="form-control w-auto">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>