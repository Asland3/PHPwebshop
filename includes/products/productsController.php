<?php
require_once "./includes/dbh.inc.php";
require_once "productsModel.php";

$products = getProducts($pdo);
