<div class="products">
    <?php foreach ($products as $product) : ?>
        <div class="product-card">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['price']; ?></p>
            <form method="post" action="cart.php">
                <!-- <input type="number" name="quantity" min="1" max="<?php echo $product['stock']; ?>" value="1"> -->
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
