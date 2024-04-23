<?php
require_once "../dbh.inc.php";
require_once "../products/productsModel.php";
require_once "../config_session.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];

    if (isset($_SESSION["cart"][$product_id])) {
        unset($_SESSION["cart"][$product_id]);
    }
}

header("Location: ../../cart.php");
exit();
