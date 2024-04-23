<div class="container pt-5">
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['price']; ?></p>
                        <form method="post" action="includes/cart/cartController.php">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="number" name="quantity" min="1" max="99" value="1">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>