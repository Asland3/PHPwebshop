<?php

require_once "../dbh.inc.php";
require_once "productsModel.php";

$category = isset($_GET['category']) ? $_GET['category'] : null;
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : null;

$categories = getCategories($pdo);
$subcategories = getSubcategories($pdo);

if ($category && $subcategory) {
    $products = getProductsByCategoryAndSubcategory($pdo, $category, $subcategory);
} else {
    $products = [];
}


function getCategories($pdo)
{
    $sql = "SELECT * FROM categories";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getSubcategories($pdo)
{
    $sql = "SELECT s.*, c.name as category FROM subcategories s
            JOIN categories c ON s.category_id = c.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
