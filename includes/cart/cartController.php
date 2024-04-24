<?php
require_once "../dbh.inc.php";
require_once "../products/productsModel.php";
require_once "../config_session.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    if (isset($_SESSION["cart"][$product_id])) {
        $_SESSION["cart"][$product_id] += $quantity;
    } else {
        $_SESSION["cart"][$product_id] = $quantity;
    }
}

$products = getAllProducts($pdo);
$cart = array();
foreach ($_SESSION["cart"] as $product_id => $quantity) {
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            $product['quantity'] = $quantity;
            $cart[] = $product;
        }
    }
}

header("Location: ../../index.php");
exit();
