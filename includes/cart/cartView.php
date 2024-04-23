<div class="container pt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Your Cart</h2>
            <?php
            if (isset($_SESSION["cart"])) {
                $products = getProducts($pdo);
                $cart = array();
                $totalPrice = 0;
                foreach ($_SESSION["cart"] as $product_id => $quantity) {
                    foreach ($products as $product) {
                        if ($product['id'] == $product_id) {
                            $product['quantity'] = $quantity;
                            $cart[] = $product;
                            $totalPrice += $product['price'] * $quantity;
            ?>
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid p-3">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                            <p class="card-text"><strong>Quantity:</strong> <?php echo $product['quantity']; ?></p>
                                            <p class="card-text"><strong>Price:</strong> <?php echo $product['price']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php
                        }
                    }
                }
                echo "<p class='font-weight-bold mt-3'>Total Price: {$totalPrice}</p>";
            } else {
                echo "<p class='mt-3'>Your cart is empty.</p>";
            }
            ?>
        </div>
    </div>
</div>