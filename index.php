<?php
require_once "includes/products/productsController.php";
require_once "navbar.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-flex gap-3 justify-content-center">
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Category
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <?php foreach ($categories as $category) : ?>
                                <li><a class="dropdown-item" href="index.php?category=<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php if (isset($_GET['category'])) : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="subcategoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Select Subcategory
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="subcategoryDropdown">
                                <?php foreach ($subcategories as $subcategory) : ?>
                                    <?php if ($subcategory['category'] == $_GET['category']) : ?>
                                        <li><a class="dropdown-item" href="index.php?category=<?php echo $_GET['category']; ?>&subcategory=<?php echo $subcategory['name']; ?>"><?php echo $subcategory['name']; ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (isset($_GET['subcategory'])) : ?>
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
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


</html>


</html>