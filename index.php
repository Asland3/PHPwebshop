<?php
require_once "includes/config_session.inc.php";
require_once "includes/products/productsController.php";
require_once "navbar.php";

require_once "includes/dbh.inc.php";
require_once "includes/products/productsModel.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include "includes/products/productsView.php"; ?>

</body>

</html>